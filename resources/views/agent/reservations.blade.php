@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold"> Réservations en attente</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($reservations->isEmpty())
        <p>Aucune réservation en attente.</p>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Livre</th>
                    <th>Étudiant</th>
                    <th>Date de réservation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $r)
                    <tr>
                        <td>{{ $r->livre->titre }}</td>
                        <td>{{ $r->etudiant->prenom }} {{ $r->etudiant->nom }}</td>
                        <td>{{ \Carbon\Carbon::parse($r->date_reservation)->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('agent.reservations.valider', $r->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success btn-sm">Emprunter</button>
                            </form>
                            <form action="{{ route('agent.reservations.annuler', $r->id) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Annuler</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
