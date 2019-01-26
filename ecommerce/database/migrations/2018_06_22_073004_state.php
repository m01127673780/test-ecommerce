<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class State extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('states', function (Blueprint $table) {
				$table->increments('id');
				$table->string('state_name_ar');
				$table->string('state_name_en');
				$table->integer('city_id')->unsigned();
				$table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
				$table->integer('country_id')->unsigned();
				$table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('states');
	}
}
