@extends('layouts.app')

@section('content')
<div class="container py-4 ">
    <h2 class="mb-5 text-primary fw-bold">Bienvenue, {{ auth()->user()->prenom }} {{ auth()->user()->nom }} !</h2>

    <div class="row justify-content-center g-4 text-center">
        <div class="col-md-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title">📚 Total Livres</h5>
                    <p class="card-text fs-3">{{ $totalLivres }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">🎓 Total Étudiants</h5>
                    <p class="card-text fs-3">{{ $totalEtudiants }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title">👨‍💼 Total Agents</h5>
                    <p class="card-text fs-3">{{ $totalAgents }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">📘 Emprunts en cours</h5>
                    <p class="card-text fs-3">{{ $empruntsEnCours }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">🕒 Réservations en attente</h5>
                    <p class="card-text fs-3">{{ $reservationsEnAttente }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">⏰ Emprunts en retard</h5>
                    <p class="card-text fs-3">{{ $retards }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
