<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorieTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("categories")->insert([
            ["libelle"=>"Froid", "parent_id"=>null, "description"=>"Tout ce qui est congelable",],
            ["libelle"=>"Amuse-Gueule", "parent_id"=>null, "description"=>"biscuits bonbons sucettes et consorts",],
            ["libelle"=>"Parfumerie", "parent_id"=>null, "description"=>"Tout ce qui est lié à la senteur",],
            ["libelle"=>"Fan-Milk", "parent_id"=>"1", "description"=>"Les produits fan-milk",],
            ["libelle"=>"Sucreries", "parent_id"=>"1", "description"=>"Les boissons sucreries",],
            ["libelle"=>"Biscuits", "parent_id"=>"2", "description"=>"Les biscuits",],
            ["libelle"=>"Bonbons", "parent_id"=>"2", "description"=>"Les bonbons",],
            ["libelle"=>"Parfums", "parent_id"=>"3", "description"=>"Les parfums",],
            ["libelle"=>"Deodorants", "parent_id"=>"3", "description"=>"Les deodorants",],
        ]);
    }
}
