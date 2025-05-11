<?php

// Déclaration de l'espace de nom (namespace) pour ce contrôleur
namespace App\Http\Controllers;

// Importation des classes nécessaires
use App\Models\Review;      // Modèle pour les critiques
use Illuminate\Http\Request;  // Classe pour gérer les requêtes HTTP

class ReviewController extends Controller
{
    /**
     * Méthode pour enregistrer une nouvelle critique
     * 
     * @param Request $request Les données de la requête (formulaire)
     * @param int $bookId L'identifiant du livre associé
     * @return \Illuminate\Http\RedirectResponse Redirige vers la page du livre avec un message de succès
     */
    public function store(Request $request, $bookId)
    {
        // Validation des données du formulaire
        $request->validate([
            'user_id' => 'required|exists:users,id',        // Doit exister dans la table users
            'rating' => 'required|integer|between:1,5',    // Note entre 1 et 5
            'comment' => 'required|string|max:255',        // Commentaire obligatoire (255 caractères max)
        ]);

        // Création de la critique dans la base de données
        Review::create([
            'book_id' => $bookId,               // ID du livre
            'user_id' => $request->user_id,      // ID de l'utilisateur
            'rating' => $request->rating,        // Note donnée
            'comment' => $request->comment,      // Commentaire
        ]);

        // Redirection vers la page du livre avec un message flash de succès
        return redirect()->route('books.show', $bookId)->with('success', 'Avis ajouté avec succès.');
    }

    /**
     * Méthode pour afficher le formulaire d'édition d'une critique
     * 
     * @param int $id L'identifiant de la critique à éditer
     * @return \Illuminate\View\View Retourne la vue d'édition avec la critique et les utilisateurs
     */
    public function edit($id)
    {
        // Récupère la critique ou génère une erreur 404 si non trouvée
        $review = \App\Models\Review::findOrFail($id);
        
        // Récupère tous les utilisateurs (pour une éventuelle liste déroulante)
        $users = \App\Models\User::all();
        
        // Retourne la vue d'édition avec les données
        return view('reviews.edit', compact('review', 'users'));
    }
    
    /**
     * Méthode pour mettre à jour une critique existante
     * 
     * @param Request $request Les données de la requête (formulaire)
     * @param int $id L'identifiant de la critique à mettre à jour
     * @return \Illuminate\Http\RedirectResponse Redirige vers la page du livre avec un message de succès
     */
    public function update(Request $request, $id)
    {
        // Récupère la critique ou génère une erreur 404 si non trouvée
        $review = \App\Models\Review::findOrFail($id);
    
        // Validation des données (identique à la méthode store)
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|between:1,5',
            'comment' => 'required|string|max:255',
        ]);
    
        // Mise à jour de la critique
        $review->update([
            'user_id' => $request->user_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);
    
        // Redirection vers la page du livre avec un message flash de succès
        return redirect()->route('books.show', $review->book_id)->with('success', 'Avis modifié avec succès.');
    }    
}