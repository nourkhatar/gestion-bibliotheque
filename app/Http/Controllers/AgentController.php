<?php
namespace App\Http\Controllers;

use App\Models\Livre;
use App\Models\Etudiant;
use App\Models\Emprunt;
use App\Models\Reservation;
use App\Models\Agent;

class AgentController extends Controller
{
    public function accueil()
    {
        $totalLivres = Livre::count();
        $totalEtudiants = Etudiant::count();
        $totalAgents = Agent::count();
        $empruntsEnCours = Emprunt::where('statut', 'en_cours')->count();
        $reservationsEnAttente = Reservation::where('statut', 'en_attente')->count();
        $retards = Emprunt::where('statut', 'en_retard')->count();

        return view('agent.accueil', compact(
            'totalLivres',
            'totalEtudiants',
            'totalAgents',
            'empruntsEnCours',
            'reservationsEnAttente',
            'retards'
        ));
    }
}
