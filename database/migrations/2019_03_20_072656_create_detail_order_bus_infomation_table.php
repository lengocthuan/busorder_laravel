<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailOrderBusInfomationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_order_bus_infomation', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('bus_information_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('description')->nullable();            
            $table->string('seat');
            $table->decimal('price', 8, 2);
            $table->timestamps();
        });
        Schema::table('detail_order_bus_infomation', function (Blueprint $table) {
            $table->foreign('order_id')
                      ->references('id')->on('orders')
                      ->onDelete('cascade')
                      ->onUpdate('cascade');
            $table->foreign('bus_information_id')
                      ->references('id')->on('bus_informations')
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
        Schema::dropIfExists('detail_order_bus_infomation');
    }
}
