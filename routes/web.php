<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Models\Announcement;

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

// PublicController routes
Route::get('/',[PublicController::class,"getHome"])->name('welcome');
Route::get('/category/{category}',[PublicController::class ,"categoryShow"])->name('categoryShow');
Route::get('/details/announce/{announce}',[PublicController::class,"detailsAnnounce"])->name('detailsAnnounce');

// AnnouncementController routes
Route::get('/createAnnouncement', [AnnouncementController::class,"createAnnouncement"])->middleware('auth')->name('createAnnouncement');
Route::get('/allAnnouncements',[AnnouncementController::class,"allAnnouncements"])->name('allAnnouncements');
Route::delete('/deleteAnnounce/{user}',[AnnouncementController::class,"deleteAnnounce"])->name('deleteAnnounce');

// RevisorController routes
Route::get('/revisore/home', [RevisorController::class, "index"])->middleware('isRevisorMiddleware')->name('revisor.index');
Route::patch('/revisore/accetta/annuncio/{announcement}', [RevisorController::class, "acceptAnnouncement"])->middleware('isRevisorMiddleware')->name('revisor.accept_announcement');
Route::patch('/revisore/rifiuta/annuncio/{announcement}', [RevisorController::class, "refuseAnnouncement"])->middleware('isRevisorMiddleware')->name('revisor.refuse_announcement');

// Revisor request and confirmation via email
Route::get('/revisore/diventaRevisore/', [RevisorController::class, "becomeRevisor"])->middleware('auth')->name('becomeRevisor');
Route::get('/revisore/confermaRevisore/{user}', [RevisorController::class, "makeRevisor"])->middleware('auth')->name('makeRevisor');

// form via email
Route::get('/contact', function () {return view('contact');});

//rotta per multilingua//
Route::post('/lingua/{lang}',[PublicController::class,'setLanguage'])->name('set_language_locale');

// Your profile
Route::get('/announcementsBy/{user}', [PublicController::class, 'yourAnnouncements'])->middleware('auth')->name('yourAnnouncements');