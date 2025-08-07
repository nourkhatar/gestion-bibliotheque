<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            // Agents
            [
                'nom' => 'El Fassi',
                'prenom' => 'Yassine',
                'email' => 'y.elfassi@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'agent',
            ],
            [
                'nom' => 'Benali',
                'prenom' => 'Sanaa',
                'email' => 's.benali@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'agent',
            ],
            [
                'nom' => 'Rhani',
                'prenom' => 'Tariq',
                'email' => 't.rhani@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'agent',
            ],

            // Étudiants
            [
                'nom' => 'Khattabi',
                'prenom' => 'Imane',
                'email' => 'imane.khattabi@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Moujahid',
                'prenom' => 'Youssef',
                'email' => 'youssef.moujahid@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
            [
                'nom' => 'El Idrissi',
                'prenom' => 'Aya',
                'email' => 'aya.elidrissi@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Bakkali',
                'prenom' => 'Salma',
                'email' => 'salma.bakkali@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Kabbaj',
                'prenom' => 'Rayan',
                'email' => 'rayan.kabbaj@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Ouazzani',
                'prenom' => 'Lina',
                'email' => 'lina.ouazzani@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Zerhouni',
                'prenom' => 'Omar',
                'email' => 'omar.zerhouni@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
        [
                'nom' => 'Alaoui',
                'prenom' => 'Fatima',
                'email' => 'fatima.alaoui@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Bouhali',
                'prenom' => 'Nabil',
                'email' => 'nabil.bouhali@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Tazi',
                'prenom' => 'Samira',
                'email' => 'samira.tazi@uca.ac.ma',
                'password' => Hash::make('password'),
                'role' => 'etudiant',
            ],
        ]);
    }
}