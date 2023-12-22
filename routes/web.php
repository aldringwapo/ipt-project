<?php
use App\Http\Controllers\SiteController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

use function Ramsey\Uuid\v1;



Route::get('/', [SiteController::class, 'home'])->name('home');


Route::get('/guest', [GuestController::class, 'index']);
Route::get('/guest/create', [GuestController::class, 'create']);
Route::post('/guest/create', [GuestController::class, 'store']);
Route::get('/guest/{guest}', [GuestController::class, 'edit']);
Route::post('/guest/{guest}', [GuestController::class, 'update']);
Route::delete('/guest/delete/{guest}', [GuestController::class, 'delete']);



Route::get('/room', [RoomController::class, 'index']);
Route::get('/room/create', [RoomController::class, 'create']);
Route::post('/room/create', [RoomController::class, 'store']);
Route::get('/room/{room}', [RoomController::class, 'edit']);
Route::post('/room/{room}', [RoomController::class, 'update']);
Route::delete('/room/delete/{room}', [RoomController::class, 'delete']);



Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/booking/create', [BookingController::class, 'create']);
Route::post('/booking/create', [BookingController::class, 'store']);
Route::get('/booking/{user}', [BookingController::class, 'edit']);
Route::post('/booking/{user}', [BookingController::class, 'update']);
Route::delete('/booking/delete/{user}', [BookingController::class, 'delete']);


// Route::get('/trainees', [TraineesController::class, 'index'])->name('trainees');


// Route::get('/courses', [CoursesController::class, 'index'])->name('courses');
