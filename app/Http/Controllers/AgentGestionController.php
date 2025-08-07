<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AgentGestionController extends Controller
{
   public function index()
{
    $agents = Agent::all();

    $lastId = Agent::orderByDesc('id')->first()?->id_agent ?? 'AGT000';
    $newId = 'AGT' . str_pad((int) filter_var($lastId, FILTER_SANITIZE_NUMBER_INT) + 1, 3, '0', STR_PAD_LEFT);

    return view('agent.agents', compact('agents', 'newId'));
}

    public function store(Request $request)
    {
        $request->validate([
            'id_agent' => 'required|unique:agents',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'telephone' => 'required',
            'date_embauche' => 'required|date',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'agent',
        ]);

        Agent::create([
            'id_agent' => $request->id_agent,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'date_embauche' => $request->date_embauche,
            'user_id' => $user->id,
        ]);

        return redirect()->route('agent.agents')->with('success', 'Agent ajouté');
    }

   public function update(Request $request, $id)
{
    $agent = Agent::findOrFail($id);

    $agent->update([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
        'telephone' => $request->telephone,
        'date_embauche' => $request->date_embauche,
    ]);

    $agent->user->update([
        'nom' => $request->nom,
        'prenom' => $request->prenom,
        'email' => $request->email,
    ]);

    return redirect()->route('agent.agents')->with('success', 'Agent modifié');
}

    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->user->delete();
        $agent->delete();

        return redirect()->route('agent.agents')->with('success', 'Agent supprimé');
    }
}
