<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;
use App\Models\Category;
use Faker\Core\Number;

class AnnouncementCards extends Component
{
    public $sort='asc';
    public $announces;
    public $title;
    public $category;
    public $minPrice=0;
    public $maxPrice=10000;

    public function mount(){
        $this->announces = Announcement::all();
    }

    public function render()
    {
        return view('livewire.announcement-cards');
    }

    public function updated(){
        $announce = Announcement::with(relations:'category');

        if(!empty($this->title)){
            $announce = $announce->where('title','like','%'.$this->title.'%');
        }
        if($this->sort=='AtoZ'){
            $announce = $announce->orderBy('title',"asc");
        }
        if($this->sort=='ZtoA'){
            $announce = $announce->orderBy('title',"desc");
        }
        if($this->sort=='fromCheaper'){
            $announce = $announce->orderBy('price',"asc");
        }
        if($this->sort=='toCheaper'){
            $announce = $announce->orderBy('price',"desc");
        }
        if($this->sort=='newest'){
            $announce = $announce->orderBy('updated_at',"desc");
        }
        if($this->sort=='oldest'){
            $announce = $announce->orderBy('updated_at',"asc");
        }

        if(!empty($this->category)){
            $announce = $announce->where((Category::select('name')->whereColumn('categories.id','announcements.category_id')),'like','%'.$this->category.'%');
            
        }

       
        if(!empty($this->minPrice) && !empty($this->maxPrice)){   
            $announce = $announce->where('price','>=',$this->minPrice)->where('price','<=',$this->maxPrice);  
        }
        $this->announces = $announce->get();
    }


}
