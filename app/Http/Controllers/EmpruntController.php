<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
    public function index()
    {
        $emprunts = Emprunt::with('etudiant', 'livre')->orderByDesc('date_emprunt')->get();
        return view('agent.emprunts', compact('emprunts'));
    }

    public function retour($id)
    {
        $emprunt = Emprunt::findOrFail($id);
        $emprunt->update([
            'date_retour' => now(),
            'statut' => 'retourne',
        ]);

        return redirect()->route('agent.emprunts')->with('success', 'Emprunt marqué comme retourné.');
    }
}
