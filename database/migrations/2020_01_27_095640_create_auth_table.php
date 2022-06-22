<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auth', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('username', 100);
			$table->tinyInteger('role')->default(0);
			$table->tinyInteger('status')->default(1);
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
		
		DB::table('auth')->insert([
            [
				'username' => 'superadmin', 
				'role' => 10, 
				'email' => 'superadmin@foodeo.com',
				'password' => '$2y$10$68N8GubryLRmUzyvecqpWuAbix3gURUBs.OJdjF5laaFA2.2OiF96',
			],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('auth');
    }
}
