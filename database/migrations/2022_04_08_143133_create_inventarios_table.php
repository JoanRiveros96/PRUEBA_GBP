<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bodega')->unsigned(); 
            $table->foreign('id_bodega')->references('id')->on('bodegas');

            $table->integer('id_producto')->unsigned(); 
            $table->foreign('id_producto')->references('id')->on('productos');

            $table->integer('cantidad')->default(10);
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();

            
            
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
        Schema::dropIfExists('inventarios');
    }
};
