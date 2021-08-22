<?php
use App\Http\Controllers\NotificarController;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\User\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/offline', function () {    
    return view('laravelpwa::offline');
});

 // *********************************************************************************************************
    /*
    * Grupo Middleware para Autenticar y verifcar que tiene Permiso asociado a su Roll
    */
// *********************************************************************************************************
Route::group(['middleware' => 'auth'], function () {
    Route::get('/link1', function ()    {
          
    });
    Route::resource('/notifications', Notification\NotificationController::class)->only(['index', 'show']);
    // *********************************************************************************************************
    /*
    * Rutas de Usuarios, para todas las operaciones
    */
    Route::get('/users', 'User\UserController@index')->name('users.index')->middleware('permiso:user,view');
    Route::get('/users/create', 'User\UserController@create')->name('users.create')->middleware('permiso:user,add');
    Route::post('/users', 'User\UserController@store')->name('users.store')->middleware('permiso:user,add');
    Route::get('/users/{user}/show', 'User\UserController@show')->name('users.show')->middleware('permiso:user,view');
    Route::get('/users/{user}/edit', 'User\UserController@edit')->name('users.edit')->middleware('permiso:user,edit');
    Route::post('/users/{user}', 'User\UserController@update')->name('users.update')->middleware('permiso:user,update');
    Route::delete('/users/{user}', 'User\UserController@destroy')->name('users.destroy')->middleware('permiso:user,delete');
    Route::get('/users/list', 'User\UserController@getUsers')->name('users.list')->middleware('permiso:user,view');
    Route::get('/user/profile', 'User\UserController@profile')->name('user.profile')->middleware('permiso:user,view');
    Route::post('/user/profile/{id}', 'User\UserController@update_avatar')->name('user.profile')->middleware('permiso:user,update');
    /*
    * Fin de las Rutas de Usuarios, para todas las operaciones
    */
    // *********************************************************************************************************
    Route::resource('/rols`', Rol\RolController::class);
    Route::resource('/modelos', Modelo\ModeloController::class);
    Route::resource('/permisos', Permiso\permisoController::class);
    Route::get('/dashboard', 'HomeController@dashboard');
});
// *********************************************************************************************************
    /*
    * FIN del Grupo Middleware para Autenticar y verifcar que tiene Permiso asociado a su Roll
    */
// *********************************************************************************************************

// La presente Ruta se encarga de validar los datos enviados al Correo de Usuario que se Registró
Route::get('register/confirm/{confirmation_code}', 'Auth\RegisterController@confirm')->name('auth.confirm');