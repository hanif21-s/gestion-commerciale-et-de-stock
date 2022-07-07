<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UserTableSeeder::class);
        //$this->call(TaxeTableSeeder::class);
        //$this->call(RemiseTableSeeder::class);
        //$this->call(CategorieTableSeeder::class);
        //$this->call(FournisseurTableSeeder::class);
        //$this->call(ProduitTableSeeder::class);
        //$this->call(CommandeTableSeeder::class);
        //$this->call(RavitaillementTableSeeder::class);
        //$this->call(LigneCommandeTableSeeder::class);
        $this->call(ClientTableSeeder::class);
    }
}
