@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4 text-primary fw-bold"> Gestion des livres</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Formulaire ajout livre -->
    <form action="{{ route('agent.livres.store') }}" method="POST" class="row g-3 mb-4">
        @csrf
        <div class="col-md-4">
            <input type="text" name="isbn" class="form-control" placeholder="ISBN" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="titre" class="form-control" placeholder="Titre" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="auteur" class="form-control" placeholder="Auteur" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="edition" class="form-control" placeholder="Édition" required>
        </div>
        <div class="col-md-4">
            <input type="text" name="categorie" class="form-control" placeholder="Catégorie" required>
        </div>
        <div class="col-md-4">
            <input type="number" name="nombre_exemplaires" class="form-control" placeholder="Nombre d'exemplaires" min="1" required>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary w-100">Ajouter le livre</button>
        </div>
    </form>

    <!-- Liste des livres -->
    <input type="text" class="form-control mb-3" id="searchInput" placeholder="Rechercher un livre...">

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>ISBN</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Édition</th>
                <th>Catégorie</th>
                <th>Disponibilité</th>
            </tr>
        </thead>
        <tbody id="livreTable">
            @foreach($livres as $livre)
                <tr>
                    <td>{{ $livre->isbn }}</td>
                    <td>{{ $livre->titre }}</td>
                    <td>{{ $livre->auteur }}</td>
                    <td>{{ $livre->edition }}</td>
                    <td>{{ $livre->categorie }}</td>
                    <td>
                        @if($livre->nombre_exemplaires > 0)
                            <span class="badge bg-success">Disponible</span>
                        @else
                            <span class="badge bg-danger">Indisponible</span>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('scripts')
<script>
    const input = document.getElementById('searchInput');
    const rows = document.querySelectorAll('#livreTable tr');

    input.addEventListener('input', () => {
        const value = input.value.toLowerCase();
        rows.forEach(row => {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(value) ? '' : 'none';
        });
    });
</script>
@endsection
