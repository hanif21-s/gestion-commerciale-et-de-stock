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
            ["nom"=>"Youki Cocktail", "qtte_stock"=>"100", "prix_achat"=>"350", "prix_HT"=>"400", "stock_minimum"=>"10", "date_peremption"=>"2023-06-30", "benefice"=>"50", "categories_id"=>"5"],
            ["nom"=>"Fan choco", "qtte_stock"=>"300", "prix_achat"=>"125", "prix_HT"=>"150", "stock_minimum"=>"25", "date_peremption"=>"2027-02-09", "benefice"=>"25", "categories_id"=>"6"],
        ]);
    }
}
