<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','category','price'];
    
    public function category(){
        return $this->belongTo(Category::class);
    }

    public function user(){
        return $this->belongTo(User::class);
    }
}
