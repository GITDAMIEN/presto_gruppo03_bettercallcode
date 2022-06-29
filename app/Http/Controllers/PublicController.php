<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getHome() {
        $announcements = Announcement::all();
        return view('welcome',compact('announcements'));
    }

    public function categoryShow(Category $category){
        return view('categoryShow',compact('category'));
    }

    public function detailsAnnounce(Announcement $announce){
        $announcements = Announcement::where('is_accepted',true)->where('category_id',$announce->category_id)->latest()->get()->take(3);
        return view('detailsAnnounce',compact('announce','announcements'));
    }
    
    public function setLanguage($lang){
        
        session()->put('locale' ,$lang);
        return redirect()->back();
    }

    public function yourAnnouncements(User $user){
        $announcements = Announcement::where('is_accepted',true)->where('user_id', $user->id)->latest()->get();
        return view('yourAnnouncements', compact('announcements'));
    }
}
