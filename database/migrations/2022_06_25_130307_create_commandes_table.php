<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->float('mtt_HT');
            $table->float('mtt_TTC');
            $table->boolean('etat');
            $table->foreignId('users_id')->constrained("users");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("commandes", function(Blueprint $table){
            $table->dropForeign("users_id");
        });
        Schema::dropIfExists('commandes');
    }
}
