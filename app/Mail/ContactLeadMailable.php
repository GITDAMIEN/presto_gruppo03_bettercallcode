<?php

namespace App\Mail;

use App\Models\User;
use ReflectionClass;
use App\Models\ContactLead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\File as FacadesFile;

class ContactLeadMailable extends Mailable
{
    use Queueable, SerializesModels;

    public ContactLead $lead;
    
    public $user;
    public $cv;
    public $path = 'path';

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactLead $lead, User $user, $cv)
    {
        $this->lead = $lead;
        $this->user = $user;
        $this->cv = $cv;
    }

    function accessProtected($cv, $path) {

        $reflection = new ReflectionClass($cv);
        $property = $reflection->getProperty($path);
        $property->setAccessible(true);
        $pdfpath = $property->getValue($cv);
        return $pdfpath;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $pdfpath = $this->accessProtected($this->cv, $this->path);

        // dd($this->lead, $this->user, $this->cv);
        // dd($pdfpath);
        return $this->from('presto.it@noreply.it')->view('mail.becomeRevisor')->attachFromStorage($pdfpath, 'Curriculum.pdf', [
            'mime' => 'application/pdf'
        ]);
    }
}
