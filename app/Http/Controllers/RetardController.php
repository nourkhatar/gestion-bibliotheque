<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use Carbon\Carbon;

class RetardController extends Controller
{
    public function index()
    {
        $retards = Emprunt::with('etudiant', 'livre')
            ->where('statut', 'en_cours')
            ->where('date_emprunt', '<', Carbon::now()->subDays(15))
            ->get();

        return view('agent.retards', compact('retards'));
    }
}
