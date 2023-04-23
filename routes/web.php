<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\setup\YearStudentController;
use App\Http\Controllers\setup\groupStudentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\setup\SetupMangementController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

require __DIR__ . '/auth.php';

require __DIR__ . '/auth.php';

require __DIR__ . '/auth.php';

require __DIR__ . '/auth.php';

Route::get('/dashboard', function () {return view('admin.index');})->name('admin.index')->middleware('RedirectIfNotLoggedIn');

Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::prefix('users')->group(function () {

    Route::get('/view', [UserController::class, 'index'])->name('users.index')->middleware('RedirectIfNotLoggedIn');
    Route::get('/create', [UserController::class, 'create'])->name('users.create')->middleware('RedirectIfNotLoggedIn');
    Route::post('/store', [UserController::class, 'store'])->name('users.store');

    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('users.edit')->middleware('RedirectIfNotLoggedIn');
    Route::post('/update/{id}', [UserController::class, 'update'])->name('users.update');
    Route::get('/delte/{id}', [UserController::class, 'destroy'])->name('users.delete');
});

Route::prefix('profile')->group(function () {

    Route::get('/', [ProfileController::class, 'index'])->name('profile.index')->middleware('RedirectIfNotLoggedIn');;

    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('RedirectIfNotLoggedIn');;
    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/password/view', [ProfileController::class, 'passwordView'])->name('password.view')->middleware('RedirectIfNotLoggedIn');;
    Route::post('/password/view', [ProfileController::class, 'passwordUpdate'])->name('password.update')->middleware('RedirectIfNotLoggedIn');;

});

Route::prefix('setups')->group(function () {
//setups Class
    Route::get('student/class/view', [SetupMangementController::class, 'index'])->name('student.class.index')->middleware('RedirectIfNotLoggedIn');
    Route::get('student/class/create', [SetupMangementController::class, 'create'])->name('student.class.create')->middleware('RedirectIfNotLoggedIn');
    Route::post('student/class/store', [SetupMangementController::class, 'store'])->name('student.class.store');
    Route::get('student/class/edit/{id}', [SetupMangementController::class, 'edit'])->name('student.class.edit')->middleware('RedirectIfNotLoggedIn');
    Route::post('student/class/update{id}', [SetupMangementController::class, 'update'])->name('student.class.update');
    Route::get('student/class/delte{id}', [SetupMangementController::class, 'destroy'])->name('student.class.delete')->middleware('RedirectIfNotLoggedIn');

    // setups Year
    Route::get('student/year/view', [YearStudentController::class, 'index'])->name('student.year.index')->middleware('RedirectIfNotLoggedIn');;
    Route::get('student/year/create', [YearStudentController::class, 'create'])->name('student.year.create')->middleware('RedirectIfNotLoggedIn');
    Route::post('student/year/store', [YearStudentController::class, 'store'])->name('student.year.store');
    Route::get('student/year/edit/{id} ', [YearStudentController::class, 'edit'])->name('student.year.edit')->middleware('RedirectIfNotLoggedIn');
    Route::post('student/year/update/{id} ', [YearStudentController::class, 'update'])->name('student.year.update');
    Route::get('student/year/delete/{id} ', [YearStudentController::class, 'destroy'])->name('student.year.delete')->middleware('RedirectIfNotLoggedIn');

    // groupe student


    Route::get('student/group/view', [groupStudentController::class, 'index'])->name('student.group.index')->middleware('RedirectIfNotLoggedIn');;
    Route::get('student/group/create', [groupStudentController::class, 'create'])->name('student.group.create')->middleware('RedirectIfNotLoggedIn');
    Route::post('student/group/store', [groupStudentController::class, 'store'])->name('student.group.store');
    Route::get('student/group/edit/{id} ', [groupStudentController::class, 'edit'])->name('student.group.edit')->middleware('RedirectIfNotLoggedIn');
    Route::post('student/group/update/{id} ', [groupStudentController::class, 'update'])->name('student.group.update');
    Route::get('student/group/delete/{id} ', [groupStudentController::class, 'destroy'])->name('student.group.delete')->middleware('RedirectIfNotLoggedIn');

});
