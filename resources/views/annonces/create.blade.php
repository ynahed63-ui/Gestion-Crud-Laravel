@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-primary text-white">
        <h3>Créer une nouvelle annonce</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Titre</label>
                <input type="text" name="titre" class="form-control" value="{{ old('titre') }}">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label>Type</label>
                <select name="type" class="form-control">
                    <option>Appartement</option>
                    <option>Maison</option>
                    <option>Villa</option>
                    <option>Magasin</option>
                    <option>Terrain</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Ville</label>
                <input type="text" name="ville" class="form-control" value="{{ old('ville') }}">
            </div>

            <div class="mb-3">
                <label>Superficie</label>
                <input type="number" name="superficie" class="form-control" value="{{ old('superficie') }}">
            </div>

            <div class="mb-3">
                <label>Prix</label>
                <input type="number" step="0.01" name="prix" class="form-control" value="{{ old('prix') }}">
            </div>

            <div class="mb-3">
                <label>Photo</label>
                <input type="file" name="photo" class="form-control">
            </div>

            <button class="btn btn-success">Créer</button>
            <a href="{{ route('annonces.index') }}" class="btn btn-secondary">Annuler</a>

        </form>
    </div>
</div>

@endsection