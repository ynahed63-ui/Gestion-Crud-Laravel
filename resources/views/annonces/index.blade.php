@extends('layouts.app')

@section('content')

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
                <a href="{{ route('annonces.show',$annonce) }}" class="btn btn-info btn-sm">👁</a>
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