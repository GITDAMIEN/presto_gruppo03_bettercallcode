<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use App\Models\Announcement;
use App\Models\Category;
use Faker\Core\Number;
use Mockery\Undefined;

use function PHPUnit\Framework\isInfinite;

class AnnouncementCards extends Component
{
    public $sort='asc';
    public $announces;
    public $title;
    public $category=null;
    public $minPrice=0;
    public $maxPrice=10000;
    public $flag = 0;

    public function mount(){
    
        $this->announces = Announcement::where('is_accepted',true)->get();
    }

    public function render()
    {

        return view('livewire.announcement-cards');
    }

    // public function initialSetting(){
    //     $this->flag = 1;
    //     if($this->minPrice == null){
    //         $this->minPrice = 0;
    //     }
    //     if($this->maxPrice == null){
    //         $this->maxPrice = 10000;
    //     }
    // }

    public function updated(){
        $announce = Announcement::with(relations:'category');


        if(!empty($this->title)){
            $announce = $announce->where('title','like','%'.$this->title.'%')->orWhere('description', 'like', '%'.$this->title.'%') ;
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

        
        if(!empty($this->category) && $this->category!="all"){
            $announce = $announce->when($this->category, function($query){
                $query->where('category_id', $this->category);
            });
        }
        
        
        // if($this->flag==0){
        //     $this->initialSetting();
        // }
        if($this->minPrice==null){
            $this->minPrice = 0;
        }
        if($this->maxPrice==null){
            $this->maxPrice = 10000;
        }


        if($this->minPrice>=0 || $this->maxPrice!=0){   
            
            $announce = $announce->where('price','>=',$this->minPrice)->where('price','<=',$this->maxPrice);  
        }
      

        $this->announces = $announce->get();
        
    }


}
