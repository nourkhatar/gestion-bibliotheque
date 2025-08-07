<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Emprunt;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('etudiant', 'livre')
            ->where('statut', 'en_attente')
            ->orderByDesc('date_reservation')
            ->get();

        return view('agent.reservations', compact('reservations'));
    }

    public function valider($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['statut' => 'validee']);

      
Emprunt::create([
    'etudiant_id' => $reservation->etudiant_id,
    'livre_id' => $reservation->livre_id,
    'date_emprunt' => now(),
    'date_retour' => now()->addDays(15),
]);


$reservation->delete();


        return redirect()->route('agent.reservations')->with('success', 'Réservation validée et emprunt créé.');
    }

    public function annuler($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['statut' => 'annulee']);

        return redirect()->route('agent.reservations')->with('success', 'Réservation annulée.');
    }
}
