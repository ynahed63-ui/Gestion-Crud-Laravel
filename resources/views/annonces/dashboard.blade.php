@extends('layouts.app')

@section('content')

<h2 class="mb-4">📊 Dashboard des Annonces</h2>

<div class="row g-4">

    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Total des annonces</h6>
                <h2>{{ $stats['total'] }}</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Somme totale des prix</h6>
                <h2>{{ number_format($stats['prix_total'],2) }} DH</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Prix moyen</h6>
                <h2>{{ number_format($stats['prix_moyen'],2) }} DH</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Surface totale</h6>
                <h2>{{ $stats['surface_total'] }} m²</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Annonce la plus chère</h6>
                <h2>{{ number_format($stats['plus_chere'],2) }} DH</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6>Annonce la plus récente</h6>
                @if($stats['plus_recente'])
                    <strong>{{ $stats['plus_recente']->titre }}</strong>
                    <br>
                    <small>{{ $stats['plus_recente']->created_at->format('d/m/Y') }}</small>
                @endif
            </div>
        </div>
    </div>

</div>

@endsection