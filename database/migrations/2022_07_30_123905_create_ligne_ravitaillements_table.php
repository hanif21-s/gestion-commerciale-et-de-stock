<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLigneRavitaillementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ligne_ravitaillements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('produits_id')->constrained("produits");
            $table->integer('quantite');
            $table->float('prix_total'); 
            $table->foreignId('ravitaillements_id')->constrained("ravitaillements");
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
        Schema::table("ligne_ravitaillements", function(Blueprint $table){
            $table->dropForeign("produits_id");
            $table->dropForeign("ravitaillements_id");
        });
        Schema::dropIfExists('ligne_ravitaillements');
    }
}
