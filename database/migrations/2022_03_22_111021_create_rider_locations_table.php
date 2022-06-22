<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRiderLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rider_locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('lat');
            $table->string('long');
            $table->unsignedBigInteger('rider_id')->nullable();
			$table->foreign('rider_id')->references('id')->on('riders')->onDelete('cascade');
            
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
        Schema::dropIfExists('rider_locations');
    }
}
