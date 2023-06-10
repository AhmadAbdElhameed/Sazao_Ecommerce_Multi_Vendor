<?php


use App\Http\Controllers\Backend\VendorController;
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


//***     Vendor Routes      ***//
//Route::get('vendor/dashboard',[VendorController::class,'home'])->middleware(['auth','role:vendor'])->name('admin.dashboard');

Route::get('dashboard',[VendorController::class,'home'])->name('dashboard');
