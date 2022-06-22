<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderStatusList extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delivery_status_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });
		
		DB::table('delivery_status_list')->insert([
            [ 'name' => 'Accepted' ],
            [ 'name' => 'Preparing' ],
            [ 'name' => 'Ready To Deliver' ],
            [ 'name' => 'Out For Delivery' ],
            [ 'name' => 'Delivered' ],
            [ 'name' => 'Cancelled' ],
        ]);
		
		Schema::create('pickup_status_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
        });
		
		DB::table('pickup_status_list')->insert([
            [ 'name' => 'Accepted' ],
            [ 'name' => 'Preparing' ],
            [ 'name' => 'Ready To Pickup' ],
            [ 'name' => 'Collected' ],
            [ 'name' => 'Cancelled' ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('delivery_status_list');
        Schema::dropIfExists('pickup_status_list');
    }
}
