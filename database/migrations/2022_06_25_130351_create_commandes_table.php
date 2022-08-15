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
            $table->string('num_interne');
            $table->date('date');
            $table->boolean('etat');
            $table->float('tva')->nullable();
            $table->foreignId('users_id')->constrained("users");
            $table->foreignId('clients_id')->constrained("clients");
            $table->foreignId('remises_id')->constrained("remises");
            $table->float('prix_remise')->nullable();
            $table->foreignId('reglements_id')->constrained("reglements");
            $table->float('total_TTC')->nullable();
            $table->float('reglement_client')->nullable();
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
            $table->dropForeign("clients_id");
            $table->dropForeign("reglements_id");
            $table->dropForeign("remises_id");
        });
        Schema::dropIfExists('commandes');
    }
}
