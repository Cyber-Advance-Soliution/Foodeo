<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEmployees extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('designations', function (Blueprint $table) {
            $table->increments('id');
			$table->string('designation_name', 100);
			$table->unsignedBigInteger('created_by');
			
			$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
		
		DB::table('designations')->insert([
            [ 'designation_name' => 'Supervisor', 'created_by' => 1],
			[ 'designation_name' => 'Manager', 'created_by' => 1 ],
			[ 'designation_name' => 'Chef', 'created_by' => 1 ],
			[ 'designation_name' => 'Cashier', 'created_by' => 1 ],
			[ 'designation_name' => 'Delivery Boy', 'created_by' => 1 ],
        ]);
		
        Schema::create('user_detail', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('name', 100);
			$table->unsignedBigInteger('user_id')->nullable();
			$table->unsignedBigInteger('store_id')->nullable();
			$table->unsignedBigInteger('created_by')->nullable();
			$table->unsignedInteger('designation_id')->nullable();
            $table->string('phone_number');
            $table->string('address');
           
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
			$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designations');
		Schema::dropIfExists('user_detail');
    }
}
