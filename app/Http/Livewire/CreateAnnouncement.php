<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\CreateAnnouncement;

class CreateAnnouncement extends Component
{

    public $title;
    public $description;
    public $category;
    public $price;

    protected $rules=[
        'title'=>'required|max:20',
        'description'=>'required',
        'category'=>'required',
        'price'=>'required',
    ];

    public function createAnnouncement(){

        $category = Category::find($this->category);
        
        $announcement=$category->announcements()->create([

            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
        ]);
        Auth::user()->announcements()->save($announcement);
        
        return redirect()->route('allAnnouncements')->with('message', 'Annuncio inserito correttamente');
    }



    public function render()
    {
        return view('livewire.create-announcement');
    }
}
