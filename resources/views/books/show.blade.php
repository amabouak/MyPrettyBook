{{-- Hérite du layout principal 'layouts.app' --}}
@extends('layouts.app')

{{-- Définit la section 'content' qui sera injectée dans le layout --}}
@section('content')
    {{-- Titre du livre --}}
    <h1>{{ $book->title }}</h1>
    
    {{-- Note moyenne avec formatage sur 2 décimales --}}
    <p><strong>Note moyenne :</strong> {{ number_format($book->averageRating(), 2) ?? 'Pas encore de note' }} / 5</p>
    
    {{-- Auteur du livre --}}
    <p><strong>Auteur :</strong> {{ $book->author }}</p>
    
    {{-- Description du livre --}}
    <p><strong>Description :</strong> {{ $book->description }}</p>

    <hr />

    {{-- Section des avis --}}
    <h2>Avis</h2>
    
    {{-- Vérifie s'il y a des avis --}}
    @if($reviews->count() > 0)
        <ul class="list-group mb-4">
            {{-- Boucle sur chaque avis --}}
            @foreach($reviews as $review)
                <li class="list-group-item">
                    {{-- Nom de l'utilisateur et note --}}
                    <strong>{{ $review->user->name }}</strong> - Note : {{ $review->rating }} / 5
                    {{-- Commentaire de l'avis --}}
                    <p>{{ $review->comment }}</p>
                </li>
            @endforeach
        </ul>
    @else
        {{-- Message si aucun avis --}}
        <p>Aucun avis pour ce livre.</p>
    @endif

    {{-- Section pour ajouter un nouvel avis --}}
    <h3>Ajouter un avis</h3>
    
    {{-- Affichage des erreurs de validation --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Liste des avis avec bouton de modification --}}
    @foreach($reviews as $review)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <div>
            <strong>{{ $review->user->name }}</strong> - {{ $review->rating }} / 5
            <p>{{ $review->comment }}</p>
        </div>
        {{-- Lien pour modifier l'avis --}}
        <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-sm btn-outline-primary">Modifier</a>
    </li>
    @endforeach

    {{-- Formulaire d'ajout d'avis --}}
    <form action="{{ route('reviews.store', $book->id) }}" method="POST">
        @csrf  {{-- Protection contre les attaques CSRF --}}
        
        {{-- Sélection de l'utilisateur --}}
        <div class="form-group">
            <label for="user_id">Utilisateur</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Sélectionnez un utilisateur</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Champ pour la note --}}
        <div class="form-group">
            <label for="rating">Note (1 à 5)</label>
            <input type="number" name="rating" id="rating" class="form-control" 
                   min="1" max="5" value="{{ old('rating') }}" required />
        </div>

        {{-- Champ pour le commentaire --}}
        <div class="form-group">
            <label for="comment">Commentaire</label>
            <textarea name="comment" id="comment" class="form-control" rows="3" required>{{ old('comment') }}</textarea>
        </div>

        {{-- Bouton de soumission --}}
        <button type="submit" class="btn btn-primary">Envoyer l'avis</button>
    </form>
@endsection