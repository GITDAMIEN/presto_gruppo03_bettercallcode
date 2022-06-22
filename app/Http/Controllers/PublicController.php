<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getHome() {
        $announces = Announcement::all();
        return view('welcome',compact('announces'));
    }

    public function categoryShow(Category $category){
        return view('categoryShow',compact('category'));
    }

    public function detailsAnnounce(Announcement $announce){
        return view('detailsAnnounce',compact('announce'));
    }
    
}
