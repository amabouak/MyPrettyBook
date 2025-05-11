<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BooksTableSeeder extends Seeder
{
    public function run()
    {
        $books = [
            [
                'title' => 'Hamlet',
                'author' => 'William Shakespeare',
                'description' => 'Tragédie classique sur la vengeance, la folie, et la mort.',
                'published_at' => '1603-01-01',
            ],
            [
                'title' => 'Othello',
                'author' => 'William Shakespeare',
                'description' => 'Un drame d\'amour, de jalousie et de trahison.',
                'published_at' => '1604-01-01',
            ],
            [
                'title' => 'Les Misérables',
                'author' => 'Victor Hugo',
                'description' => 'Roman historique et social majeur du XIXe siècle.',
                'published_at' => '1862-01-01',
            ],
            [
                'title' => 'Notre-Dame de Paris',
                'author' => 'Victor Hugo',
                'description' => 'Grande œuvre romantique centrée sur la cathédrale et ses personnages.',
                'published_at' => '1831-01-01',
            ],
            [
                'title' => 'Crime et Châtiment',
                'author' => 'Fiodor Dostoïevski',
                'description' => 'Exploration psychologique d\'un meurtrier en quête de rédemption.',
                'published_at' => '1866-01-01',
            ],
            [
                'title' => 'Guerre et Paix',
                'author' => 'Léon Tolstoï',
                'description' => 'Magnifique fresque historique sur la société russe au début du XIXe siècle.',
                'published_at' => '1869-01-01',
            ],
            [
                'title' => 'Le Rouge et le Noir',
                'author' => 'Stendhal',
                'description' => 'Roman d\'apprentissage et critique sociale du XIXe siècle.',
                'published_at' => '1830-01-01',
            ],
            [
                'title' => 'Le Petit Prince',
                'author' => 'Antoine de Saint-Exupéry',
                'description' => 'Conte poétique et philosophique universellement connu.',
                'published_at' => '1943-01-01',
            ],
            [
                'title' => 'Moby Dick',
                'author' => 'Herman Melville',
                'description' => 'Épopée maritime autour de la chasse à la baleine blanche.',
                'published_at' => '1851-01-01',
            ],
            [
                'title' => 'Don Quichotte',
                'author' => 'Miguel de Cervantes',
                'description' => 'Roman picaresque considéré comme l\'une des plus grandes œuvres de la littérature mondiale.',
                'published_at' => '1605-01-01',
            ],
            [
                'title' => 'Fahrenheit 451',
                'author' => 'Ray Bradbury',
                'description' => 'Roman dystopique sur un futur où les livres sont interdits.',
                'published_at' => '1953-01-01',
            ],
            [
                'title' => '1984',
                'author' => 'George Orwell',
                'description' => 'Roman dystopique sur un régime totalitaire.',
                'published_at' => '1949-01-01',
            ],
        ];

        foreach ($books as $book) {
            Book::create($book);
        }
    }
}
