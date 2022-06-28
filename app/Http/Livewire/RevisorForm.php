<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Actions\EmailContactLeadAction;

class RevisorForm extends Component
{

    use WithFileUploads;

    public $messagetxt;
    public $cv;

    protected $rules = [
        'messagetxt' => 'required',
        'cv' => 'required|mimes:pdf|max:1024' // 1MB max
    ];

    protected $messages = [
        'required' => 'Campo obbligatorio',
        'max' => 'Il file deve pesare al massimo 1MB',
        'mimes' => 'Il file deve essere un pdf'
    ];

    public function sendForm(){

        $validated = [
            $this->validate(),
            Auth::user()
        ];
        
        // dd($validated);
        (new EmailContactLeadAction)($validated);

        $form = [
            'messagetxt' => $this->messagetxt,
            'cv' => $this->cv
        ];
        // dd($form);

        // $this->cv->store('files');

        return redirect(route('becomeRevisor', $form));
    }

    public function render()
    {
        return view('livewire.revisor-form');
    }
}
