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
        return view('revisor.index', compact('announcement_to_check'));
    }

    public function acceptAnnouncement(Announcement $announcement){
        $announcement->setAccepted(true);
        return redirect()->back()->with('message', 'Complimenti, hai accettato l\'annuncio!');
    }

    public function refuseAnnouncement(Announcement $announcement){
        $announcement->setAccepted(false);
        return redirect()->back()->with('message', 'Complimenti, hai rifiutato l\'annuncio!');
    }

    public function becomeRevisor(){
        Mail::to('amministrazione@presto.it')->send(new BecomeRevisor(Auth::user()));
        // Mail::to('amministrazione@presto.it')->send(new RequestedRevisor(Auth::user()));  //email allo user con conferma di invio richiesta per revisore (WIP)
        return redirect()->back()->with('message','La tua richiesta di diventare revisore è stata inviata correttamente!');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor', ["email"=>$user->email]);
        // Mail::to('amministrazione@presto.it')->send(new AcceptedRevisor(Auth::user()));  //email allo user con conferma di accettazione per revisore (WIP)
        return redirect('/')->with('message', 'Hai reso l\'utente revisore');
    }
}
