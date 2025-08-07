@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-primary fw-bold"> Mes emprunts</h2>

    @if($emprunts->isEmpty())
        <div class="alert alert-info">
            Aucun emprunt enregistré pour le moment.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead class="table-primary text-center">
                    <tr>
                        <th>Titre du livre</th>
                        <th>Date d’emprunt</th>
                        <th>Date de retour</th>
                        <th>Statut</th>
                        <th>Retard</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($emprunts as $e)
                        <tr class="text-center">
                            <td>{{ $e->livre->titre }}</td>
                            <td>{{ \Carbon\Carbon::parse($e->date_emprunt)->format('d/m/Y') }}</td>
                            <td>
                                {{ $e->date_retour ? \Carbon\Carbon::parse($e->date_retour)->format('d/m/Y') : '—' }}
                            </td>
                            <td>
                                @switch($e->statut)
                                    @case('en_cours')
                                        <span class="badge bg-primary">En cours</span>
                                        @break
                                    @case('retourne')
                                        <span class="badge bg-success">Retourné</span>
                                        @break
                                    @case('en_retard')
                                        <span class="badge bg-danger">En retard</span>
                                        @break
                                    @default
                                        <span class="badge bg-secondary">{{ $e->statut }}</span>
                                @endswitch
                            </td>
                            <td>
                                @if($e->statut === 'en_retard')
                                    {{ \Carbon\Carbon::parse($e->date_emprunt)->diffInDays(now()) - 15 }} jours
                                @else
                                    —
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
