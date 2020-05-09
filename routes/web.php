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
// =============== Route Grouping ===================
// Route::name('user.')->prefix('users')->group(function () {
//     Route::get('/', function () {
//         return "List users";
//     })->name("index");
    
//     Route::get('/{id}', function ($id) {
//         return $id;
//     })->name("profile");
    
//     Route::put('/{id}', function ($id) {
//         return "Edit user";
//     })->name("update");
// });
// ============ Another way of Route Grouping ===========
// Route::group(['prefix' => 'users'], function () {
//     Route::get('/users', function () {
//         return "List users";
//     });
    
//     Route::get('users/{id}', function ($id) {
//         return $id;
//     })->name("profile");
    
//     Route::put('user/{id}', function ($id) {
//         return "Edit user";
//     });
// });

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('there', function () {
//     return route("user",5);
// });
// Route::any('users/{id}', function ($id) {
//     return $id;
// });
Route::match(['get', 'post'], '/', function () {
    return view('auth.login');
});
// Route::permanentRedirect('/here', '/there');
// Route::view('/demo', 'demo');

Route::fallback(function(){
    return "<h1>Route not found !! Please Write a valid route..</h1>";
});
//============ Authentication ==============
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//============ CRUD Operations on Phones ==============
Route::resource('phones', 'PhoneController')->middleware("auth");
//============ CRUD Operations on Contacts ==============
Route::resource('contacts', 'ContactController')->middleware("auth");
