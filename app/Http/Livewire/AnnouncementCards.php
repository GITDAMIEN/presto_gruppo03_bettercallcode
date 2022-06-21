<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class AnnouncementCards extends Component
{
    public $announces;
    public $title;
    public $category;
    public $minPrice;
    public $maxPrice;

    public function mount(){
        $this->announces = Announcement::all();
    }

    public function render()
    {
        return view('livewire.announcement-cards');
    }

    public function searching(){
        $announce = Announcement::query();
        if(!empty($this->title)){
            $announce = $announce->where('title','like','%'.$this->title.'%');
        }

        // if(!empty($this->category)){
        //     $announce = $announce->where('category','like','%'.$this->category.'%');
        // }

        if(!empty($this->minPrice)){
            $announce = $announce->where('price','>=',$this->minPrice);
        }
        if(!empty($this->maxPrice)){
            $announce = $announce->where('price','<=',$this->maxPrice);
        }
        $this->announces = $announce->get();
    }


}
