<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LigneCommandeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("ligne_commandes")->insert([
            ["produits_id"=>"3","quantite"=>"10", "prix_unitaire"=>"400", "prix_total"=>"4000", "commandes_id"=>"1", "etat"=>"1",],
            ["produits_id"=>"4","quantite"=>"15", "prix_unitaire"=>"150", "prix_total"=>"2250", "commandes_id"=>"2", "etat"=>"1",],
        ]);
    }
}
