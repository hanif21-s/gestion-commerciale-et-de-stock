<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneCommandesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_commandes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produits_id')->constrained("produits");
            $table->integer('quantite');
            $table->float('prix_total'); 
            $table->foreignId('commandes_id')->constrained("commandes"); 
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
        Schema::table("ligne_commandes", function(Blueprint $table){
            $table->dropForeign("produits_id");
            $table->dropForeign("commandes_id");
        });
        Schema::dropIfExists('ligne_commandes');
    }
}
