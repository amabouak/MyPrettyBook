{{-- Hérite du layout principal 'layouts.app' --}}
@extends('layouts.app')

{{-- Définit la section 'content' qui sera injectée dans le layout --}}
@section('content')
    {{-- Titre de la page --}}
    <h1 class="mb-4" style="text-align:center;">Liste des livres</h1>
    
    {{-- Grille des livres --}}
    <div class="books-grid">
        {{-- Boucle sur les livres --}}
        @forelse($books as $book)
            {{-- Carte pour chaque livre --}}
            <a href="{{ route('books.show', $book->id) }}" class="book-card">
                <div class="book-info">
                    {{-- Titre du livre --}}
                    <h3 class="book-title">{{ $book->title }}</h3>
                    
                    {{-- Auteur du livre --}}
                    <p class="book-author">par {{ $book->author }}</p>
                    
                    {{-- Note moyenne --}}
                    <p class="book-rating">
                        Note moyenne : 
                        @if ($book->averageRating() > 0)
                            {{ number_format($book->averageRating(), 1) }} / 5
                        @else
                            Aucune note
                        @endif
                    </p>
                </div>
            </a>
        @empty
            {{-- Message si aucun livre trouvé --}}
            <p>Aucun livre trouvé.</p>
        @endforelse
    </div>

    {{-- Pagination --}}
    <div class="pagination-wrapper">
        {{ $books->links() }}
    </div>
@endsection

{{-- Ajout de styles spécifiques à cette vue --}}
@push('styles')
<style>
    /* Style pour la note */
    .book-rating {
        font-size: 0.9rem;
        color: #d4dacf;  /* Couleur vert clair */
        margin-top: 0.3rem;
        font-style: italic;
    }

    /* Grille des livres */
    .books-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr); /* 3 colonnes de largeur égale */
        gap: 20px; /* Espacement entre les cartes */
        margin-bottom: 30px; /* Marge en bas */
    }

    /* Style des cartes de livre */
    .book-card {
        background: #2c5d3f;  /* Vert foncé */
        color: white; /* Texte blanc */
        border-radius: 12px; /* Coins arrondis */
        padding: 20px; /* Espacement interne */
        text-decoration: none; /* Pas de soulignement */
        box-shadow: 0 4px 10px rgba(44, 93, 63, 0.3); /* Ombre portée */
        transition: transform 0.3s ease, box-shadow 0.3s ease; /* Animation fluide */
        height: 180px; /* Hauteur fixe */
        display: flex;
        flex-direction: column;
        justify-content: center; /* Centrage vertical */
        align-items: center; /* Centrage horizontal */
        text-align: center;
    }

    /* Effet au survol */
    .book-card:hover {
        background: #3e7d58;  /* Vert plus clair */
        box-shadow: 0 8px 20px rgba(62, 125, 88, 0.5); /* Ombre plus prononcée */
        transform: translateY(-5px); /* Légère élévation */
    }

    /* Style du titre */
    .book-title {
        font-size: 1.2rem;
        margin-bottom: 0.5rem;
        font-weight: 700;
        color: white; 
    }

    /* Style de l'auteur */
    .book-author {
        font-size: 1rem;
        opacity: 0.8; /* Légère transparence */
        font-style: italic;
        color: white; 
    }
</style>
@endpush