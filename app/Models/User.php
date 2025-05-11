<?php

namespace App\Models;

// Importations des classes nécessaires
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Classe de base pour l'authentification
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    // Utilisation des traits pour ajouter des fonctionnalités
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Attributs modifiables massivement (mass assignment)
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',      // Nom de l'utilisateur
        'email',     // Email (utilisé pour l'authentification)
        'password',  // Mot de passe (sera hashé automatiquement)
    ];

    /**
     * Attributs à cacher lors de la sérialisation (comme pour les réponses JSON)
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',         // Ne jamais exposer le mot de passe
        'remember_token',   // Token de session
    ];

    /**
     * Définit les conversions de type pour les attributs
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // Convertit en objet Carbon
            'password' => 'hashed',            // Hash automatique du mot de passe
        ];
    }

    /**
     * Relation "un utilisateur a plusieurs critiques" (one-to-many)
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}