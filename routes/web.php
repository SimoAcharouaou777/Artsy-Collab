<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController;

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
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/showUsers',[DashboardController::class,'showUsers'])->name('showUsers');
Route::get('/showPartners',[PartnerController::class,'index'])->name('showPartners');
Route::post('/partnerStore',[PartnerController::class,'store'])->name('partner.store');
Route::delete('/deletepartner/{id}',[PartnerController::class,'delete'])->name('delete.partner');
Route::put('/updatepartner/{id}',[PartnerController::class,'update'])->name('updatepartner');