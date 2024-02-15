<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ArchivedProjectsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\BannedController;
use App\Http\Controllers\CollaborationRequest;
use App\Http\Controllers\ProfileController;
use App\Models\Partner;
use App\Models\Project;

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
    $recentPartners = Partner::latest()->take(6)->get();
    $projects = Project::with('partner')->where('status', 'published')->get();
        return view('home', compact('recentPartners','projects'));
    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware(['auth', 'admin']);
Route::get('/dashusers',[UsersController::class,'index'])->name('showauth.users')->middleware(['auth','admin']);
Route::get('/showPartners',[PartnerController::class,'index'])->name('showPartners')->middleware(['auth','admin']);
Route::get('/showArchivedProjects',[ArchivedProjectsController::class,'index'])->name('showArchived.projects')->middleware(['auth','admin']);
Route::post('/partnerStore',[PartnerController::class,'store'])->name('partner.store')->middleware(['auth','admin']);
Route::delete('/deletepartner/{id}',[PartnerController::class,'delete'])->name('delete.partner')->middleware(['auth','admin']);
Route::put('/updatepartner/{id}',[PartnerController::class,'update'])->name('updatepartner')->middleware(['auth','admin']);
Route::post('/addproject', [ProjectController::class, 'store'])->name('project.store')->middleware(['auth','admin']);
Route::delete('/projectdelete/{id}', [ProjectController::class, 'softDelete'])->name('project.sofdelete')->middleware(['auth','admin']);
Route::post('/projectrestore/{id}', [ArchivedProjectsController::class, 'restore'])->name('project.restore')->middleware(['auth','admin']);
Route::put('/updateprojectstatus/{id}', [ProjectController::class, 'updateSatus'])->name('project.updateStatus')->middleware(['auth','admin']);
Route::put('/BannUser/{user}',[UsersController::class,'banUser'])->name('ban.user')->middleware(['auth','admin']);
Route::get('/banned', [BannedController::class,'index'])->name('banned.user');
Route::get('/details/{id}', [DetailsController::class, 'index'])->name('project.details');
Route::get('/partnerdashboard',[CollaborationRequest::class,'showdashboard'])->name('partner.dashboard')->middleware(['auth','partner']);
Route::post('/sendRequest/{id}',[CollaborationRequest::class,'sendRequest'])->name('send.request');
Route::put('/acceptUserRequest/{id}', [CollaborationRequest::class,'acceptUserRequest'])->name('acceptUser.Request')->middleware(['auth','partner']);
Route::put('/refuseUserRequest/{id}',[CollaborationRequest::class,'refuseRequest'])->name('refuseUser.Request')->middleware(['auth','partner']);
Route::get('/ShowAceeptedUsers',[CollaborationRequest::class,'showAcceptedUsers'])->name('accepted.users')->middleware(['auth','partner']);
Route::get('/showRefusedUsers',[CollaborationRequest::class,'showRefusedUsers'])->name('refused.Users')->middleware(['auth','partner']);
Route::delete('/deleteUser/{id}',[UsersController::class,'deleteUser'])->name('delete.User')->middleware(['auth','admin']);
Route::put('/updateUserRole/{id}',[UsersController::class,'UpdateUserRole'])->name('update.user.role')->middleware(['auth','admin']);
Route::get('/partnerProfile/{id}',[PartnerController::class,'partnerProfile'])->name('partner.Profile');



Route::middleware(['auth'])->group(function () {
    Route::resource('profile', ProfileController::class);

});