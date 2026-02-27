@extends('layouts.app')

@section('content')

<h2 class="mb-4">📊 Statistiques</h2>

<div class="row">

<div class="col-md-3">
<div class="card bg-primary text-white p-3">
<h4>Total annonces</h4>
<h2>{{ $stats['total'] }}</h2>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white p-3">
<h4>Somme des prix</h4>
<h2>{{ number_format($stats['prix_total'],2) }} DH</h2>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning text-dark p-3">
<h4>Prix moyen</h4>
<h2>{{ number_format($stats['prix_moyen'],2) }} DH</h2>
</div>
</div>

<div class="col-md-3">
<div class="card bg-dark text-white p-3">
<h4>Surface totale</h4>
<h2>{{ $stats['surface_total'] }} m²</h2>
</div>
</div>

</div>

@endsection