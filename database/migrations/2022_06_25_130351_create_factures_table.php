<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->integer('num_interne');
            $table->date('date');
            $table->float('total_HT');
            $table->float('total_taxe');
            $table->float('total_remise');
            $table->float('total_TTC');
            $table->foreignId('commandes_id')->constrained("commandes"); 
            $table->foreignId('clients_id')->constrained("clients");
            $table->foreignId('reglements_id')->constrained("reglements");
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
        Schema::table("factures", function(Blueprint $table){
            $table->dropForeign("commandes_id");
            $table->dropForeign("clients_id");
            $table->dropForeign("reglements_id");
        });
        Schema::dropIfExists('factures');
    }
}
