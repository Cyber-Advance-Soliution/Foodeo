<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('store_id')->nullable();
			$table->string('username', 100);
			$table->tinyInteger('status')->default(1);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
			
			$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
		
		Schema::create('riders_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('rider_id')->nullable();
			$table->string('name', 100)->nullable();
            $table->string('phone_number', 100)->nullable();
            $table->string('address')->nullable();
			
			$table->foreign('rider_id')->references('id')->on('riders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riders_detail');
        Schema::dropIfExists('riders');
    }
}
