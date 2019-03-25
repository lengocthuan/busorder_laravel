<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('bus_information_id')->unsigned();
            $table->longText('comment')->collation('utf8_unicode_ci')->nullable();
            $table->integer('rate')->nullable();
            $table->timestamps();
        });
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreign('user_id')
                      ->references('id')->on('users')
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
        Schema::dropIfExists('reviews');
    }
}
