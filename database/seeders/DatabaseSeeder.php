<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UsersTableSeeder::class,
            EtudiantsTableSeeder::class,
            AgentsTableSeeder::class,
            LivresTableSeeder::class,
            ReservationsTableSeeder::class,
            EmpruntsTableSeeder::class,
        ]);
    }
}
