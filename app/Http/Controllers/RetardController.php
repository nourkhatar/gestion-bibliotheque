<?php

namespace App\Http\Controllers;

use App\Models\Emprunt;

class RetardController extends Controller
{
    public function index()
    {
        $retards = Emprunt::with(['etudiant', 'livre'])
            ->enRetard()
            ->get();

        return view('agent.retards', compact('retards'));
    }
}
