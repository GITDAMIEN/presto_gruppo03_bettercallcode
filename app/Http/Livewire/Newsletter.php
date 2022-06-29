<?php

namespace App\Http\Livewire;

use App\Models\NewsletterEmail;
use Livewire\Component;
use App\Models\NewsletterNew;
use Illuminate\Support\Facades\Auth;

class Newsletter extends Component
{

    public $useremail;

    public function __construct()
    {
        if(Auth::check())
            $this->useremail = Auth::user()->email;
        else
            $this->useremail = 'email@mail.it';
    }

    public function newsletter(){
        // dd($this->useremail);
        NewsletterEmail::create(['emailfornewsletter'=>$this->useremail]);

        return redirect()->route('welcome')->with('message', 'Grazie per esserti iscritto alla nostra newsletter!');
    }

    public function render()
    {
        return view('livewire.newsletter');
    }
}
