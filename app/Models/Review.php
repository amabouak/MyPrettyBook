<?php

// Déclaration du namespace pour ce modèle
namespace App\Models;

// Importation de la classe Model de base d'Eloquent
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * Les attributs qui peuvent être assignés massivement
     * 
     * @var array
     */
    protected $fillable = [
        'book_id',   // ID du livre associé
        'user_id',   // ID de l'utilisateur auteur de la critique
        'rating',    // Note attribuée (généralement entre 1 et 5)
        'comment'    // Texte de la critique
    ];

    /**
     * Relation "une critique appartient à un livre" (many-to-one)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function book()
    {
        // Définit la relation inverse vers le modèle Book
        return $this->belongsTo(Book::class);
    }

    /**
     * Relation "une critique appartient à un utilisateur" (many-to-one)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        // Définit la relation inverse vers le modèle User
        return $this->belongsTo(User::class);
    }
}