<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;


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
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest','PreventBackHistory'])->group(function(){

        Route::view('/login','dashboard.user.login')->name('login');
        Route::view('/register','dashboard.user.register')->name('register');
        Route::post('/createuser',[UserController::class,'createuser'])->name('createuser');
        Route::post('/checkuser',[UserController::class,'checkuser'])->name('checkuser');

    });

    Route::middleware(['auth','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::post('/logout',[UserController::class,'logout'])->name('logout');

    });
});


// Route::prefix('admin')function() {
//     Route::middleware(['guest:admin'])->group(function() {
//         Route::view('/login','dashboard.admin.login')->name('login');   
//         Route::post('/adminlogin',[AdminController::class,'adminlogin'])->name('adminlogin');
//     });

//     Route::middleware(['auth:admin'])->group(function() {
//         Route::view('/home','dashboard.admin.home')->name('home');

//     });
// });

Route::group(['prefix' => 'admin'], function () {
    Route::middleware(['guest:admin', 'PreventBackHistory'])->group(function() {
        Route::get('/login', [AdminController::class,'adminlogins'])->name('adminlogins');   
        Route::post('/adminlogin',[AdminController::class,'adminlogin'])->name('adminlogin');
    });

    Route::middleware(['auth:admin', 'PreventBackHistory'])->group(function() {
        Route::get('/home',[AdminController::class,'home'])->name('home');
    });
});
