<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBilletagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billetages', function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->nullable()->default(false);
            $table->integer('B_10000');
            $table->integer('B_5000');
            $table->integer('B_2000');
            $table->integer('B_1000');
            $table->integer('B_500');
            $table->integer('P_500');
            $table->integer('P_250');
            $table->integer('P_200');
            $table->integer('P_100');
            $table->integer('P_50');
            $table->integer('P_25');
            $table->integer('P_10');
            $table->integer('P_5');
            $table->float('total')->nullable();
            $table->foreignId('commandes_id')->nullable()->constrained("commandes");
            $table->foreignId('depenses_id')->nullable()->constrained("depenses");
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
        Schema::table("billetages", function(Blueprint $table){
            $table->dropForeign("commandes_id");
            $table->dropForeign("depenses_id");
        });
        Schema::dropIfExists('billetages');
    }
}
