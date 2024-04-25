<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
    
    Route::get('/', 'IndexController@index');

    Route::get('login', [ 'as' => 'login', 'uses' => 'IndexController@index']);
    
    Route::post('login', 'IndexController@postLogin');
    Route::get('logout', 'IndexController@logout');

    Route::get('forgot_password', 'IndexController@forgot_password');
    Route::post('forgot_password', 'IndexController@forgot_password_send');
 
    Route::get('dashboard', 'DashboardController@index');   
    Route::get('profile', 'AdminController@profile');   
    Route::post('profile', 'AdminController@updateProfile');

    Route::get('category', 'CategoryController@list');  
    Route::get('category/add', 'CategoryController@add'); 
    Route::get('category/edit/{id}', 'CategoryController@edit');  
    Route::post('category/add_edit', 'CategoryController@addnew');    
    Route::get('category/delete/{id}', 'CategoryController@delete');

    Route::get('sub_category', 'SubCategoryController@list');  
    Route::get('sub_category/add', 'SubCategoryController@add'); 
    Route::get('sub_category/edit/{id}', 'SubCategoryController@edit');  
    Route::post('sub_category/add_edit', 'SubCategoryController@addnew');    
    Route::get('sub_category/delete/{id}', 'SubCategoryController@delete');

    Route::get('authors', 'AuthorsController@list');  
    Route::get('authors/add', 'AuthorsController@add'); 
    Route::get('authors/edit/{id}', 'AuthorsController@edit');  
    Route::post('authors/add_edit', 'AuthorsController@addnew');    
    Route::get('authors/delete/{id}', 'AuthorsController@delete');
 
    Route::get('books', 'BooksController@list');  
    Route::get('books/add', 'BooksController@add'); 
    Route::get('books/edit/{id}', 'BooksController@edit');  
    Route::post('books/add_edit', 'BooksController@addnew');
    Route::post('books/edit_save', 'BooksController@edit_save');    
     
    Route::get('ajax_get_sub_cat/{id}', 'SubCategoryController@ajax_get_sub_cat');
         
    Route::get('home_sections', 'HomeSectionsController@list');  
    Route::get('home_sections/add', 'HomeSectionsController@add'); 
    Route::get('home_sections/edit/{id}', 'HomeSectionsController@edit');  
    Route::post('home_sections/add_edit', 'HomeSectionsController@addnew');    
    Route::get('home_sections/delete/{id}', 'HomeSectionsController@delete');

    Route::get('reviews', 'ReviewsController@list');

    Route::get('reports', 'ReportsController@list');
    Route::get('posts', 'PostController@list');
    Route::get('post/edit/{id}', 'PostController@showEdit');
    
 
    Route::get('users', 'UsersController@list');   
    Route::get('users/add', 'UsersController@add'); 
    Route::get('users/edit/{id}', 'UsersController@edit'); 
    Route::post('users/add_edit', 'UsersController@addnew');   
    Route::get('users/delete/{id}', 'UsersController@delete');
    Route::get('users/export', 'UsersController@user_export');
    Route::get('users/history/{id}', 'UsersController@user_history');

    Route::get('sub_admin', 'UsersController@admin_list'); 
    Route::get('sub_admin/add', 'UsersController@admin_add'); 
    Route::get('sub_admin/edit/{id}', 'UsersController@admin_edit');   
    Route::post('sub_admin/add_edit', 'UsersController@admin_addnew'); 
    Route::get('sub_admin/delete/{id}', 'UsersController@admin_delete');


    Route::get('subscription_plan', 'SubscriptionPlanController@list');  
    Route::get('subscription_plan/add', 'SubscriptionPlanController@add'); 
    Route::get('subscription_plan/edit/{id}', 'SubscriptionPlanController@edit');  
    Route::post('subscription_plan/add_edit', 'SubscriptionPlanController@addnew');
  
    Route::get('payment_gateway', 'PaymentGatewayController@list');
    Route::get('payment_gateway/edit/{id}', 'PaymentGatewayController@edit');   
    Route::post('payment_gateway/paypal', 'PaymentGatewayController@paypal');
    Route::post('payment_gateway/stripe', 'PaymentGatewayController@stripe');
    Route::post('payment_gateway/bkash', 'PaymentGatewayController@bkash');
    Route::post('payment_gateway/razorpay', 'PaymentGatewayController@razorpay');
    Route::post('payment_gateway/paystack', 'PaymentGatewayController@paystack');
    Route::post('payment_gateway/instamojo', 'PaymentGatewayController@instamojo');
    Route::post('payment_gateway/payu', 'PaymentGatewayController@payu');
    Route::post('payment_gateway/mollie', 'PaymentGatewayController@mollie');
    Route::post('payment_gateway/flutterwave', 'PaymentGatewayController@flutterwave');
    Route::post('payment_gateway/paytm', 'PaymentGatewayController@paytm');
    Route::post('payment_gateway/cashfree', 'PaymentGatewayController@cashfree');
    Route::post('payment_gateway/cinetpay', 'PaymentGatewayController@cinetpay');
    Route::post('payment_gateway/banktransfer', 'PaymentGatewayController@banktransfer');

    Route::get('transactions', 'TransactionsController@transactions_list');
    Route::post('transactions/export', 'TransactionsController@transactions_export');  
  
    Route::get('pages', 'PagesController@pages_list');  
    Route::get('pages/add', 'PagesController@add'); 
    Route::get('pages/edit/{id}', 'PagesController@edit');  
    Route::post('pages/add_edit', 'PagesController@addnew');    
    Route::get('pages/delete/{id}', 'PagesController@delete');

    Route::get('ad_list', 'AppAdsController@list');
    Route::get('ad_list/edit/{id}', 'AppAdsController@edit');   
    Route::post('ad_list/admob', 'AppAdsController@admob');
    Route::post('ad_list/startapp', 'AppAdsController@startapp');
    Route::post('ad_list/facebook', 'AppAdsController@facebook');
    Route::post('ad_list/applovins', 'AppAdsController@applovins');
    Route::post('ad_list/wortise', 'AppAdsController@wortise');
    Route::post('ad_list/unity', 'AppAdsController@unity');

    Route::get('general_settings', 'SettingsController@general_settings');
    Route::post('general_settings', 'SettingsController@update_general_settings');
    Route::get('email_settings', 'SettingsController@email_settings');
    Route::post('email_settings', 'SettingsController@update_email_settings');          
    Route::get('onesignal_notification', 'SettingsController@onesignal_notification');
    Route::post('onesignal_notification', 'SettingsController@update_onesignal_notification');
    Route::get('app_update_popup', 'SettingsController@app_update_popup');
    Route::post('app_update_popup', 'SettingsController@update_app_update_popup');
    Route::get('others_settings', 'SettingsController@others_settings');
    Route::post('others_settings', 'SettingsController@update_others_settings');

    Route::get('netsocks', 'SettingsController@netsocks');
    Route::post('netsocks', 'SettingsController@update_netsocks');

    Route::get('notification_send', 'SettingsController@notification_send');
    Route::post('notification_send', 'SettingsController@send_android_notification');

      
    Route::get('verify_purchase_app', 'SettingsController@verify_purchase_app');
    Route::post('verify_purchase_app', 'SettingsController@verify_purchase_app_update');

    Route::get('api_urls', 'SettingsController@api_urls');

    Route::post('ajax_status', 'ActionsController@ajax_status');
    Route::post('ajax_delete', 'ActionsController@ajax_delete');
 
});

//Site

Route::get('/', 'IndexController@index');
Route::get('page/{id}/{slug}', 'PagesController@page_details');
Route::get('share/book/{id}', 'PagesController@share_book');  

//For App Only
Route::any('app_payu_success', function () {
    return view('app_payu.app_payu_success');
});

Route::any('app_payu_failed', function () {
    return view('app_payu.app_payu_failed');
});

Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');

    $clearCache = Artisan::call('cache:clear');
    echo "Cache cleared. \r\n";

    $setCache = Artisan::call('config:cache');
    echo "Cache configured. \r\n";

    $exitCode = Artisan::call('view:clear');
 
    $exitCode = Artisan::call('route:clear');

    echo "View cache cleared. \r\n";

     
    return '<h1>Cache facade value cleared</h1>';
});