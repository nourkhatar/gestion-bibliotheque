<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Livre;
use Illuminate\Support\Facades\DB;

class LivresTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('livres')->insert([
            ['isbn' => '9780140449136', 'titre' => 'The Odyssey', 'auteur' => 'Homer', 'edition' => 'Penguin Classics', 'categorie' => 'Classique', 'nombre_exemplaires' => 5],
            ['isbn' => '9780679783275', 'titre' => '1984', 'auteur' => 'George Orwell', 'edition' => 'Vintage', 'categorie' => 'Dystopie', 'nombre_exemplaires' => 4],
            ['isbn' => '9780553212419', 'titre' => 'Pride and Prejudice', 'auteur' => 'Jane Austen', 'edition' => 'Bantam Classics', 'categorie' => 'Roman', 'nombre_exemplaires' => 3],
            ['isbn' => '9780061120084', 'titre' => 'To Kill a Mockingbird', 'auteur' => 'Harper Lee', 'edition' => 'Harper Perennial', 'categorie' => 'Drame', 'nombre_exemplaires' => 6],
            ['isbn' => '9780142437230', 'titre' => 'Moby-Dick', 'auteur' => 'Herman Melville', 'edition' => 'Penguin', 'categorie' => 'Aventure', 'nombre_exemplaires' => 2],
            ['isbn' => '9780140449266', 'titre' => 'Les Misérables', 'auteur' => 'Victor Hugo', 'edition' => 'Penguin Classics', 'categorie' => 'Historique', 'nombre_exemplaires' => 4],
            ['isbn' => '9780439023528', 'titre' => 'The Hunger Games', 'auteur' => 'Suzanne Collins', 'edition' => 'Scholastic', 'categorie' => 'Science-fiction', 'nombre_exemplaires' => 5],
            ['isbn' => '9781400079988', 'titre' => 'The Kite Runner', 'auteur' => 'Khaled Hosseini', 'edition' => 'Riverhead Books', 'categorie' => 'Contemporain', 'nombre_exemplaires' => 3],
            ['isbn' => '9780141182803', 'titre' => 'Ulysses', 'auteur' => 'James Joyce', 'edition' => 'Penguin Modern Classics', 'categorie' => 'Classique', 'nombre_exemplaires' => 2],
            ['isbn' => '9780307277671', 'titre' => 'The Road', 'auteur' => 'Cormac McCarthy', 'edition' => 'Vintage', 'categorie' => 'Post-apocalyptique', 'nombre_exemplaires' => 2],
            ['isbn' => '9780385472579', 'titre' => 'Zen and the Art of Motorcycle Maintenance', 'auteur' => 'Robert Pirsig', 'edition' => 'HarperTorch', 'categorie' => 'Philosophie', 'nombre_exemplaires' => 3],
            ['isbn' => '9780375703768', 'titre' => 'Beloved', 'auteur' => 'Toni Morrison', 'edition' => 'Vintage', 'categorie' => 'Drame', 'nombre_exemplaires' => 3],
            ['isbn' => '9780451524935', 'titre' => 'Animal Farm', 'auteur' => 'George Orwell', 'edition' => 'Signet Classics', 'categorie' => 'Satire', 'nombre_exemplaires' => 5],
            ['isbn' => '9780141439563', 'titre' => 'Great Expectations', 'auteur' => 'Charles Dickens', 'edition' => 'Penguin Classics', 'categorie' => 'Roman', 'nombre_exemplaires' => 4],
            ['isbn' => '9780060850524', 'titre' => 'Brave New World', 'auteur' => 'Aldous Huxley', 'edition' => 'Harper Perennial', 'categorie' => 'Dystopie', 'nombre_exemplaires' => 4],
            ['isbn' => '9780199535569', 'titre' => 'Frankenstein', 'auteur' => 'Mary Shelley', 'edition' => 'Oxford University Press', 'categorie' => 'Gothique', 'nombre_exemplaires' => 2],
            ['isbn' => '9780140449181', 'titre' => 'The Divine Comedy', 'auteur' => 'Dante Alighieri', 'edition' => 'Penguin Classics', 'categorie' => 'Poésie', 'nombre_exemplaires' => 3],
            ['isbn' => '9780143105985', 'titre' => 'Crime and Punishment', 'auteur' => 'Fyodor Dostoevsky', 'edition' => 'Penguin Classics', 'categorie' => 'Psychologique', 'nombre_exemplaires' => 3],
            ['isbn' => '9780156012195', 'titre' => 'The Little Prince', 'auteur' => 'Antoine de Saint-Exupéry', 'edition' => 'Harvest Books', 'categorie' => 'Fable', 'nombre_exemplaires' => 5],
            ['isbn' => '9780743273565', 'titre' => 'The Great Gatsby', 'auteur' => 'F. Scott Fitzgerald', 'edition' => 'Scribner', 'categorie' => 'Roman', 'nombre_exemplaires' => 4],
        ]);
    }
}