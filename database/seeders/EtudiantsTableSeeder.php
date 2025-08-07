<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Etudiant;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class EtudiantsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('etudiants')->insert([
            [
                'user_id' => 4,
                'nom' => 'Khattabi',
                'prenom' => 'Imane',
                'email' => 'imane.khattabi@uca.ac.ma',
                'telephone' => '0601010101',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 5,
                'nom' => 'Moujahid',
                'prenom' => 'Youssef',
                'email' => 'youssef.moujahid@uca.ac.ma',
                'telephone' => '0602020202',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 6,
                'nom' => 'El Idrissi',
                'prenom' => 'Aya',
                'email' => 'aya.elidrissi@uca.ac.ma',
                'telephone' => '0603030303',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 7,
                'nom' => 'Bakkali',
                'prenom' => 'Salma',
                'email' => 'salma.bakkali@uca.ac.ma',
                'telephone' => '0604040404',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 8,
                'nom' => 'Kabbaj',
                'prenom' => 'Rayan',
                'email' => 'rayan.kabbaj@uca.ac.ma',
                'telephone' => '0605050505',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 9,
                'nom' => 'Ouazzani',
                'prenom' => 'Lina',
                'email' => 'lina.ouazzani@uca.ac.ma',
                'telephone' => '0606060606',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 10,
                'nom' => 'Zerhouni',
                'prenom' => 'Omar',
                'email' => 'omar.zerhouni@uca.ac.ma',
                'telephone' => '0607070707',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 11,
                'nom' => 'Alaoui',
                'prenom' => 'Fatima',
                'email' => 'fatima.alaoui@uca.ac.ma',
                'telephone' => '0608080808',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 12,
                'nom' => 'Bouhali',
                'prenom' => 'Nabil',
                'email' => 'nabil.bouhali@uca.ac.ma',
                'telephone' => '0609090909',
                'date_inscription' => '2023-09-01',
            ],
            [
                'user_id' => 13,
                'nom' => 'Tazi',
                'prenom' => 'Samira',
                'email' => 'samira.tazi@uca.ac.ma',
                'telephone' => '0610101010',
                'date_inscription' => '2023-09-01',
            ],
        ]);

        $etudiants = DB::table('etudiants')->get();
        foreach ($etudiants as $etudiant) {
            DB::table('etudiants')
                ->where('id', $etudiant->id)
                ->update(['matricule' => 'ETD' . str_pad($etudiant->id, 3, '0', STR_PAD_LEFT)]);
        }
    }
}