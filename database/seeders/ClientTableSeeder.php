<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("clients")->insert([
            ["nom"=>"abalo","prenoms"=>"germain","email"=>"abalogermain@gmail.com","tel"=>"90123547","adresse"=>"kegue","sexe"=>"m"],
            ["nom"=>"akossiwa","prenoms"=>"jeane","email"=>"akossiwajeane@gmail.com","tel"=>"90100547","adresse"=>"zogbedji","sexe"=>"f"],
            ["nom"=>"conni","prenoms"=>"gangstar","email"=>"connigangstar@gmail.com","tel"=>"98823547","adresse"=>"Adidogomé","sexe"=>"m"],
            ]);
    }
}
