<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_data', function (Blueprint $table) {
            $table->foreignId('user_id')->primary()->constrained();
            $table->string('name');
            $table->string('address');
            $table->string('postal_code');
            $table->string('city');
            $table->string('phone')->unique();
            $table->integer('nif')->unique();
            $table->string('photo')->default('placeholder.png');
            $table->timestamps();

//            $table->foreign('id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_data');
    }
}
