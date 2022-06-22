<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatTableOredersAndOrderProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_types', function (Blueprint $table) {
            $table->increments('id');
			$table->string('type')->nullable();
			$table->tinyInteger('status')->default(1);
        });
		
		DB::table('order_types')->insert([
            [ 'type' => 'Home Delivery' ],
            [ 'type' => 'Pickup' ],
        ]);
		
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('store_id')->nullable();
            $table->text('customer_id')->nullable();
			$table->tinyInteger('pickup')->default(0);
			$table->tinyInteger('home_delivery')->default(0);
			$table->tinyInteger('cash_on_delivery')->default(0);
			$table->double('delivery_charges', 8, 2)->default(0);	
			$table->double('discount', 8, 2)->default(0);	
			$table->double('tax', 8, 2)->default(0);	
            $table->Integer('walletPayment')->default(0);
            $table->Integer('coupon')->default(0);

			$table->double('sub_total', 8, 2)->default(0);	
			$table->double('grand_total', 8, 2)->default(0);	
			$table->tinyInteger('payment_method')->nullable();
			$table->tinyInteger('payment_method_id')->nullable();
			$table->tinyInteger('status')->default(0);
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();
			$table->string('customer_address')->nullable();
            $table->timestamps();
            
			$table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');

			$table->unsignedBigInteger('coupon_id')->nullable();
			$table->foreign('coupon_id')->references('id')->on('coupons')->onDelete('cascade');


        });
		
		Schema::create('order_products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
			$table->double('product_price', 8, 2)->default(0);	
            $table->unsignedBigInteger('product_quantity')->nullable();
			$table->double('product_total_price', 8, 2)->default(0);	
            $table->text('product_attributes')->nullable();
			
			$table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
			$table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_types');
    }
}
