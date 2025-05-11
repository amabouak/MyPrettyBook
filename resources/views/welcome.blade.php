@extends('layouts.app')

@section('content')
    <div class="text-center mt-5">
        <h1>Bienvenue sur l’application de gestion de livres</h1>
        <p>Découvrez des chefs-d’œuvre littéraires, lisez des avis et partagez vos impressions.</p>
        <a href="{{ route('books.index') }}" class="btn btn-foret-vert mt-3 px-4 py-2" style="background-color: #2c5d3f; color:white; border-radius:4px; text-decoration:none;">
            Voir la liste des livres
        </a>
    </div>
@endsection