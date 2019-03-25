<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('description')->collation('utf8_unicode_ci')->nullable();
            $table->bigInteger('bus_information_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('ticket_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('images', function (Blueprint $table) {
            $table->foreign('bus_information_id')
                      ->references('id')->on('bus_informations')
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
        Schema::dropIfExists('images');
    }
}
