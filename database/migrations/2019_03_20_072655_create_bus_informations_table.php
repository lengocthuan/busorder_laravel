<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bus_informations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('bus_router_id')->unsigned();
            $table->integer('driver_id')->nullable();
            $table->integer('ticket_control')->nullable();
            $table->string('accompanied_service')->nullable();
            $table->string('status')->nullable();
            $table->integer('number_seats');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('ticket_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('bus_informations', function (Blueprint $table) {
            $table->foreign('bus_router_id')
                      ->references('id')->on('bus_routers')
                      ->onDelete('cascade')
                      ->onUpdate('cascade');
            $table->foreign('user_id')
                      ->references('id')->on('users')
                      ->onDelete('cascade')
                      ->onUpdate('cascade');
            $table->foreign('ticket_id')
                      ->references('id')->on('tickets')
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
        Schema::dropIfExists('bus_informations');
    }
}
