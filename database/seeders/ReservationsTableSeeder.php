<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\Etudiant;
use App\Models\Livre;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reservations')->insert([
            [
                'etudiant_id' => 1,
                'livre_id' => 2,
                'date_reservation' => Carbon::now()->subDays(3),
                'statut' => 'en_attente',
            ],
            [
                'etudiant_id' => 2,
                'livre_id' => 5,
                'date_reservation' => Carbon::now()->subDays(5),
                'statut' => 'validee',
            ],
            [
                'etudiant_id' => 3,
                'livre_id' => 7,
                'date_reservation' => Carbon::now()->subDays(2),
                'statut' => 'validee',
            ],
            [
                'etudiant_id' => 4,
                'livre_id' => 10,
                'date_reservation' => Carbon::now()->subDay(),
                'statut' => 'en_attente',
            ],
            [
                'etudiant_id' => 5,
                'livre_id' => 12,
                'date_reservation' => Carbon::now()->subDays(4),
                'statut' => 'annulee',
            ],
            [
                'etudiant_id' => 6,
                'livre_id' => 3,
                'date_reservation' => Carbon::now()->subDays(7),
                'statut' => 'validee',
            ],
        ]);
    }
}