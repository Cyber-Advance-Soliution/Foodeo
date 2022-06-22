<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('store_id')->nullable();
            $table->unsignedBigInteger('product_category_id')->nullable();
			$table->unsignedBigInteger('created_by')->nullable();
			$table->string('product_name', 100);
			$table->double('product_price', 8, 2)->default(0);	
			$table->Integer('status');
			$table->mediumText('short_description')->nullable();
			$table->longText('long_description')->nullable();
			$table->string('product_thumbnail')->nullable();
           
			$table->softDeletes();	
            $table->timestamps();
			
			$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
			$table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('cascade');
        });
		
		Schema::create('product_banners', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('product_id');
			$table->string('banner');
			
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
        Schema::dropIfExists('products');
        Schema::dropIfExists('product_banners');
    }
}
