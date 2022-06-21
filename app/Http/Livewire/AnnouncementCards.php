<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Announcement;

class AnnouncementCards extends Component
{
    public function render()
    {
        return view('livewire.announcement-cards',
        [
            'announces'=>Announcement::all()
        ]

        );
    }
}
