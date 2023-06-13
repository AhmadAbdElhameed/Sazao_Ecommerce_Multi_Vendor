<?php


use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use Illuminate\Support\Facades\Route;

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


//***     Admin Routes      ***//
//Route::get('admin/dashboard',[AdminController::class,'home'])->middleware(['auth','role:admin'])->name('admin.dashboard');
Route::get('dashboard',[AdminController::class,'home'])->name('dashboard');

//***     Profile Routes      ***//
Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::post('profile/update',[ProfileController::class,'update'])->name('profile.update');
Route::post('profile/update/password',[ProfileController::class,'updatePassword'])->name('profile.update.password');


//***     Slider Routes      ***//
Route::get('slider',[SliderController::class,'index'])->name('slider.index');
Route::get('slider/create',[SliderController::class,'create'])->name('slider.create');
Route::post('slider/store',[SliderController::class,'store'])->name('slider.store');
