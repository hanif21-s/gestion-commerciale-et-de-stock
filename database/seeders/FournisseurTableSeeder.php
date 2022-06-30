<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FournisseurTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("fournisseurs")->insert([
            [
               'societe'=>'Fan Milk',
               'adresse'=>'agbalepedogan',
               'code_postal'=>'1234',
               'ville'=>'Lomé',
               'pays'=>'TOGO',
               'tel'=>'98736936',
               'email'=>'fanmilk@gmail.com',
            ],

            [
                'societe'=>'BB Brasserie',
               'adresse'=>'Abomé Calavi',
               'code_postal'=>'1478',
               'ville'=>'Cotonou',
               'pays'=>'Benin',
               'tel'=>'96645936',
               'email'=>'bb@gmail.com',
            ],

             [
                'societe'=>'Computer +',
               'adresse'=>'Tokoin',
               'code_postal'=>'4968',
               'ville'=>'Lomé',
               'pays'=>'Togo',
               'tel'=>'96636006',
               'email'=>'computer@gmail.com',
            ],
        ]);
    }
}
