<nav class="navbar navbar-expand-lg navbar-dark bg-primary px-3">
    <a class="navbar-brand d-flex align-items-center" href="#">
    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 30px;" class="me-2">
    <span>Bibliothèque Universitaire</span>
</a>


    <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
            @auth
                @if(auth()->user()->role === 'etudiant')
                    <li class="nav-item"><a class="nav-link" href="{{ route('etudiant.accueil') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('etudiant.catalogue') }}">Catalogue</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('etudiant.reservations') }}">Réservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('etudiant.emprunts') }}">Emprunts</a></li>
                @elseif(auth()->user()->role === 'agent')
                    <li class="nav-item"><a class="nav-link" href="{{ route('agent.accueil') }}">Accueil</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('agent.livres') }}">Livres</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('agent.emprunts') }}">Emprunts</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('agent.etudiants') }}">Étudiants</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('agent.agents') }}">Agents</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('agent.reservations') }}">Réservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('agent.retards') }}">Retards</a></li>
                @endif
            @endauth
        </ul>

        @auth
            <span class="navbar-text me-3">{{ auth()->user()->prenom }} {{ auth()->user()->nom }}</span>
            <a class="btn btn-outline-light btn-sm" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Déconnexion
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth
    </div>
</nav>
