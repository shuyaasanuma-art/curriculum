<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name','10');
            $table->string('email','30');
            $table->string('password','100');
            $table->string('profile','100');
            $table->tinyInteger('role')->default(1);
            $table->tinyInteger('del_flg')->default(0);
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
        Schema::dropIfExists('real_users');
    }
}
