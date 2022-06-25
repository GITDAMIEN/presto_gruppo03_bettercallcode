<?php

namespace App\Actions;

use App\Models\User;
use App\Models\ContactLead;
use App\Mail\ContactLeadMailable;
use Illuminate\Support\Facades\Mail;

class EmailContactLeadAction
{
    public function __invoke(array $formData)
    {
        $contactLead = $this->getOrCreateContactLead($formData);
        $this->sendContactLeadToEmail($contactLead, $formData[1]);
    }

    private function getOrCreateContactLead(array $formData): ContactLead
    {
        return ContactLead::firstOrCreate($formData[0]);
    }

    private function sendContactLeadToEmail(ContactLead $contactLead, User $user): void
    {
        Mail::to(['amministrazione@presto.it'])
            ->send(new ContactLeadMailable($contactLead, $user));
    }

}