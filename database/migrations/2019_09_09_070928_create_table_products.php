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
            $table->increments('id');
            $table->integer('seller_id')->nullable();
            $table->integer('request_id')->nullable();
            $table->string('product_title' , 60)->nullable();
            $table->string('upc_product_code' , 100)->nullable();
            $table->string('make' , 20)->nullable();
            $table->string('model' , 20)->nullable();
            $table->string('condition' , 20)->nullable();
            $table->string('color' , 20)->nullable();
            $table->string('size' , 20)->nullable();
            $table->string('url' , 100)->nullable();
            $table->double('price')->nullable();
            $table->integer('seller_original_quantity')->nullable();
            $table->string('category')->nullable();
            $table->double('special_deal_price')->nullable();
            $table->double('lowest_price')->nullable();
            $table->date('deal_expiry_date')->nullable();
            $table->text('product_description')->nullable();

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
        Schema::dropIfExists('products');
    }
}
