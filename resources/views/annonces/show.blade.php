@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header bg-dark text-white">
        <h3>{{ $annonce->titre }}</h3>
    </div>

    <div class="card-body">
        <p><strong>Type:</strong> {{ $annonce->type }}</p>
        <p><strong>Ville:</strong> {{ $annonce->ville }}</p>
        <p><strong>Superficie:</strong> {{ $annonce->superficie }} m²</p>
        <p><strong>Prix:</strong> {{ number_format($annonce->prix,2) }} DH</p>
        <p><strong>Description:</strong> {{ $annonce->description }}</p>

        @if($annonce->photo)
            <img src="{{ asset('storage/'.$annonce->photo) }}" width="300">
        @endif
    </div>
</div>

<a href="{{ route('annonces.index') }}" class="btn btn-secondary mt-3">
    Retour
</a>

@endsection