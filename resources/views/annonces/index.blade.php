@extends('layouts.app')

@section('content')

<form method="GET" action="{{ route('annonces.index') }}" class="card p-3 mb-4 shadow-sm">

<div class="row g-3">

    <div class="col-md-3">
        <input type="text" name="titre" class="form-control"
               placeholder="Nom du bien"
               value="{{ request('titre') }}">
    </div>

    <div class="col-md-2">
        <select name="type" class="form-select">
            <option value="">Tous types</option>
            <option value="Appartement" {{ request('type')=='Appartement'?'selected':'' }}>Appartement</option>
            <option value="Maison" {{ request('type')=='Maison'?'selected':'' }}>Maison</option>
            <option value="Villa" {{ request('type')=='Villa'?'selected':'' }}>Villa</option>
            <option value="Magasin" {{ request('type')=='Magasin'?'selected':'' }}>Magasin</option>
            <option value="Terrain" {{ request('type')=='Terrain'?'selected':'' }}>Terrain</option>
        </select>
    </div>

    <div class="col-md-2">
        <input type="text" name="ville" class="form-control"
               placeholder="Ville"
               value="{{ request('ville') }}">
    </div>

    <div class="col-md-2">
        <input type="number" name="prix_max" class="form-control"
               placeholder="Prix Max"
               value="{{ request('prix_max') }}">
    </div>

    <div class="col-md-1">
        <input type="number" name="surface_min" class="form-control"
               placeholder="Min"
               value="{{ request('surface_min') }}">
    </div>

    <div class="col-md-1">
        <input type="number" name="surface_max" class="form-control"
               placeholder="Max"
               value="{{ request('surface_max') }}">
    </div>

    <div class="col-md-1">
        <select name="etat" class="form-select">
            <option value="">État</option>
            <option value="neuf" {{ request('etat')=='neuf'?'selected':'' }}>Neuf</option>
            <option value="ancien" {{ request('etat')=='ancien'?'selected':'' }}>Ancien</option>
        </select>
    </div>

</div>

<div class="mt-3 text-end">
    <button class="btn btn-primary">🔎 Appliquer</button>
    <a href="{{ route('annonces.index') }}" class="btn btn-secondary">Reset</a>
</div>

</form>

<a href="{{ route('annonces.create') }}" class="btn btn-primary mb-3">
    + Nouvelle Annonce
</a>

<table class="table table-bordered table-hover bg-white">
    <thead class="table-dark">
        <tr>
            <th>Titre</th>
            <th>Type</th>
            <th>Ville</th>
            <th>Prix</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($annonces as $annonce)
        <tr>
            <td>{{ $annonce->titre }}</td>
            <td>{{ $annonce->type }}</td>
            <td>{{ $annonce->ville }}</td>
            <td>{{ number_format($annonce->prix,2) }} DH</td>
            <td>
                <a href="{{ route('annonces.show',$annonce) }}" class="btn btn-info btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f"><path d="M520-600v-240h320v240H520ZM120-440v-400h320v400H120Zm400 320v-400h320v400H520Zm-400 0v-240h320v240H120Zm80-400h160v-240H200v240Zm400 320h160v-240H600v240Zm0-480h160v-80H600v80ZM200-200h160v-80H200v80Zm160-320Zm240-160Zm0 240ZM360-280Z"/></svg>
                </a>
                <a href="{{ route('annonces.edit',$annonce) }}" class="btn btn-warning btn-sm">✏</a>
                <form action="{{ route('annonces.destroy',$annonce) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Confirmer suppression ?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">🗑</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $annonces->links() }}

@endsection