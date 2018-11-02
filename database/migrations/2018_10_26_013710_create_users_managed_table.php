<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersManagedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_managed', function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('manager_id')->primary('manager_id');
            $table->integer('user_id');
            $table->boolean('approved')->default(false);
            $table->string('verify_token')->nullable();
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
        Schema::dropIfExists('users_managed');
    }
}
