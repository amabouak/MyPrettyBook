{{-- Hérite de la structure de base définie dans layouts/app.blade.php --}}
@extends('layouts.app')

{{-- Définit la section "content" qui sera injectée dans le layout --}}
@section('content')
    {{-- Titre de la page --}}
    <h1>Modifier l'avis</h1>
    
    {{-- Affichage des erreurs de validation --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                {{-- Boucle sur toutes les erreurs --}}
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Formulaire de modification --}}
    <form action="{{ route('reviews.update', $review->id) }}" method="POST">
        {{-- Protection contre les attaques CSRF --}}
        @csrf
        {{-- Spécifie que c'est une requête PUT (mise à jour) --}}
        @method('PUT')

        {{-- Champ de sélection de l'utilisateur --}}
        <div class="form-group">
            <label for="user_id">Utilisateur</label>
            <select name="user_id" id="user_id" class="form-control" required>
                {{-- Boucle sur tous les utilisateurs disponibles --}}
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $review->user_id == $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Champ pour la note --}}
        <div class="form-group">
            <label for="rating">Note (1 à 5)</label>
            <input type="number" 
                   name="rating" 
                   id="rating" 
                   min="1" 
                   max="5" 
                   class="form-control" 
                   value="{{ $review->rating }}" 
                   required />
        </div>

        {{-- Champ pour le commentaire --}}
        <div class="form-group">
            <label for="comment">Commentaire</label>
            <textarea name="comment" 
                      id="comment" 
                      class="form-control" 
                      rows="3" 
                      required>{{ $review->comment }}</textarea>
        </div>

        {{-- Boutons d'action --}}
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        <a href="{{ route('books.show', $review->book_id) }}" class="btn btn-secondary">Annuler</a>
    </form>
@endsection