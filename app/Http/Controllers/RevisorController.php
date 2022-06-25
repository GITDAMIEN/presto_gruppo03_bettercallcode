<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\BecomeRevisor;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Mail\AcceptedRevisor;
use App\Mail\RequestedRevisor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){

        $announcement_to_check = Announcement::where('is_accepted', null)->first();
        $announcesOK = Announcement::where('is_accepted', true)->latest($column='updated_at')->get()->take(3);
        $announcesNO = Announcement::where('is_accepted', false)->latest($column='updated_at')->get()->take(3);
        $announcesArray = [
            'announcement_to_check'=> $announcement_to_check,
            'announcesOK' => $announcesOK,
            'announcesNO' => $announcesNO
        ];
        return view('revisor.index', $announcesArray);
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Hai accettato l\'annuncio! Grazie per il tuo contributo a Presto.it!');
    }

    public function refuseAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Hai rifiutato l\'annuncio! Grazie per il tuo contributo a Presto.it!');
    }

    public function becomeRevisor(){
        // Mail::to('amministrazione@presto.it')->send(new BecomeRevisor(Auth::user()));
        // Mail::to('amministrazione@presto.it')->send(new RequestedRevisor(Auth::user()));  //email allo user con conferma di invio richiesta per revisore (WIP)
        return redirect('/')->with('message','La tua richiesta di diventare revisore è stata inviata correttamente!');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        // Mail::to('amministrazione@presto.it')->send(new AcceptedRevisor(Auth::user()));  //email allo user con conferma di accettazione per revisore (WIP)
        return redirect('/')->with('message', 'Hai reso l\'utente revisore');
    }
}
