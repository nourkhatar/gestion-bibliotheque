<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bibliothèque Universitaire</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>

  
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="d-flex flex-column min-vh-100">

 
    @include('layouts.navbar')

    <main class="flex-grow-1 py-4">
        @yield('content')
    </main>

    <footer class="bg-light text-center text-muted py-3 border-top mt-auto">
        <div class="container">
            <small>Contact : biblio@universite.ma | Téléphone : +212 5 24 00 00 00</small><br>
            <small>&copy; 2025 Bibliothèque Universitaire — Tous droits réservés</small><br>

            <div class="mt-2">
                @auth
                    @if(auth()->user()->role === 'etudiant')
                        <a href="{{ route('etudiant.accueil') }}" class="text-decoration-none mx-2">Accueil</a>
                        <a href="{{ route('etudiant.catalogue') }}" class="text-decoration-none mx-2">Catalogue</a>
                        <a href="{{ route('etudiant.reservations') }}" class="text-decoration-none mx-2">Réservations</a>
                        <a href="{{ route('etudiant.emprunts') }}" class="text-decoration-none mx-2">Emprunts</a>
                    @elseif(auth()->user()->role === 'agent')
                        <a href="{{ route('agent.accueil') }}" class="text-decoration-none mx-2">Accueil</a>
                        <a href="{{ route('agent.livres') }}" class="text-decoration-none mx-2">Livres</a>
                        <a href="{{ route('agent.emprunts') }}" class="text-decoration-none mx-2">Emprunts</a>
                        <a href="{{ route('agent.etudiants') }}" class="text-decoration-none mx-2">Étudiants</a>
                        <a href="{{ route('agent.agents') }}" class="text-decoration-none mx-2">Agents</a>
                        <a href="{{ route('agent.reservations') }}" class="text-decoration-none mx-2">Réservations</a>
                        <a href="{{ route('agent.retards') }}" class="text-decoration-none mx-2">Retards</a>
                    @endif
                @endauth
            </div>
        </div>
    </footer>

    @yield('scripts')

</body>
</html>
