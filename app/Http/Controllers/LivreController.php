<?php

namespace App\Http\Controllers;

use App\Models\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::orderBy('titre')->get();
        return view('agent.livres', compact('livres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'isbn' => 'required|unique:livres',
            'titre' => 'required',
            'auteur' => 'required',
            'edition' => 'required',
            'categorie' => 'required',
            'nombre_exemplaires' => 'required|integer|min:1',
        ]);

        Livre::create($request->all());

        return redirect()->route('agent.livres')->with('success', 'Livre ajouté avec succès');
    }
}
