<?php
/**
* Realizado por @author Tarsicio Carrizales Agosto 2021
* Correo: telecom.com.ve@gmail.com
*/
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
    * Grupo Middleware para Autenticar y verifcar que tiene Permiso asociado a su Rol
    */
// *********************************************************************************************************
Route::group(['middleware' => 'auth'], function () {
    
    Route::resource('/notifications', Notification\NotificationController::class)->only(['index', 'show']);
    // *********************************************************************************************************
    /*
    * Rutas de Usuarios, para todas las operaciones, con el Middleware (permiso) Integrado, para cada caso.
    */
    Route::get('/users', 'User\UserController@index')->name('users.index')->middleware('permiso:user,view');
    Route::get('/users/create', 'User\UserController@create')->name('users.create')->middleware('permiso:user,add');
    Route::post('/users', 'User\UserController@store')->name('users.store')->middleware('permiso:user,add');
    Route::get('/users/{user}/show', 'User\UserController@show')->name('users.show')->middleware('permiso:user,view');
    Route::get('/users/{user}/edit', 'User\UserController@edit')->name('users.edit')->middleware('permiso:user,edit');
    Route::post('/users/{user}', 'User\UserController@update')->name('users.update')->middleware('permiso:user,update');
    Route::post('/users/{user}', 'User\UserController@destroy')->name('users.destroy')->middleware('permiso:user,delete');
    Route::get('/users/list', 'User\UserController@getUsers')->name('users.list')->middleware('permiso:user,view');
    Route::get('/user/profile', 'User\UserController@profile')->name('user.profile')->middleware('permiso:user,view');
    Route::post('/user/profile/{id}', 'User\UserController@update_avatar')->name('user.profile')->middleware('permiso:user,update');
    /*
    * Fin de las Rutas de Usuarios, para todas las operaciones
    */
    // *********************************************************************************************************
    Route::resource('/rols`', Rol\RolController::class);
    Route::resource('/modulos', Modulo\ModuloController::class);
    // *********************************************************************************************************
    /*
    * Rutas de Permiso, para todas las operaciones, con el Middleware (permiso) Integrado, para cada caso.
    */
    Route::get('/permisos', 'Permiso\PermisoController@index')
    ->name('permisos.index')->middleware('permiso:permiso,view');
    Route::get('/permisos/create', 'Permiso\PermisoController@create')
    ->name('permisos.create')->middleware('permiso:permiso,add');
    Route::post('/permisos', 'Permiso\PermisoController@store')
    ->name('permisos.store')->middleware('permiso:permiso,add');
    Route::get('/permisos/{permiso}/show', 'Permiso\PermisoController@show')
    ->name('permisos.show')->middleware('permiso:permiso,view');
    Route::get('/permisos/{permiso}/edit', 'Permiso\PermisoController@edit')
    ->name('permisos.edit')->middleware('permiso:permiso,edit');
    Route::post('/permisos/{permiso}', 'Permiso\PermisoController@update')
    ->name('permisos.update')->middleware('permiso:permiso,update');
    Route::post('/permisos/{permiso}', 'Permiso\PermisoController@destroy')
    ->name('permisos.destroy')->middleware('permiso:permiso,delete');    
    /*
    * Fin de las Rutas de Permiso, para todas las operaciones
    */
    // *********************************************************************************************************

    Route::get('/dashboard', 'HomeController@dashboard');
});
// *********************************************************************************************************
    /*
    * FIN del Grupo Middleware para Autenticar y verifcar que tiene Permiso asociado a su Roll
    */
// *********************************************************************************************************

// La presente Ruta se encarga de validar los datos enviados al Correo de Usuario que se Registró
Route::get('register/confirm/{confirmation_code}', 'Auth\RegisterController@confirm')->name('auth.confirm');