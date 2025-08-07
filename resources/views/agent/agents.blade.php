@extends('layouts.app')

@section('content')
<div class="container py-4">
   <h2 class="mb-4 text-primary fw-bold"> Gestion des agents</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('agent.agents.store') }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-4"><input type="text" name="id_agent" class="form-control" value="{{ $newId }}" readonly></div>
        <div class="col-md-4"><input type="text" name="nom" class="form-control" placeholder="Nom" required></div>
        <div class="col-md-4"><input type="text" name="prenom" class="form-control" placeholder="Prénom" required></div>
        <div class="col-md-4"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
        <div class="col-md-4"><input type="text" name="telephone" class="form-control" placeholder="Téléphone" required></div>
        <div class="col-md-4"><input type="date" name="date_embauche" class="form-control" required></div>
        <div class="col-md-4"><input type="password" name="password" class="form-control" placeholder="Mot de passe" required></div>
        <div class="col-md-12"><button type="submit" class="btn btn-primary w-100">Ajouter l’agent</button></div>
    </form>

   
   <table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>ID Agent</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Date d’embauche</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($agents as $agent)
            <tr>
                <td>{{ $agent->id_agent }}</td>

                <form action="{{ route('agent.agents.update', $agent->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <td>
                        <input type="text" name="nom" value="{{ $agent->nom }}" class="form-control" required>
                        <input type="text" name="prenom" value="{{ $agent->prenom }}" class="form-control mt-1" required>
                    </td>
                    <td>
                        <input type="email" name="email" value="{{ $agent->email }}" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="telephone" value="{{ $agent->telephone }}" class="form-control" required>
                    </td>
                    <td>
                        <input type="date" name="date_embauche" value="{{ $agent->date_embauche }}" class="form-control" required>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-warning">Modifier</button>
                </form>

                <form action="{{ route('agent.agents.destroy', $agent->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
                </form>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
