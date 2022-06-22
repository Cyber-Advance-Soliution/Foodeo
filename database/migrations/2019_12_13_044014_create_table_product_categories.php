<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProductCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('category_name', 100);
			$table->unsignedBigInteger('store_id')->nullable();
			$table->unsignedBigInteger('created_by')->nullable();
			$table->string('category_icon')->nullable();
			$table->tinyInteger('status')->nullable();
			$table->softDeletes();	
			
			$table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('product_categories');
    }
}
