<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->unsigned();
            $table->string('name')->unique();
            $table->string('owner_name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('address')->nullable();
            $table->string('image')->default('default.png');
            $table->string('profile')->default('default.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->integer('shipping_cost')->default(0);
            $table->integer('text')->default(0);
            $table->rememberToken();
            $table->foreign('role_id')
                ->references('id')->on('roles')
                ->onDelete('cascade');

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
        Schema::dropIfExists('users');
    }
}
