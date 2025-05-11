@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1 class="display-1">404</h1>
        <h2>Page non trouvée</h2>
        <p>La page que vous cherchez n'existe pas ou a été déplacée.</p>
        <a href="{{ route('books.index') }}" class="btn btn-primary">Retour à l'accueil</a>
    </div>
@endsection