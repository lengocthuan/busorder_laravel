<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('social_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('provider')->nullable();
            $table->bigInteger('provider_id')->unsigned()->nullable();
            $table->longText('description')->nullable();
            $table->timestamps();
        });
        Schema::table('social_accounts', function (Blueprint $table) {
            $table->foreign('user_id')
                      ->references('id')->on('users')
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
        Schema::dropIfExists('social_accounts');
    }
}
