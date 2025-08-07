@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold"> Gestion des étudiants</h2>

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


    <form action="{{ route('agent.etudiants.store') }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-4"><input type="text" name="matricule" class="form-control" value="{{ $newMatricule }}" readonly></div>
        <div class="col-md-4"><input type="text" name="nom" class="form-control" placeholder="Nom" required></div>
        <div class="col-md-4"><input type="text" name="prenom" class="form-control" placeholder="Prénom" required></div>
        <div class="col-md-4"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
        <div class="col-md-4"><input type="text" name="telephone" class="form-control" placeholder="Téléphone" required></div>
        <div class="col-md-4"><input type="date" name="date_inscription" class="form-control" required></div>
        <div class="col-md-4"><input type="password" name="password" class="form-control" placeholder="Mot de passe" required></div>
        <div class="col-md-12"><button type="submit" class="btn btn-primary w-100">Ajouter l’étudiant</button></div>
    </form>

   <table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Matricule</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Date d’inscription</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($etudiants as $etudiant)
            <tr @if(isset($highlightId) && $highlightId == $etudiant->id) class="table-warning" id="highlighted" @endif>
                <td>{{ $etudiant->matricule }}</td>

                <form action="{{ route('agent.etudiants.update', $etudiant->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <td>
                        <input type="text" name="nom" value="{{ $etudiant->nom }}" class="form-control" required>
                        <input type="text" name="prenom" value="{{ $etudiant->prenom }}" class="form-control mt-1" required>
                    </td>
                    <td>
                        <input type="email" name="email" value="{{ $etudiant->email }}" class="form-control" required>
                    </td>
                    <td>
                        <input type="text" name="telephone" value="{{ $etudiant->telephone }}" class="form-control" required>
                    </td>
                    <td>
                        <input type="date" name="date_inscription" value="{{ $etudiant->date_inscription }}" class="form-control" required>
                    </td>
                    <td>
                        <button type="submit" class="btn btn-sm btn-warning">Modifier</button>
                </form>

                <form action="{{ route('agent.etudiants.destroy', $etudiant->id) }}" method="POST" class="d-inline">
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
