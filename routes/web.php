<?php
use App\Http\Controllers\NotificarController;
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
Auth::routes();
Route::get('/deny', function () {    
    return view('deny');
});
Route::get('/check_your_mail', function () {
    return view('adminlte::mail.check_your_mail');
});

Route::get('register/confirm/{confirmation_code}', 'Auth\RegisterController@confirm')->name('auth.confirm');

Route::get('/', function () {
    return view('welcome');
});
Route::get('/dashboard', 'HomeController@dashboard');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
});
