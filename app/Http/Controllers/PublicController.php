<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function getHome() {
        return view('welcome');
    }

    public function categoryShow(Category $category){
        return view('categoryShow',compact('category'));
    }
    
}
