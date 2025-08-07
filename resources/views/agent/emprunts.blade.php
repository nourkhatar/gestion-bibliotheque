@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold"> Emprunts des étudiants</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Livre</th>
                <th>Étudiant</th>
                <th>Date d’emprunt</th>
                <th>Date retour</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($emprunts as $e)
                <tr>
                    <td>{{ $e->livre->titre }}</td>
                    <td>{{ $e->etudiant->prenom }} {{ $e->etudiant->nom }}</td>
                    <td>{{ \Carbon\Carbon::parse($e->date_emprunt)->format('d/m/Y') }}</td>
                    <td>
                        {{ $e->date_retour ? \Carbon\Carbon::parse($e->date_retour)->format('d/m/Y') : '-' }}
                    </td>
                    <td>
                        @php
                            $retard = $e->statut === 'en_cours' && \Carbon\Carbon::parse($e->date_emprunt)->diffInDays(now()) > 15;
                        @endphp

                        @if($e->statut === 'en_cours' && $retard)
                            <span class="badge bg-danger">En retard ({{ \Carbon\Carbon::parse($e->date_emprunt)->diffInDays(now()) - 15 }}j)</span>
                        @elseif($e->statut === 'en_cours')
                            <span class="badge bg-warning text-dark">En cours</span>
                        @elseif($e->statut === 'retourne')
                            <span class="badge bg-success">Retourné</span>
                        @endif
                    </td>
                    <td>
                        @if($e->statut === 'en_cours')
                            <form action="{{ route('agent.emprunts.retour', $e->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Déclarer retour</button>
                            </form>

                            @if($retard)
                                <a href="#" class="btn btn-sm btn-outline-danger">Contacter</a>
                            @endif
                        @else
                            <span class="text-muted">Aucune</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
