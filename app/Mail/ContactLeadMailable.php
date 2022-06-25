<?php

namespace App\Mail;

use App\Models\User;
use App\Models\ContactLead;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;


class ContactLeadMailable extends Mailable
{
    use Queueable, SerializesModels;

    public ContactLead $lead;
    
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ContactLead $lead, User $user)
    {
        $this->lead = $lead;
        $this->user = $user;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('presto.it@noreply.it')->markdown('emails.contact-lead.new-lead');
    }
}
