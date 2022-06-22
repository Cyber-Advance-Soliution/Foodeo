<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableStoreAndCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('store_types', function (Blueprint $table) {
            $table->increments('id');
			$table->string('type', 100);
        });
		
		DB::table('store_types')->insert([
			[ 'type' => 'Main Branch' ],
			[ 'type' => 'Sub Branch' ],
        ]);
		
		Schema::create('store_categories', function (Blueprint $table) {
            $table->increments('id');
			$table->string('category_name', 100);
			$table->string('category_icon')->nullable();
        });
		
		DB::table('store_categories')->insert([
			[ 'category_name' => 'Other' ],
            [ 'category_name' => 'Fast Food' ],
			[ 'category_name' => 'Desi' ],
			[ 'category_name' => 'Cafe' ],
        ]);
		
        Schema::create('stores', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('store_name', 100);
            $table->unsignedBigInteger('created_by')->nullable();
			$table->unsignedInteger('store_category_id')->nullable();
			$table->unsignedInteger('store_type_id')->nullable();
			$table->mediumText('short_description')->nullable();
			$table->longText('long_description')->nullable();
			$table->tinyInteger('cash_on_delivery')->default(0);
			$table->tinyInteger('customer_pickup')->default(0);
			$table->tinyInteger('delivery_to_customer')->default(0);
			$table->double('delivery_charges', 8,2)->default(0);
			$table->string('latitude')->nullable();
			$table->string('longitude')->nullable();
			$table->string('store_thumbnail')->nullable();
			$table->tinyInteger('status')->nullable();
			$table->tinyInteger('visible_status')->default(1);
			$table->softDeletes();	
            $table->timestamps();
			
			$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
			$table->foreign('store_category_id')->references('id')->on('store_categories')->onDelete('cascade');
			$table->foreign('store_type_id')->references('id')->on('store_types')->onDelete('cascade');
        });
		
		Schema::create('store_banners', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('store_id');
			$table->string('banner');
			
			$table->foreign('store_id')->references('id')->on('stores')->onDelete('cascade');
        });
		
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_categories');
        Schema::dropIfExists('stores');
        Schema::dropIfExists('store_banners');
    }
}
