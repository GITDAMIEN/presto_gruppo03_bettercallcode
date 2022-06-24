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
        'title'=>'required|min:4|max:20',
        'description'=>'required|min:8',
        'category'=>'required',
        'price'=>'required|numeric',
    ];
    
    protected $messages=[
        'required'=>'Il campo :attribute è obbligatorio',
        'min'=>'Il campo :attribute è troppo corto',
        'max'=>'Il campo :attribute è troppo lungo',
        'numeric'=>"Il prezzo dev'essere un numero"
    ];

    public function testClick($id){
        $this->category= $id;
        
    }
    
    public function createAnnouncement(){
        $this->validate();
        $category = Category::find($this->category);
        $announcement=$category->announcements()->create([
            
                'title'=>$this->title,
                'description'=>$this->description,
                'price'=>$this->price,
        ]);
        
        Auth::user()->announcements()->save($announcement);
        
        $this->cleanForm();
        return redirect()->route('allAnnouncements')->with('message', 'Annuncio inviato correttamente. Sarà sottoposto a revisione prima di essere visibile su Presto.it');
    }
    
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    public function cleanForm(){
        $this->title='';
        $this->description='';
        $this->category='';
        $this->price='';
    }
    
    public function render()
    {
        return view('livewire.create-announcement');
    }
}
