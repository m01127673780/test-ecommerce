<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('cities', function (Blueprint $table) {
				$table->increments('id');
				$table->string('city_name_ar');
				$table->string('city_name_en');
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
		Schema::dropIfExists('cities');
	}
}
