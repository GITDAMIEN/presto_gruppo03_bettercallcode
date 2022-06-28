<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
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
        return view('detailsAnnounce',compact('announce'));
    }
    
    public function setLanguage($lang){
        
        session()->put('locale' ,$lang);
        return redirect()->back();
    }
}
