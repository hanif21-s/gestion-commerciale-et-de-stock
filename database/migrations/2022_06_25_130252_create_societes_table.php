<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocietesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('societes', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('code_postal');
            $table->string('tel');
            $table->string('email')->unique();
            $table->string('adresse');
            $table->foreignId('user_germe_techs_id')->constrained("user_germe_techs");
            $table->foreignId('users_id')->constrained("users");
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("societes", function(Blueprint $table){
            $table->dropForeign("user_germe_techs_id");
            $table->dropForeign("users_id");
        });
        Schema::dropIfExists('societes');
    }
}
