<?php

namespace App\Http\Controllers;

use App\Models\message;
use App\Models\Transactions;
use App\Models\User;
use App\Notifications\LoginNotification;
use App\Notifications\SendEmailNotification;
use App\Notifications\TransactionNotification;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class HomeController extends Controller
{
    ////Redirect Logged-in user function
    public function __construct()
    {
        $this->middleware('guest')->only(['Login_page']);
        $this->middleware('auth')->only(['UserDashboard', 'Send_money', 'TransferMoney']);
    }

    //Login-redirect function
    public function Login_redirect()
    {
        $userType = Auth::user()->user_type;

        if ($userType == "ad_1e") {
            return redirect('dashboard');
        } else {
            return redirect('/');
        }
    }

    //Login Page Function
    public function Login_page()
    {
        return view('Frontend.login');
    }

    //About page Function
    public function About_page()
    {
        return view('Frontend.about_page');
    }

    //Services page Function
    public function Services()
    {
        return view('Frontend.services');
    }

    //Contact page Function
    public function Contact_page()
    {
        return view('Frontend.contact_page');
    }

    //Custormer_register page Function
    public function Custormer_register()
    {
        return view('Frontend.register');
    }

    //Store_user to database
    public function Store_user(Request $request)
    {


        $request->validate([
            'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'email' => 'required',
            'city' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'next_kin' => 'required',
            'account_type' => 'required',
            'address' => 'required',
            'country' => 'required',
            'zip_code' => 'required',
            'image' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8'
        ]);

        $userAccountNumber = "22" . substr(str_shuffle('0123456789'), 0, 8);

        //Checks if the account number and email already exist b4 adding to the database
        $acc_number =  User::where('acc_number', $userAccountNumber)->exists();
        $email =  User::where('email', $request->email)->exists();

        if ($acc_number) {
            return redirect()->back()->with('error', 'Account Number Already Exist.');
        } elseif ($email) {
            return redirect()->back()->with('error', 'Email Already Exist.');
        } else {
            $data  = new User();

            $data->acc_number = $userAccountNumber;

            $data->title = $request->title;
            $data->fname = $request->first_name;
            $data->lname = $request->last_name;
            $data->phone = $request->phone;
            $data->dob = $request->dob;
            $data->acc_type = $request->account_type;
            $data->address = $request->address;
            $data->country = $request->country;
            $data->zip_code = $request->zip_code;
            $data->email = $request->email;
            $data->gender = $request->gender;
            $data->next_kin = $request->next_kin;
            $data->city = $request->city;
            $data->password = Hash::make($request->password);

            $data->status = 0;
            $data->amount = 0;
            $data->user_type = 0;

            $imageName = time() . '_passport_' . $request->image->getClientOriginalExtension();

            $request->image->move('frontend/assets/uploads', $imageName);

            $data->image = $imageName;


            $details = [
                'first_name' => "Dear, $request->first_name",

                'last_name' => "Welcome to Broadroute. We are committed to providing you with the highest level of services and the most innovative banking products possible. You can login with your account number below.",

                'account' => $userAccountNumber,

                'last_line' => '© Broadroute | All Rights Reserved.',

            ];

            Notification::send($data, new SendEmailNotification($details));

            $data->save();

            return redirect()->route('login')->with('success', "Account Registration Successfull Please Check Your Email For Your Login Details");
        }
    }

    //Send_message
    public function Send_message(Request $request)
    {

        $data  = new message();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone_no = $request->phone_no;
        $data->subject = $request->subject;
        $data->content = $request->content;

        $data->save();

        return redirect('/contact')->with('success', "Message Sent Successfully");
    }

    //Login Function
    public function Login_user(Request $request)
    {
        // $acc_num = $request->acc_number;
        $acc_number =  User::where('acc_number', $request->acc_number)->where('status', 0)->exists();

        $blocked =  User::where('acc_number', $request->acc_number)->where('status', 2)->exists();

        $acc_number1 =  User::where('acc_number', $request->acc_number)->first();

        // dd($acc_number1->fname);

        $fname = $acc_number1->fname;

        if ($acc_number) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'Dear Custormer we need more information to activate your account, please contact support');

        }else if ($blocked) {
            Auth::logout();

            $request->session()->invalidate();

            $request->session()->regenerateToken();

            return redirect()->route('login')->with('error', 'Account has been suspended for unusual login, contact support');
            
        } else {
            $credentials = $request->only('acc_number', 'password');
            if (Auth::attempt($credentials)) {

                $ip = "103.169.170.178";
                $user_ip = getenv('REMOTE_ADDR');
                $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
                $country = $geo["geoplugin_countryName"];
                $city = $geo["geoplugin_city"];

                $details = [
                    'first_name' => "Dear, $fname",

                    'last_name' => "Welcome to Broadroute Bank.",

                    'account' => "Your login was successful",

                    'message' => "Your Account was logged in from " . $country . " (". $city .")",

                    'last_line' => '© Broadroute | All Rights Reserved.',
                ];


                $acc_number1->notify(new LoginNotification($details));

                return redirect('/home');
            } else {
                
                return redirect('/login')->with('error', 'Invalid Credentials, Check your details and try again.');
            }
        }
    }

    //Logout function
    public function Logout(Request $request)
    {
        $request->session()->invalidate();

        return redirect('/');
    }

    //User Dashboard
    public function UserDashboard()
    {
        $transactions = Transactions::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);;
        return view('Frontend.userDashboard', compact('transactions'));
    }

    //Sendmoney Dashboard
    public function Send_money()
    {
        return view('Frontend.sendmoney');
    }

    //TransferMoney
    public function TransferMoney(Request $request)
    {
        $data  = new Transactions();

        $user = User::findOrFail(Auth::user()->id);

        $email = Auth::user();

        $expenses = $request->amount;

        $balance = Auth::user()->amount;

        if ($expenses + 5 > $balance) {
            $value = $request->amount;
            $value2 = number_format($value, 2);
            return redirect('/send_money')->with('error', "You dont have enough Balance. Please add money to your Balance with $$value2 to pay account ($request->recipient_name)");
        } else {
            $result = $balance - $expenses;

            //update the current balance of the user in the users table
            $user->amount = $result;

            //update the transactions table
            $data->recipient_name = $request->recipient_name;
            $data->amount = $request->amount;
            $data->status = 0;
            $data->user_id = Auth::user()->id;
            $data->zip_code = $request->zip_code;
            $data->swift_code = $request->swift_code;
            $data->routine_code = $request->routine_code;
            $data->recipient_acc_number = $request->recipient_account_number;
            $data->recipient_bank = $request->recipient_bank;
            $data->remark = $request->remark;

            $value = $request->amount;
            $value2 = number_format($value, 2);

            $ldate = date('Y-m-d');

            $details = [
                'first_name' => "Transaction Successful",

                'last_name' => "You Successfully transferred $$value2 to  ($request->recipient_name)",

                'date' => "Date: $ldate",

                'content' => "Thanks for banking with us.",

                'last_line' => '© Broadroute | All Rights Reserved.',

            ];

            Notification::send($email, new TransactionNotification($details));

            $user->save();
            $data->save();

            return redirect('/my_dashboard')->with('success', "You Successfully transferred $$value2 to  ($request->recipient_name)");

            
        }
    }


    //Transaction Done
    public function Done($id)
    {

        $trans = Transactions::findOrFail($id);
        $trans->status = 1;
        $trans->save();

        return redirect()->route('my_dashboard')->with('success', 'Transaction Done');
    }

    //Transaction Processing
    public function Notdone($id)
    {

        $trans = Transactions::findOrFail($id);
        $trans->status = 0;
        $trans->save();

        return redirect()->route('my_dashboard')->with('success', 'Transaction Processing');
    }

    //Download_reciept
    public function Download_reciept($id)
    {
        $trans = Transactions::findOrFail($id);

        $refId = substr(str_shuffle('0123456789'), 0, 8);

        return view('Frontend.reciept', compact('trans', 'refId'));

    }

    //credit_reciept
    public function credict_reciept($id)
    {
        $trans = Transactions::findOrFail($id);

        $refId = substr(str_shuffle('0123456789'), 0, 8);

        return view('Frontend.credict_reciept', compact('trans', 'refId'));

    }

    //Privacy_Policy
    public function Privacy_Policy()
    {

        return view('Frontend.privacy');
    }

    //wealth management
    public function Wealth()
    {

        return view('Frontend.wealth');
    }

    //Investment management
    public function Investment()
    {

        return view('Frontend.investment');
    }
    //Investment management
    public function Investmen_optiont()
    {

        return view('Frontend.investment_option');
    }
}
