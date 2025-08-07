<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Emprunt;
use App\Models\Etudiant;
use App\Models\Livre;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EmpruntsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('emprunts')->insert([
            [
                'etudiant_id' => 1,
                'livre_id' => 1,
                'date_emprunt' => Carbon::now()->subDays(10),
                'date_retour' => null,
                'statut' => 'en_cours',
            ],
            [
                'etudiant_id' => 2,
                'livre_id' => 4,
                'date_emprunt' => Carbon::now()->subDays(20),
                'date_retour' => Carbon::now()->subDays(5),
                'statut' => 'retourne',
            ],
            [
                'etudiant_id' => 3,
                'livre_id' => 6,
                'date_emprunt' => Carbon::now()->subDays(18),
                'date_retour' => null,
                'statut' => 'en_retard',
            ],
            [
                'etudiant_id' => 4,
                'livre_id' => 8,
                'date_emprunt' => Carbon::now()->subDays(5),
                'date_retour' => null,
                'statut' => 'en_cours',
            ],
            [
                'etudiant_id' => 5,
                'livre_id' => 15,
                'date_emprunt' => Carbon::now()->subDays(25),
                'date_retour' => Carbon::now()->subDays(2),
                'statut' => 'retourne',
            ],
            [
                'etudiant_id' => 6,
                'livre_id' => 9,
                'date_emprunt' => Carbon::now()->subDays(16),
                'date_retour' => null,
                'statut' => 'en_retard',
            ],
        ]);
    }
}