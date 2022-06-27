<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Category;

class LastAnnouncements extends Component
{
    public $announces;
    public $category;
   

    public function mount(){

        $this->announces = Announcement::where('is_accepted',true)->latest()->get()->take(6);
        foreach($this->announces as $x){
            if(strlen($x->description) > 40 ){
                $x->description = mb_strimwidth($x->description, 0, 40, " (...)");
            }
        }
        // $this->announces = Announcement::all();
    }


    
    public function render()
    {
        return view('livewire.last-announcements');
    }
    
    // Barra categoria per visualizzare ultimi annunci sulle homepage

    // public function testClick($id){
    //     $this->category = $id;
    //     $this->announces=Announcement::where('category_id', $this->category)->get();
    //     $this->announces = Announcement::where('is_accepted',true)->latest()->get()->take(3);

    //     $this->announces = $this->announces->where('category_id', $this->category);

    // }
}
