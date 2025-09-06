<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            // Agents
            [
                'nom' => 'El Fassi',
                'prenom' => 'Yassine',
                'email' => 'y.elfassi@uca.ac.ma',
                'role' => 'agent',
            ],
            [
                'nom' => 'Benali',
                'prenom' => 'Sanaa',
                'email' => 's.benali@uca.ac.ma',
                'role' => 'agent',
            ],
            [
                'nom' => 'Rhani',
                'prenom' => 'Tariq',
                'email' => 't.rhani@uca.ac.ma',
                'role' => 'agent',
            ],

            // Étudiants
            [
                'nom' => 'Khattabi',
                'prenom' => 'Imane',
                'email' => 'imane.khattabi@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Moujahid',
                'prenom' => 'Youssef',
                'email' => 'youssef.moujahid@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'El Idrissi',
                'prenom' => 'Aya',
                'email' => 'aya.elidrissi@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Bakkali',
                'prenom' => 'Salma',
                'email' => 'salma.bakkali@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Kabbaj',
                'prenom' => 'Rayan',
                'email' => 'rayan.kabbaj@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Ouazzani',
                'prenom' => 'Lina',
                'email' => 'lina.ouazzani@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Zerhouni',
                'prenom' => 'Omar',
                'email' => 'omar.zerhouni@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Alaoui',
                'prenom' => 'Fatima',
                'email' => 'fatima.alaoui@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Bouhali',
                'prenom' => 'Nabil',
                'email' => 'nabil.bouhali@uca.ac.ma',
                'role' => 'etudiant',
            ],
            [
                'nom' => 'Tazi',
                'prenom' => 'Samira',
                'email' => 'samira.tazi@uca.ac.ma',
                'role' => 'etudiant',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(
                ['email' => $user['email']], // search by unique email
                [
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                    'role' => $user['role'],
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}
