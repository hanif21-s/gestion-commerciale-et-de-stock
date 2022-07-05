<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommandeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("commandes")->insert([
            ["date"=>"2022-07-01", "users_id"=>"1",],
            ["date"=>"2022-07-03", "users_id"=>"1",],
        ]);
    }
}
