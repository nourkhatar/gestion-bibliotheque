@extends('layouts.app')

@section('content')
<div id="catalogue">
    <div class="container py-4">
       <h2 class="mb-4 text-primary fw-bold">Catalogue des livres</h2>

        <input type="text" class="form-control mb-3" v-model="search" placeholder="Rechercher un livre...">

        <div class="row">
            <div class="col-md-4 mb-4" v-for="livre in filteredLivres" :key="livre.id">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">@{{ livre.titre }}</h5>
                        <p class="card-text">
                            <strong>Auteur :</strong> @{{ livre.auteur }}<br>
                            <strong>Édition :</strong> @{{ livre.edition }}<br>
                            <strong>Catégorie :</strong> @{{ livre.categorie }}<br>
                            <strong>Disponibilité :</strong>
                            <span v-if="livre.nombre_exemplaires > 0" class="text-success">Disponible</span>
                            <span v-else class="text-danger">Indisponible</span>
                        </p>
                        <button class="btn btn-primary w-100"
                            :disabled="livre.nombre_exemplaires === 0 || loadingId === livre.id"
                            @click="reserverLivre(livre.id)">
                            Réserver
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="message" class="alert alert-info mt-3">@{{ message }}</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const app = Vue.createApp({
        data() {
            return {
                search: '',
                livres: @json($livres),
                message: '',
                loadingId: null
            }
        },
        computed: {
            filteredLivres() {
                return this.livres.filter(l =>
                    l.titre.toLowerCase().includes(this.search.toLowerCase()) ||
                    l.auteur.toLowerCase().includes(this.search.toLowerCase())
                );
            }
        },
        methods: {
            reserverLivre(id) {
                this.loadingId = id;
                fetch(`/etudiant/reserver/${id}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(res => res.json())
                .then(data => {
                    this.message = data.message;
                })
                .catch(err => {
                    this.message = 'Erreur lors de la réservation';
                })
                .finally(() => {
                    this.loadingId = null;
                });
            }
        }
    });

    app.mount('#catalogue');
</script>
@endsection
