<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProduitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("produits")->insert([
            ["nom"=>"Youki Cocktail", "qtte_stock"=>"100", "prix_achat"=>"350", "prix_HT"=>"400", "stock_minimum"=>"10", "date_peremption"=>"2023-06-30", "benefice"=>"50", "categories_id"=>"18", "taxes_id"=>"3", "remises_id"=>"1", "fournisseurs_id"=>"2"],
            ["nom"=>"Ecran HP 14 Pouces", "qtte_stock"=>"60", "prix_achat"=>"25000", "prix_HT"=>"32000", "stock_minimum"=>"5", "date_peremption"=>"2027-02-09", "benefice"=>"7000", "categories_id"=>"23", "taxes_id"=>"3", "remises_id"=>"1", "fournisseurs_id"=>"3"],
        ]);
    }
}
