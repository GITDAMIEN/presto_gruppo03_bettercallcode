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
        $msgstring = str_split($formData['0']['messagetxt'], 9999);
        $msgarray = [
            'messagetxt' => $msgstring[0]
        ];
        $contactLead = $this->getOrCreateContactLead($msgarray);
        // dd($contactLead, $formData['1'] /*user */, $formData['0']['cv']);
        $this->sendContactLeadToEmail($contactLead /*messaggio*/, $formData['1'] /*user */, $formData['0']['cv'] /*file */);
    }

    private function getOrCreateContactLead(array $msgarray): ContactLead
    {
        return ContactLead::firstOrCreate($msgarray); //messaggio
    }

    private function sendContactLeadToEmail(ContactLead $contactLead, User $user, $cv): void
    {
        // dd($contactLead, $user, $cv);
        Mail::to(['amministrazione@presto.it'])
            ->send(new ContactLeadMailable($contactLead, $user, $cv));
    }

}