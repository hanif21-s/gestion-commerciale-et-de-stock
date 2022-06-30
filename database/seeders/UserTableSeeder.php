<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
                [
                   'name'=>'admin',
                   'email'=>'admin@admin.com',
                   'is_admin'=>'1',
                   'is_gerant'=>'0',
                   'is_commercial'=>'0',
                   'is_caissier'=>'0',
                   'password'=> bcrypt('admin1234'),
                   'tel'=>'96636936',
                   'adresse'=>'zanguera',
                   'sexe'=>'m',
                ],

                [
                    'name'=>'gerant',
                    'email'=>'gerant@gerant.com',
                    'is_admin'=>'0',
                    'is_gerant'=>'1',
                    'is_commercial'=>'0',
                    'is_caissier'=>'0',
                    'password'=> bcrypt('gerant1234'),
                    'tel'=>'96636937',
                    'adresse'=>'segbe',
                    'sexe'=>'m',
                 ],

                 [
                    'name'=>'commercial',
                    'email'=>'commercial@commercial.com',
                    'is_admin'=>'0',
                    'is_gerant'=>'0',
                    'is_commercial'=>'1',
                    'is_caissier'=>'0',
                    'password'=> bcrypt('commercial1234'),
                    'tel'=>'96636938',
                    'adresse'=>'avedji',
                    'sexe'=>'f',
                 ],

                 [
                    'name'=>'caissier',
                    'email'=>'caissier@caissier.com',
                    'is_admin'=>'0',
                    'is_gerant'=>'0',
                    'is_commercial'=>'0',
                    'is_caissier'=>'1',
                    'password'=> bcrypt('caissier1234'),
                    'tel'=>'96636939',
                    'adresse'=>'totsi',
                    'sexe'=>'m',
                 ],
            ]);
    }
}
