<?php

use App\Http\Controllers\CallingScheduleController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SchoolClassesController;
use App\Http\Controllers\SupportsController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::controller(PagesController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/login', 'login')->middleware('guest')->name('login');
    Route::get('/register', 'register')->middleware('auth')->name('register');
    Route::get('/profile', 'profile')->middleware('auth')->name('profile');
    Route::get('/schedule', 'schedule')->name('schedule');
    Route::get('/users/dashboard', 'dashboard')->middleware('auth')->name('dashboard');
    Route::get('/user/support', 'userSupport')->name('user.support');
    Route::get('/dashboard/support', 'dashboardSupport')->name('dashboard.support');
    Route::get('/items', 'showItems')->middleware('auth')->name('items');
    Route::get('/schedules', 'scheduleUser')->name('schedules.user');
});

Route::controller(UsersController::class)->group(function () {
    Route::post('/register', 'store')->middleware('auth')->name('auth.register');
    Route::post('/login', 'login')->name('auth.login');
    Route::post('/logout', 'destroy')->middleware('auth')->middleware('auth')->name('logout');
    Route::post('/update/{user}', 'update')->middleware('auth')->name('update');
    Route::post('add/student', 'addStudent')->middleware('auth')->name('add.student');
});

Route::controller(ClassroomController::class)->group(function () {
    Route::post('/create/classroom', 'store')->middleware('auth')->name('create.classroom');
    Route::post('/update/classrooms/{classroom}', 'update')->middleware('auth')->name('update.classroom');
    Route::post('/delete/classrooms/{classroom}', 'destroy')->middleware('auth')->name('destroy.classroom');
});

Route::controller(SchoolClassesController::class)->group(function () {
    Route::get('/class', 'show')->name('class');
    Route::post('/add/class', 'store')->name('add.class');
    Route::post('/update/classes/{class}', 'update')->name('update.class');
    Route::post('/delete/classes/{class}', 'destroy')->name('destroy.class');
})->middleware('auth');
Route::controller(CallingScheduleController::class)->group(function () {
    Route::post('/add/call', 'store')->name('add.call');
    Route::post('/update/calls/{call}', 'update')->name('update.call');
    Route::post('/delete/calls/{call}', 'delete')->name('delete.call');
})->middleware('auth');

Route::controller(ScheduleController::class)->group(function () {
    Route::post('/add/schedules', 'store')->name('add.schedule');
    Route::post('/update/schedules/{schedule}', 'update')->name('update.schedule');
    Route::post('/delete/schedules/{schedule}', 'delete')->name('delete.schedule');
})->middleware('auth');
Route::controller(SupportsController::class)->group(function () {
    Route::post('/support/store', 'store')->name('support.store');
    Route::get('/supports', 'show')->middleware('auth')->name('supports.show');
    Route::post('/supports/answer/{support}', 'answer')->middleware('auth')->name('support.answer');
});

Route::controller(ItemsController::class)->group(function () {
    Route::post('/add/item', 'store')->name('add.item');
    Route::post('/update/items/{item}', 'update')->name('update.item');
    Route::post('/delete/items/{item}', 'delete')->name('delete.item');
})->middleware('auth');

Route::controller(TeachersController::class)->group(function (){
    Route::post('/add/teacher', 'store')->name('add.teacher');
    Route::post('/update/teachers/{teacher}', 'update')->name('update.teacher');
    Route::post('/delete/teachers/{teacher}', 'delete')->name('delete.teacher');
})->middleware('auth');
