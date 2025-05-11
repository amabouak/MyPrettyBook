<?php

// Déclaration du namespace pour ce seeder
namespace Database\Seeders;

// Importation des modèles nécessaires
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents; // Ligne commentée
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Méthode principale pour peupler la base de données
     * Exécutée lors de la commande `db:seed`
     * 
     * @return void
     */
    public function run(): void
    {
        // Création de 10 utilisateurs fictifs (ligne commentée)
        // User::factory(10)->create();

        // Création d'un utilisateur de test spécifique
        User::factory()->create([
            'name' => 'Test User',       // Nom défini manuellement
            'email' => 'test@example.com', // Email défini manuellement
            // Le mot de passe sera généré par la factory (valeur par défaut)
        ]);
    }
}