<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agent;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AgentsTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('agents')->insert([
            [
                'user_id' => 1,
                'nom' => 'El Fassi',
                'prenom' => 'Yassine',
                'email' => 'y.elfassi@uca.ac.ma',
                'telephone' => '0612345678',
                'date_embauche' => '2021-09-15',
            ],
            [
                'user_id' => 2,
                'nom' => 'Benali',
                'prenom' => 'Sanaa',
                'email' => 's.benali@uca.ac.ma',
                'telephone' => '0623456789',
                'date_embauche' => '2022-04-20',
            ],
            [
                'user_id' => 3,
                'nom' => 'Rhani',
                'prenom' => 'Tariq',
                'email' => 't.rhani@uca.ac.ma',
                'telephone' => '0634567890',
                'date_embauche' => '2023-01-10',
            ],
        ]);

        $agents = DB::table('agents')->get();
        foreach ($agents as $agent) {
            DB::table('agents')
                ->where('id', $agent->id)
                ->update(['id_agent' => 'AGT' . str_pad($agent->id, 3, '0', STR_PAD_LEFT)]);
        }
    }
}