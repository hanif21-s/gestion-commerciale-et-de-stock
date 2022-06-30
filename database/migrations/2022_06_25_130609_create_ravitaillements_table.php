<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRavitaillementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ravitaillements', function (Blueprint $table) {
            $table->id();
            $table->integer("quantite");
            $table->date("date");
            $table->foreignId("produits_id")->constrained("produits");
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
        Schema::table("ravitaillements", function(Blueprint $table){
            $table->dropForeign("produits_id");
        });
        Schema::dropIfExists('ravitaillements');
    }
}
