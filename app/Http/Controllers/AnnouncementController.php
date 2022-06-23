<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{

    public function allAnnouncements() {
        $announces = Announcement::where('is_accepted', true)->paginate(4);
        return view('allAnnouncements', compact('announces'));
    }

    public function createAnnouncement() {
        return view('createAnnouncement');
    }


}
