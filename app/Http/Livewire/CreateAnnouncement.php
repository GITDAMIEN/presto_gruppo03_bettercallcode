<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;
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

        // dd($this->title, $this->description, $this->price, $this->category);
        Announcement::create(
            ['title'=>$this->title,
            'description'=>$this->description,
            'category'=>$this->category,
            'price'=>$this->price
        ]);

        return redirect()->route('allAnnouncements')->with('message', 'Annuncio inserito correttamente');
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
