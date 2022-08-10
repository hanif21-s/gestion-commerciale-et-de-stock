<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $user = User::create([
         'name'=>'admin',
         'email'=>'admin@admin.com',
         'password'=> bcrypt('admin1234'),
         'tel'=>'91143053',
         'adresse'=>'logope',
         'sexe'=>'m',

     ]);

     $Admin = Role::findByName('admin','web');
     $user->assignRole([$Admin]);
    }
}
