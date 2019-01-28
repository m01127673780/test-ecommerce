<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {/*
Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('photo');
            $table->string('content');
            $table->integer('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');          

            $table->integer('trade_id')->unsigned()->nullable();
            $table->foreign('trade_id')->references('id')->on('trade_marks')->onDelete('cascade');  

                
            $table->integer('manu_id')->unsigned()->nullable();
            $table->foreign('manu_id')->references('id')->on('manufacturers')->onDelete('cascade');                  
            $table->integer('mall_id')->unsigned()->nullable();
            $table->foreign('mall_id')->references('id')->on('malls')->onDelete('cascade');  

            $table->integer('color_id')->unsigned()->nullable();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');  


            $table->integer('size_id')->unsigned()->nullable();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');  
           
            $table->longtext('other_data');

            $table->integer('weight_id')->unsigned()->nullable();
            $table->foreign('weight_id')->references('id')->on('weights')->onDelete('cascade');

                  $table->timestamps();
        });*/ 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
