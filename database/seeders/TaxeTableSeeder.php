<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaxeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("taxes")->insert([
            ["libelle"=>"TVA", "taux"=>"18",],
            ["libelle"=>"TPU", "taux"=>"2.5",],
        ]);
    }
}
