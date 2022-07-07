<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string("nom");
            $table->integer("qtte_stock");
            $table->float("prix_achat");
            $table->float("prix_HT");
            $table->integer("stock_minimum");
            $table->date("date_peremption");
            $table->float("benefice")->nullable();
            $table->foreignId('categories_id')->constrained("categories");
            $table->foreignId('taxes_id')->constrained("taxes");
            $table->foreignId('remises_id')->constrained("remises");
            $table->foreignId('fournisseurs_id')->constrained("fournisseurs");
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
        Schema::table("produits", function(Blueprint $table){
            $table->dropForeign("categories_id");
            $table->dropForeign("taxes_id");
            $table->dropForeign("remises_id");
            $table->dropForeign("fournisseurs_id");
        });
        Schema::dropIfExists('produits');
    }
}
