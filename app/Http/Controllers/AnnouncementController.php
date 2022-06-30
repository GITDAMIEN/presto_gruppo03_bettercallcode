<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{

    public function allAnnouncements() {
        $announces = Announcement::where('is_accepted', true);
        return view('allAnnouncements', compact('announces'));
    }

    public function createAnnouncement() {
        return view('createAnnouncement');
    }

    public function deleteAnnounce(Announcement $announcement){
        $announcement->delete();
        return redirect(route('yourAnnouncements'));
    }


}
