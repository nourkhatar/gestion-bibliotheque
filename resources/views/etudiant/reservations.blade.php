@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold">Mes Réservations</h2>

    @if($reservations->isEmpty())
        <p>Aucune réservation trouvée.</p>
    @else
        <table class="table table-bordered">
            <thead class="table-primary text-center">
                <tr>
                    <th>Livre</th>
                    <th>Date de réservation</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $res)
                    <tr class="text-center">
                        <td>{{ $res->livre->titre }}</td>
                        <td>{{ \Carbon\Carbon::parse($res->date_reservation)->format('d/m/Y') }}</td>
                        <td>
                            @if($res->statut === 'en_attente')
                                <span class="badge bg-warning text-dark">En attente</span>
                            @elseif($res->statut === 'validee')
                                <span class="badge bg-success">Validée</span>
                            @elseif($res->statut === 'annulee')
                                <span class="badge bg-danger">Annulée</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
