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
            ["libelle"=>"Fidelité", "taux"=>"5.00",],
        ]);
    }
}
