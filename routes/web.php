<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ArchivedProjectsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BannedController;

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
Route::get('/dashusers',[UsersController::class,'index'])->name('showauth.users');
Route::get('/showPartners',[PartnerController::class,'index'])->name('showPartners');
Route::get('/showArchivedProjects',[ArchivedProjectsController::class,'index'])->name('showArchived.projects');
Route::post('/partnerStore',[PartnerController::class,'store'])->name('partner.store');
Route::delete('/deletepartner/{id}',[PartnerController::class,'delete'])->name('delete.partner');
Route::put('/updatepartner/{id}',[PartnerController::class,'update'])->name('updatepartner');
Route::post('/addproject', [ProjectController::class, 'store'])->name('project.store');
Route::delete('/projectdelete/{id}', [ProjectController::class, 'softDelete'])->name('project.sofdelete');
Route::post('/projectrestore/{id}', [ArchivedProjectsController::class, 'restore'])->name('project.restore');
Route::put('/updateprojectstatus/{id}', [ProjectController::class, 'updateSatus'])->name('project.updateStatus');
Route::put('/BannUser/{user}',[UsersController::class,'banUser'])->name('ban.user');
Route::get('/banned', [BannedController::class,'index'])->name('banned.user');


