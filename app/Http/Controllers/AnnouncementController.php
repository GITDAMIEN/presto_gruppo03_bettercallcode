<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function allAnnouncements() {
        return view('allAnnouncements');
    }

    public function createAnnouncement() {
        return view('createAnnouncement');
    }
}
