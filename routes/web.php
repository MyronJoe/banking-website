<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Frontend.index');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'Login_redirect'])->name('home');
});


Route::controller(HomeController::class)->group(function () {

    Route::get('/about', 'About_page')->name('about');

    Route::get('/services', 'Services')->name('services');

    Route::get('/contact', 'Contact_page')->name('contact');

    Route::post('/send_message', 'Send_message')->name('send_message');

    Route::get('/custormer_register', 'Custormer_register')->name('custormer_register');

    Route::post('/store_user', 'Store_user')->name('store_user');

    Route::get('/login', 'Login_page')->name('login');

    Route::post('/loginUser', 'Login_user')->name('loginUser');

    Route::get('/logout', 'Logout')->name('logout');

    Route::get('/my_dashboard', 'UserDashboard')->name('my_dashboard');

    Route::get('/send_money', 'Send_money')->name('send_money');

    Route::post('/transferMoney', 'TransferMoney')->name('transferMoney');

    Route::get('/download_reciept/{id}', 'Download_reciept')->name('download_reciept');

    Route::get('/credict_reciept/{id}', 'credict_reciept')->name('credict_reciept');

    Route::get('/privacy_policy', 'Privacy_Policy')->name('privacy_policy');

    Route::get('/wealth', 'wealth')->name('wealth');

    Route::get('/investment', 'Investment')->name('investment');

    Route::get('/investment_option', 'Investmen_optiont')->name('investment_option');
});


Route::middleware(['auth:sanctum', 'checkadmin',  config('jetstream.auth_session')])->group(function () {
    //================ADMIN USERS ALL ROUTES============================================

    Route::controller(AdminController::class)->group(function () {
        //admin-dashboard
        Route::get('/dashboard', 'Dashboard')->name('admin-dashboard');

        Route::get('/register', 'Register_acount')->name('register-account');

        Route::post('/create_account', 'Create_account')->name('create_account');

        Route::get('/all_accounts', 'All_accounts')->name('all_accounts');

        Route::get('/enable/{id}', 'Enable')->name('enable');

        Route::get('/disable/{id}', 'Disable')->name('disable');

        Route::get('/edit-account/{id}', 'Edit_account')->name('edit-account');

        Route::post('/update_account/{id}', 'Update_account')->name('update_account');

        Route::get('/delete-account/{id}', 'Delete_account')->name('delete-account');

        Route::get('/all_transaction', 'All_transaction')->name('all_transaction');

        Route::get('/done/{id}', 'Done')->name('done');

        Route::get('/notdone/{id}', 'Notdone')->name('notdone');

        Route::get('/delete-transaction/{id}', 'Delete_transaction')->name('delete-transaction');

        Route::get('/edit-transaction/{id}', 'Edit_transaction')->name('edit-transaction');

        Route::get('/view_message/{id}', 'View_message')->name('view_message');

        Route::get('/delete-message/{id}', 'Delete_message')->name('delete-message');

        Route::get('/all_messages', 'All_messages')->name('all_messages');

        Route::get('/site_setting', 'Site_setting')->name('site_setting');

        Route::post('/update_settings/{id}', 'Update_settings')->name('update_settings');

        Route::get('/hero_setting', 'Hero_setting')->name('hero_setting');

        Route::post('/update_hero/{id}', 'Update_hero')->name('update_hero');

        Route::get('/search', 'Search')->name('search');

        Route::get('/create_admin', 'Create_admin')->name('create_admin');

        Route::post('/create_admin_account', 'Create_admin_account')->name('create_admin_account');

        Route::get('/all_admin', 'All_admin')->name('all_admin');

        Route::get('/edit_admin/{id}', 'Edit_admin')->name('edit_admin');

        Route::post('/update_admin/{id}', 'Update_admin')->name('update_admin');

        Route::get('/delete_admin/{id}', 'Delete_admin')->name('delete_admin');

        Route::get('/user-transaction/{id}', 'User_transaction')->name('user-transaction');

        Route::get('/send_mail/{id}', 'Send_mail')->name('send_mail');

        Route::post('/send_user_email/{id}', 'Send_user_email')->name('send_user_email');

        Route::post('/make_transaction', 'make_transaction')->name('make_transaction');

        Route::post('/update_transaction/{id}', 'update_transaction')->name('update_transaction');

        Route::get('/create_transaction/{id}', 'create_transaction')->name('create_transaction');
    });
});
