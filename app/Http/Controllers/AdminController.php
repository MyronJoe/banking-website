<?php

namespace App\Http\Controllers;

use App\Models\hero;
use App\Models\message;
use App\Models\Transactions;
use App\Models\User;
use App\Models\Utilities;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    //Admin Dashboard
    public function Dashboard()
    {
        $message = message::all()->count();

        $transactions = transactions::where('status', 0)->count();

        $done_transactions = transactions::where('status', 1)->count();

        $users = user::where('user_type', '0')->count();

        $admin = user::where('user_type', 'ad_1e')->count();

        return view('Backend.index', compact('message', 'transactions', 'users', 'admin', 'done_transactions'));
    }

    //Register-acount
    public function Register_acount()
    {

        $accountNumber = "22" . substr(str_shuffle('0123456789'), 0, 8);

        return view('Backend.account.create_account', compact('accountNumber'));
    }

    //Create User Account
    public function Create_account(Request $request)
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

            $data->save();

            return redirect()->route('all_accounts')->with('success', 'Account Created Successfully');
        }
    }

    //All_accounts
    public function All_accounts()
    {

        $users = User::where('user_type', '=', '0')->orderBy('id', 'desc')->paginate(30);

        return view('Backend.account.all_accounts', compact('users'));
    }

    //Enable Account
    public function Enable($id)
    {

        $user = User::findOrFail($id);

        $user->status = 1;

        $user->save();

        return redirect()->route('all_accounts')->with('success', 'User Activated Successfully.');
    }

    //Enable Account
    public function Disable($id)
    {

        $user = User::findOrFail($id);

        $user->status = 2;

        $user->save();

        return redirect()->route('all_accounts')->with('success', 'User Deactivated Successfully.');
    }

    //Edit-account
    public function Edit_account($id)
    {

        $user = User::findOrFail($id);

        return view('Backend.account.edit_account', compact('user'));
    }

    //Update_account
    public function Update_account($id, Request $request)
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
        ]);

        //Checks if the account number and email already exist b4 adding to the database
        $email =  User::where('email', $request->email)->exists();


        $data = User::findOrFail($id);


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

        if ($request->password) {
            $data->password = Hash::make($request->password);
        }

        $data->amount = $request->amount;

        if ($request->image) {
            $imageName = time() . '_passport_' . $request->image->getClientOriginalExtension();

            $request->image->move('frontend/assets/uploads', $imageName);

            $data->image = $imageName;
        }

        $data->save();

        return redirect()->route('all_accounts')->with('success', 'Account Updated Successfully.');
    }

    //Delete User account
    public function Delete_account($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('all_accounts')->with('success', 'User Deleted Successfully.');
    }

    //All_transactions
    public function All_transaction()
    {
        $transactions = Transactions::orderBy('created_at', 'desc')->paginate(30);

        $transactionsNum = Transactions::orderBy('id', 'desc')->count();

        return view('Backend.transactions.transactions', compact('transactions', 'transactionsNum'));
    }

    //Transaction Done
    public function Done($id)
    {

        $trans = Transactions::findOrFail($id);
        $trans->status = 1;
        $trans->save();

        return redirect()->back()->with('success', 'Transaction Done');
    }

    //Transaction Processing
    public function Notdone($id)
    {

        $trans = Transactions::findOrFail($id);
        $trans->status = 0;
        $trans->save();

        return redirect()->back()->with('success', 'Transaction Processing');
    }

    //Edit Transaction
    public function Edit_transaction($id)
    {
        $trans = Transactions::findOrFail($id);

        return view('Backend.transactions.edit_transactions', compact('trans'));
    }

    public function update_transaction($id, Request $request)
    {
        $trans = Transactions::findOrFail($id);

        $request->validate([
            'date' => 'required',
            // 'amount' => 'required',
        ]);

        $trans->created_at = $request->date;
        // $trans->amount = $request->amount;

        $trans->save();

        return redirect('all_transaction')->with('success', 'Transaction Updated Successfully.');
    }
    

    public function Delete_transaction($id)
    {
        $trans = Transactions::findOrFail($id);

        $trans->delete();

        return redirect()->back()->with('success', 'Transaction Deleted Successfully.');
    }

    //All_messages
    public function All_messages()
    {

        $message = message::orderBy('id', 'desc')->get();

        return view('Backend.message.message', compact('message'));
    }

    //View_message
    public function View_message($id)
    {
        $message = message::findOrFail($id);

        return view('Backend.message.view_message', compact('message'));
    }

    //Delete-message
    public function Delete_message($id)
    {
        $message = message::findOrFail($id);

        $message->delete();

        return redirect()->route('all_messages')->with('success', 'Message Deleted Successfully.');
    }

    //Site_setting
    public function Site_setting()
    {

        $utilities = Utilities::orderBy('id', 'desc')->get();

        return view('Backend.site_settings.site_settings', compact('utilities'));
    }

    //update site settings
    public function Update_settings($id, Request $request)
    {

        $request->validate([
            'address' => 'required|string',
            'email' => 'required|string',
            // 'phone' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'site_name' => 'required|string',
        ]);

        $data = Utilities::findOrFail($id);

        $data->email = $request->email;
        $data->address = $request->address;
        $data->phone_no = $request->phone;
        $data->page_title = $request->title;
        $data->description = $request->description;
        $data->site_name = $request->site_name;

        if ($request->whitelogo) {
            $imageName = time() . '_white_logo_' . $request->whitelogo->getClientOriginalExtension();

            $request->whitelogo->move('frontend/assets/uploads', $imageName);

            $data->whiteLogo = $imageName;
        }

        if ($request->darklogo) {
            $imageName = time() . '_darklogo' . $request->darklogo->getClientOriginalExtension();

            $request->darklogo->move('frontend/assets/uploads', $imageName);

            $data->blackLogo = $imageName;
        }

        if ($request->faveicon) {
            $imageName = time() . '_faveicon' . $request->faveicon->getClientOriginalExtension();

            $request->faveicon->move('frontend/assets/uploads', $imageName);

            $data->faveicon = $imageName;
        }

        $data->save();

        return redirect()->route('admin-dashboard')->with('success', 'Settings Updated Successfully.');
    }

    //Hero_setting
    public function Hero_setting()
    {

        $heros = hero::orderBy('id', 'desc')->get();

        return view('Backend.herosection.hero', compact('heros'));
    }

    //Update_hero
    public function Update_hero($id, Request $request)
    {

        $request->validate([
            'title' => 'required|string',
            'subtitle' => 'required|string',
        ]);

        $data = hero::findOrFail($id);

        $data->title = $request->title;
        $data->subtitle = $request->subtitle;

        if ($request->image) {
            $imageName = time() . '_white_logo_' . $request->image->getClientOriginalExtension();

            $request->image->move('frontend/assets/uploads', $imageName);

            $data->image = $imageName;
        }



        $data->save();

        return redirect()->route('admin-dashboard')->with('success', 'Hero Updated Successfully.');
    }


    //Search Function
    public function Search(Request $request)
    {

        $searchedWord = $request->search;

        $transactions = Transactions::where('recipient_acc_number', $searchedWord)->get();

        $num_result = Transactions::where('recipient_acc_number', $searchedWord)->count();

        return view('Backend.transactions.search_transactions', compact('transactions', 'num_result'));
    }

    //Create_admin Page
    public function Create_admin()
    {
        return view('Backend.admin.create_admin');
    }

    //Create_admin_account
    public function Create_admin_account(Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'password' => 'required|min:8',
            'confirm_password' => 'required_with:password|same:password|min:8'
        ]);

        $userAccountNumber = "22" . substr(str_shuffle('0123456789'), 0, 8);

        $acc_number =  User::where('acc_number', $userAccountNumber)->exists();
        $email =  User::where('email', $request->email)->exists();

        if ($acc_number) {
            return redirect()->back()->with('error', 'Account Number Already Exist.');
        } elseif ($email) {
            return redirect()->back()->with('error', 'Email Already Exist.');
        } else {

            $data = new User();

            $data->email = $request->email;
            $data->password = Hash::make($request->password);

            $data->acc_number = $userAccountNumber;
            $data->user_type = 'ad_1e';
            $data->status = 1;
        }

        $data->save();

        return redirect()->route('all_admin')->with('success', 'Admin Created Successfully.');
    }

    //All_admin
    public function All_admin()
    {

        $users = User::where('user_type', '=', 'ad_1e')->orderBy('id', 'desc')->get();

        return view('Backend.admin.all_admins', compact('users'));
    }

    //Edit_admin
    public function Edit_admin($id)
    {

        $user = User::findOrFail($id);

        return view('Backend.admin.edit_admin', compact('user'));
    }

    public function Update_admin($id, Request $request)
    {
        $request->validate([
            'email' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'confirm_password' => 'same:password'

        ]);

        $data = User::findOrFail($id);

        $data->email = $request->email;
        $data->fname = $request->last_name;
        $data->lname = $request->first_name;

        if ($request->password) {
            $data->password = Hash::make($request->password);
        }

        $data->save();

        return redirect()->route('all_admin')->with('success', 'Admin Updated Successfully.');
    }

    //Delete_admin
    public function Delete_admin($id)
    {

        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('all_admin')->with('success', 'Admin Deleted Successfully.');
    }

    //User-transaction
    public function User_transaction($id)
    {
        // dd(	user_id);

        $transactions = Transactions::where('user_id', '=', $id)->orderBy('id', 'desc')->get();

        $num_result = Transactions::where('user_id', '=', $id)->count();

        return view('Backend.transactions.user_transactions', compact('transactions', 'num_result'));
    }

    //create-transaction
    public function create_transaction($id)
    {
        $user = User::findOrFail($id);

        return view('Backend.transactions.create_transaction', compact('user'));
    }

    //make_transaction
    public function make_transaction(Request $request)
    {
        $request->validate([
            'sender_acc' => 'required',
            'type' => 'required',
            'name' => 'required',
            'amount' => 'required',
            'bank' => 'required',

        ]);


        $data  = new Transactions();
        
        $user = User::findOrFail($request->userid);

        $userAccount = $user->acc_number;

        if($request->type == 'credit'){
            $total_amt = $user->amount + $request->amount;
        }else{

            $userAmt = $user->amount;
            $newAmount = $request->amount;

            if($newAmount + 5 > $userAmt){
                return redirect('/all_accounts')->with('error', "You dont have enough Balance");
            }else{
                $total_amt = $user->amount - $request->amount;
            }
        }
        $user->amount = $total_amt;

        $data->sender_acc = $request->sender_acc;
        $data->type = $request->type;

        $data->recipient_name = $request->name;
        $data->amount = $request->amount;
        $data->recipient_bank = $request->bank;
        $data->status = 1;
        $data->user_id = $request->userid;
        $data->recipient_acc_number = $userAccount;

        $user->save();
        $data->save();

        return redirect('/all_accounts')->with('success', "Your Transaction Was Successfull");
    }


    //Send_mail
    public function Send_mail($id)
    {
        $user = User::findOrFail($id);

        return view('Backend.mail', compact('user'));
    }

    //Send_user_email
    public function Send_user_email(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $details = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'account' => $request->account,

        ];

        Notification::send($user, new SendEmailNotification($details));

        return redirect()->route('all_accounts')->with('success', 'Email Sent Successfully.');
    }
}
