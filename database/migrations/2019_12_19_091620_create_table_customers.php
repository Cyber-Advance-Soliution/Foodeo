<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->text('u_id')->nullable();
			$table->text('device_token')->nullable();
            $table->string('username', 100)->nullable();
			$table->tinyInteger('role')->default(0);
			$table->tinyInteger('is_facebook_id')->nullable();
			$table->tinyInteger('is_google_id')->nullable();
			$table->text('google_token_id')->nullable();
			$table->text('facebook_token_id')->nullable();
            $table->string('email', 191)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('customer_address')->nullable();
            $table->string('code')->nullable();
			$table->tinyInteger('phone_verify_status')->default(0);
			$table->timestamp('phone_verify_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
		
		Schema::create('customer_details', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('customer_id')->nullable();
            $table->string('phone_number', 100)->nullable();
			
			$table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
		Schema::dropIfExists('customer_details');
        Schema::dropIfExists('customers');
    }
}
