@extends('layouts.app')

@section('content')
<div class="container py-4" style= min-height: 80vh;>
    <h2 class="mb-4 text-primary fw-bold"> Bienvenue, {{ auth()->user()->prenom }} {{ auth()->user()->nom }} !</h2>

    <!-- Présentation de la bibliothèque -->
    <div class="card shadow-sm mb-4 border-0" >
        <div class="card-body">
            <h5 class="card-title fw-bold" style="color: #1e2b8fff;">À propos de notre bibliothèque</h5>
            <p class="card-text">
                Notre bibliothèque universitaire met à votre disposition des ouvrages dans tous les domaines d'étude. 
                Nous offrons un service de qualité pour accompagner votre parcours académique.
            </p>
            <p class="card-text">
                ⚠️ Vous pouvez emprunter jusqu’à <strong>3 livres simultanément</strong> pour une période de <strong>15 jours</strong>. 
                N’hésitez pas à explorer notre catalogue et à faire vos réservations en ligne.</p>
              <p class="card-text">
                 ℹ️ Informations: Les réservations approuvées doivent être récupérées dans un délai de <strong>48 heures</strong>,sinon elles seront annulées</p>
        </div>
    </div>

    <!-- Activité récente -->
    <div class="card shadow-sm border-0" >
        <div class="card-body">
            <h5 class="fw-bold mb-3" style="color: #1e2b8fff;">Votre activité récente</h5>
            <ul class="list-unstyled ms-2">
                <li class="mb-2">
                    📚 Livres empruntés actuellement : 
                    <strong>{{ $empruntsEnCours  }}/3</strong>
                </li>
                <li class="mb-2">
                    ⏳ Réservations en attente : 
                    <strong>{{ $enAttente }}</strong>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
