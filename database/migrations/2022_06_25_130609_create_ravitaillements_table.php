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
            $table->date("date");
            $table->foreignId('fournisseurs_id')->constrained("fournisseurs");
            $table->foreignId('users_id')->constrained("users");
            $table->string('decharge')->nullable();
            $table->float('total_TTC')->nullable();
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
            $table->dropForeign("fournisseurs_id");
            $table->dropForeign("users_id");
        });
        Schema::dropIfExists('ravitaillements');
    }
}
