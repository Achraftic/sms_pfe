<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\setup\SetupMangementController ;

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

Route::get('/', function () {
    return view('auth.login');
});

require __DIR__.'/auth.php';

require __DIR__.'/auth.php';

require __DIR__.'/auth.php';

require __DIR__.'/auth.php';

Route::get('/dashboard', function () {return view('admin.index');})->name('admin.index')->middleware('RedirectIfNotLoggedIn');


Route::get('/logout', [AdminController::class,'logout'] )->name('admin.logout');

Route::prefix('users')->group(function(){

    Route::get('/view',[UserController::class,'index'])->name('users.index')->middleware('RedirectIfNotLoggedIn');
    Route::get('/create',[UserController::class,'create'])->name('users.create')->middleware('RedirectIfNotLoggedIn');
    Route::post('/store',[UserController::class,'store'])->name('users.store');

    Route::get('/edit/{id}',[UserController::class,'edit'])->name('users.edit')->middleware('RedirectIfNotLoggedIn');
    Route::post('/update/{id}',[UserController::class,'update'])->name('users.update');
    Route::get('/delte/{id}',[UserController::class,'destroy'])->name('users.delete');
});

Route::prefix('profile')->group(function(){

    Route::get('/',[ProfileController::class,'index'])->name('profile.index')->middleware('RedirectIfNotLoggedIn');;


    Route::get('/edit',[ProfileController::class,'edit'])->name('profile.edit')->middleware('RedirectIfNotLoggedIn');;
    Route::post('/update',[ProfileController::class,'update'])->name('profile.update');
    Route::get('/password/view',[ProfileController::class,'passwordView'])->name('password.view')->middleware('RedirectIfNotLoggedIn');;
    Route::post('/password/view',[ProfileController::class,'passwordUpdate'])->name('password.update')->middleware('RedirectIfNotLoggedIn');;

});

Route::prefix('setups')->group(function(){

    Route::get('student/class/view',[SetupMangementController::class,'index'])->name('student.class.index')->middleware('RedirectIfNotLoggedIn');;
    Route::get('student/class/create',[SetupMangementController::class,'create'])->name('student.class.create')->middleware('RedirectIfNotLoggedIn');;
    Route::post('student/class/store',[SetupMangementController::class,'store'])->name('student.class.store');
    Route::get('student/class/edit/{id}',[SetupMangementController::class,'edit'])->name('student.class.edit')->middleware('RedirectIfNotLoggedIn');;
     Route::post('student/class/update{id}',[SetupMangementController::class,'update'])->name('student.class.update');
     Route::get('student/class/delte{id}',[SetupMangementController::class,'destroy'])->name('student.class.delete');




});
