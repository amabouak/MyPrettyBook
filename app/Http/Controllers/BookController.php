<?php

// Déclaration de l'espace de nom (namespace) pour ce contrôleur
// Cela permet d'organiser le code et d'éviter les conflits de noms
namespace App\Http\Controllers;

// Importation des classes nécessaires
use App\Models\Book;       // Modèle pour les livres
use App\Models\User;       // Modèle pour les utilisateurs
use Illuminate\Http\Request;  // Classe pour gérer les requêtes HTTP

// Définition de la classe BookController qui étend Controller
// Ce contrôleur gère la logique liée aux livres
class BookController extends Controller
{
    /**
     * Méthode pour afficher la liste paginée des livres
     * 
     * @return \Illuminate\View\View  Retourne la vue index des livres avec les données paginées
     */
    public function index()
    {
        // Récupère tous les livres avec une pagination de 6 éléments par page
        $books = Book::paginate(6); 
        
        // Retourne la vue 'books.index' en passant les livres comme variable compact
        return view('books.index', compact('books'));
    }    

    /**
     * Méthode pour afficher les détails d'un livre spécifique
     * 
     * @param int $id  L'identifiant du livre à afficher
     * @return \Illuminate\View\View  Retourne la vue show avec les détails du livre, ses critiques et la liste des utilisateurs
     */
    public function show($id)
    {
        // Recherche le livre par son ID ou génère une erreur 404 si non trouvé
        $book = Book::findOrFail($id);
        
        // Récupère toutes les critiques associées à ce livre avec leurs utilisateurs (relation eager loading)
        $reviews = $book->reviews()->with('user')->get();
        
        // Récupère tous les utilisateurs (probablement pour permettre d'ajouter une critique)
        $users = User::all();
        
        // Retourne la vue 'books.show' avec les variables compactées
        return view('books.show', compact('book', 'reviews', 'users'));
    }
}