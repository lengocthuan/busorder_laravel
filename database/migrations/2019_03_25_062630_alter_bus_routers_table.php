<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterBusRoutersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bus_routers', function (Blueprint $table) {
            $table->bigInteger( 'starting_point' )->unsigned();            
            $table->bigInteger( 'destination' )->unsigned();
        });
        Schema::table('bus_routers', function (Blueprint $table) {
            $table->foreign('starting_point')
                      ->references('id')->on('locations')
                      ->onDelete('cascade')
                      ->onUpdate('cascade');
            $table->foreign('destination')
                      ->references('id')->on('locations')
                      ->onDelete('cascade')
                      ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bus_routers', function (Blueprint $table) {
            //
        });
    }
}
