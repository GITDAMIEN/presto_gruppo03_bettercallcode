<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
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

// AnnouncementController routes
Route::get('/createAnnouncement', [AnnouncementController::class,"createAnnouncement"])->name('createAnnouncement');
Route::get('/allAnnouncements',[AnnouncementController::class,"allAnnouncements"])->name('allAnnouncements');

