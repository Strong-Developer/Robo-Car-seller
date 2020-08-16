<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSellers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name',50)->nullable() ;
            $table->string('last_name',50)->nullable() ;
            $table->string('company_name',50)->nullable() ;
            $table->string('zip_code',20)->nullable() ;
            $table->string('email_address')->nullable() ;
            $table->string('password')->nullable() ;
            $table->string('cell_no',20)->nullable() ;
            $table->string('negotiation',20)->nullable() ;
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
        Schema::dropIfExists('sellers');
    }
}
