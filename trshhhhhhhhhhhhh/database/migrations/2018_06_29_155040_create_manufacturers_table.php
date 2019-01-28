<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateManufacturersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */

	public function up() {
		Schema::create('manufacturers', function (Blueprint $table) {
				$table->increments('id');
				$table->string('name_ar');
				$table->string('name_en');
				$table->string('facebook')->nullable();
				$table->string('twitter')->nullable();
				$table->string('website')->nullable();
				$table->string('contact_name')->nullable();
				$table->string('address')->nullable();
				$table->string('mobile')->nullable();
				$table->string('email')->nullable();
				$table->string('lat')->nullable();
				$table->string('lng')->nullable();
				$table->string('icon')->nullable();
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('manufacturers');
	}
}
