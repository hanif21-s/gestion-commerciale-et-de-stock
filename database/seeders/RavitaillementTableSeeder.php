<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RavitaillementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("ravitaillements")->insert([
            ["quantite"=>"100", "date"=>"2021-04-15", "produits_id"=>"1"],
            ["quantite"=>"300", "date"=>"2021-08-22", "produits_id"=>"2"],
        ]);
    }
}
