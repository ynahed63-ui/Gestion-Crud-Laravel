@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-warning">
        <h3>Modifier l'annonce</h3>
    </div>

    <div class="card-body">
        <form action="{{ route('annonces.update', $annonce) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Titre</label>
                <input type="text" name="titre" class="form-control"
                       value="{{ old('titre', $annonce->titre) }}">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description', $annonce->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label>Type</label>
                <select name="type" class="form-control">
                    @foreach(['Appartement','Maison','Villa','Magasin','Terrain'] as $type)
                        <option value="{{ $type }}"
                            {{ $annonce->type == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Ville</label>
                <input type="text" name="ville" class="form-control"
                       value="{{ old('ville', $annonce->ville) }}">
            </div>

            <div class="mb-3">
                <label>Superficie</label>
                <input type="number" name="superficie" class="form-control"
                       value="{{ old('superficie', $annonce->superficie) }}">
            </div>

            <div class="mb-3">
                <label>Prix</label>
                <input type="number" step="0.01" name="prix" class="form-control"
                       value="{{ old('prix', $annonce->prix) }}">
            </div>

            <button class="btn btn-success">Mettre à jour</button>
            <a href="{{ route('annonces.index') }}" class="btn btn-secondary">Annuler</a>

        </form>
    </div>
</div>

@endsection