<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RemiseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("remises")->insert([
            ["libelle"=>"Aucune", "taux"=>"0.00",],
            ["libelle"=>"Ristourne", "taux"=>"3.15",],
            ["libelle"=>"Escompte", "taux"=>"6.75",],
            ["libelle"=>"Fidelité", "taux"=>"5.00",],
        ]);
    }
}
