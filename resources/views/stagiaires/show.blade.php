@extends('layout')

@section('content')
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h1 class="text-center">Stagiaire Details</h1>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="mb-3">Nom: <span class="text-primary">{{ $stagiaire->nom }}</span></h2>
                    <h2 class="mb-3">Prenom: <span class="text-primary">{{ $stagiaire->prenom }}</span></h2>
                    <p class="mb-3"><strong>CIN:</strong> {{ $stagiaire->cin }}</p>
                    <p class="mb-3"><strong>Adresse:</strong> {{ $stagiaire->adresse }}</p>
                    <p class="mb-3"><strong>Ville:</strong> {{ $stagiaire->ville }}</p>
                    <p class="mb-3"><strong>GSM:</strong> {{ $stagiaire->gsm }}</p>
                </div>
                <div class="col-md-6">
                    <div class="mb-4">
                        <h3 class="mb-2">CIN Image:</h3>
                        <img src="{{ asset('storage/' . $stagiaire->cin_image) }}"
                            class="img-fluid img-thumbnail custom-img" alt="CIN Image">
                    </div>
                    <div class="mb-4">
                        <h3 class="mb-2">Releve Image:</h3>
                        <img src="{{ asset('storage/' . $stagiaire->releve_image) }}"
                            class="img-fluid img-thumbnail custom-img" alt="Releve Image">
                    </div>
                    <div class="mb-4">
                        <h3 class="mb-2">Bac Image:</h3>
                        <img src="{{ asset('storage/' . $stagiaire->bac_image) }}"
                            class="img-fluid img-thumbnail custom-img" alt="Bac Image">
                    </div>
                </div>
            </div>
            <!-- Add more details as needed -->
            <a href="/stagiaire" class="btn btn-danger mt-4">Annuler</a>
        </div>
    </div>

    <style>
        .custom-img {
            width: 250px;
            max-height: 200px object-fit: cover;
        }

        .card {
            border-radius: 15px;
        }

        .card-header {
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
    </style>
@endsection
