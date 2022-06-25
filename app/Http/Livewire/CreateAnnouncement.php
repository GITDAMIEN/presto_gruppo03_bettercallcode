<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Jobs\ResizeImage;
use Illuminate\Http\File;
use App\Models\Announcement;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\CreateAnnouncement;
use Illuminate\Support\Facades\File as FacadesFile;

class CreateAnnouncement extends Component
{
    use WithFileUploads;
    
    public $title;
    public $description;
    public $category;
    public $price;
    public $images = [];
    public $temporary_images;
    
    protected $rules=[
        'title'=>'required|min:4|max:20',
        'description'=>'required|min:8',
        'category'=>'required',
        'price'=>'required|numeric',
        'images.*'=>'image|max:1024',
        'temporary_images.*'=>'image|max:1024',
    ];
    
    protected $messages=[
        'required'=>'Il campo :attribute è obbligatorio',
        'min'=>'Il campo :attribute è troppo corto',
        'max'=>'Il campo :attribute è troppo lungo',
        'numeric'=>"Il prezzo dev'essere un numero",
        'temporary_images.required' => 'L\'immagine è richiesta',
        'temporary_images.*.image' => 'I files devono essere immagini',
        'temporary_images.*.max' => 'L\'immagine dev\'essere massimo 1mb',
        'images.image' => 'L\'immagine dev\'essere un\'immagine',
        'images.max' => 'L\'immagine dev\'essere massimo 1mb',

    ];

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*'=>'image|max:1024',
        ])){
            foreach($this->temporary_images as $image){
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key,array_keys($this->images))){
            unset($this->images[$key]);
        }
    }

    public function testClick($id){
        $this->category= $id;
        
    }


    public function store(){
        $this->validate();
        $category = Category::find($this->category);
        $announcement=$category->announcements()->create([
            
                        'title'=>$this->title,
                        'description'=>$this->description,
                        'price'=>$this->price,
                ]);
        if(count($this->images)){
            foreach($this->images as $image){
                // $announcement->images()->create(['path'=>$image->store('images', 'public')]);
                $newFileName = "announcements/{$announcement->id}";
                $newImage =  $announcement->images()->create(['path'=>$image->store($newFileName, 'public')]);

                dispatch(new ResizeImage($newImage->path , 600, 450));
            }

            // File::deleteDirectory(storage_path('/app/livewire-tmp'));
            FacadesFile::deleteDirectory(storage_path('/app/livewire-tmp'));

        }

        Auth::user()->announcements()->save($announcement);

        return redirect()->route('allAnnouncements')->with('message', 'Annuncio inviato correttamente. Sarà sottoposto a revisione prima di essere visibile su Presto.it');
        $this->cleanForm();
    }


    
    
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    
    public function cleanForm(){
        $this->title='';
        $this->description='';
        $this->category='';
        $this->price='';
        $this->images = [];
        $this->temporary_images = [];
    }
    
    public function render()
    {
        return view('livewire.create-announcement');
    }
}
