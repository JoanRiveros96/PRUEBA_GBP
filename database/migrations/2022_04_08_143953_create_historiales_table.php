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
        Schema::create('historiales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cantidad');
            $table->integer('id_bodega_origen')->unsigned();
            $table->foreign('id_bodega_origen')->references('id')->on('bodegas');

            $table->integer('id_bodega_destino')->unsigned();
            $table->foreign('id_bodega_destino')->references('id')->on('bodegas');

            $table->integer('id_inventario')->unsigned();
            $table->foreign('id_inventario')->references('id')->on('inventarios');

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
        Schema::dropIfExists('historiales');
    }
};
