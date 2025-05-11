<?php

// Déclaration de l'espace de nom (namespace) pour ce modèle
namespace App\Models;

// Importation de la classe Model de base d'Eloquent
use Illuminate\Database\Eloquent\Model;

// Définition de la classe Book qui étend Model
class Book extends Model
{
    /**
     * Les attributs qui sont mass assignable.
     * 
     * @var array
     */
    protected $fillable = [
        'title',        // Titre du livre
        'author',       // Auteur du livre
        'description',  // Description du livre
        'published_at'  // Date de publication
    ];

    /**
     * Relation "un livre a plusieurs critiques" (one-to-many)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        // Retourne la relation avec le modèle Review
        return $this->hasMany(Review::class);
    }
    
    /**
     * Calcule la note moyenne des critiques pour ce livre
     * 
     * @return float
     */
    public function averageRating()
    {
        // Utilise la fonction avg() de SQL pour calculer la moyenne
        // Si aucune note, retourne 0 (opérateur ?:)
        return $this->reviews()->avg('rating') ?: 0;
    }
}