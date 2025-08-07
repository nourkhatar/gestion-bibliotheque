<?php

namespace App\Http\Controllers;
use App\Models\Livre;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Emprunt;

class EtudiantController extends Controller
{
  public function accueil()
{
    $user = auth()->user();

    $etudiant = $user->etudiant;

    if (!$etudiant) {
        abort(404, 'Étudiant non trouvé.');
    }

    $enAttente = Reservation::where('etudiant_id', $etudiant->id)
        ->where('statut', 'en_attente')
        ->count();

    $empruntsEnCours = Emprunt::where('etudiant_id', $etudiant->id)
        ->where('statut', 'en_cours')
        ->count();

    return view('etudiant.accueil', compact('enAttente', 'empruntsEnCours'));
}


public function catalogue()
{
    $livres = Livre::all();
    return view('etudiant.catalogue', compact('livres'));
}

public function reserver($id)
{
    $etudiant = auth()->user()->etudiant;

    // Vérifie s’il a déjà 3 réservations validées/en attente
    $nbReservations = Reservation::where('etudiant_id', $etudiant->id)
        ->whereIn('statut', ['en_attente', 'validee'])
        ->count();

    if ($nbReservations >= 3) {
        return response()->json(['message' => 'Limite de 3 réservations atteinte.'], 403);
    }

    // Crée une réservation
    Reservation::create([
        'etudiant_id' => $etudiant->id,
        'livre_id' => $id,
        'date_reservation' => now(),
        'statut' => 'en_attente',
    ]);

    return response()->json(['message' => 'Réservation enregistrée.']);
}
public function reservations()
{
    $etudiant = auth()->user()->etudiant;
    $reservations = \App\Models\Reservation::with('livre')
        ->where('etudiant_id', $etudiant->id)
        ->orderByDesc('date_reservation')
        ->get();

    return view('etudiant.reservations', compact('reservations'));
}
public function emprunts()
{
    $etudiant = auth()->user()->etudiant;

    $emprunts = \App\Models\Emprunt::with('livre')
        ->where('etudiant_id', $etudiant->id)
        ->orderByDesc('date_emprunt')
        ->get();

    return view('etudiant.emprunts', compact('emprunts'));
}

}
