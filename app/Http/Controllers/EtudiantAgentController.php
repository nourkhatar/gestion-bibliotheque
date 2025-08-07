<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EtudiantAgentController extends Controller
{
   public function index()
{
    $etudiants = Etudiant::all();

    $lastMatricule = Etudiant::orderByDesc('id')->first()?->matricule ?? 'ETD000';
    $newMatricule = 'ETD' . str_pad((int) filter_var($lastMatricule, FILTER_SANITIZE_NUMBER_INT) + 1, 3, '0', STR_PAD_LEFT);

    return view('agent.etudiants', compact('etudiants', 'newMatricule'));
    
    $highlightId = $request->query('highlight'); 
    return view('agent.etudiants', compact('etudiants', 'highlightId'));
}

    public function store(Request $request)
    {
        $request->validate([
            'matricule' => 'required|unique:etudiants',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'telephone' => 'required',
            'date_inscription' => 'required|date',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'etudiant',
        ]);

        Etudiant::create([
            'matricule' => $request->matricule,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'date_inscription' => $request->date_inscription,
            'user_id' => $user->id,
        ]);

        return redirect()->route('agent.etudiants')->with('success', 'Étudiant ajouté');
    }


   public function update(Request $request, $id)
{
    $etudiant = Etudiant::findOrFail($id);

    $etudiant->update([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'date_inscription' => $request->date_inscription,
    ]);

    $etudiant->user->update([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
    ]);

    return redirect()->route('agent.etudiants')->with('success', 'Étudiant modifié');
}


    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->user->delete();
        $etudiant->delete();

        return redirect()->route('agent.etudiants')->with('success', 'Étudiant supprimé');
    }
}
