@extends('layouts.app')

@section('content')
<div class="container py-4">
   <h2 class="mb-4 text-primary fw-bold"> Emprunts en retard</h2>

    @if($retards->isEmpty())
        <p>Aucun emprunt en retard.</p>
    @else
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Livre</th>
                    <th>Étudiant</th>
                    <th>Date d’emprunt</th>
                    <th>Jours de retard</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($retards as $e)
                    @php
                        $jours = \Carbon\Carbon::parse($e->date_emprunt)->diffInDays(now()) - 15;
                    @endphp
                    <tr>
                        <td>{{ $e->livre->titre }}</td>
                        <td>{{ $e->etudiant->prenom }} {{ $e->etudiant->nom }}</td>
                        <td>{{ \Carbon\Carbon::parse($e->date_emprunt)->format('d/m/Y') }}</td>
                        <td class="text-danger fw-bold">{{ $jours }} jour(s)</td>
                        <td>
                          <a href="{{ route('agent.etudiants', ['highlight' => $e->etudiant->id]) }}" class="btn btn-sm btn-danger">Contacter</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
