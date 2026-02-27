<!DOCTYPE html>
<html>
<head>
    <title>Gestion Annonces</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('annonces.index') }}" class="navbar-brand">
            🏠 Gestion Immobilière
        </a>
        <a href="{{ route('annonces.dashboard') }}" class="btn btn-warning">
            Dashboard
        </a>
    </div>
</nav>

<div class="container mt-4">

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@yield('content')

</div>
</body>
</html>