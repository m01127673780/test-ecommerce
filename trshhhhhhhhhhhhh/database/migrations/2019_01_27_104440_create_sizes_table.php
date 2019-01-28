<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sizes', function (Blueprint $table) {
         $table->increments('id');
         $table->string('name_ar');
         $table->string('name_en');
          $table->integer('department_id')->unsigned()->nullable();
         $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade'); 
         $table->enum('is_public',['yes','no']);
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
        Schema::dropIfExists('sizes');
    }
}
