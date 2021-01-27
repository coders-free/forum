<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuponAsignadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cupon_asignados', function (Blueprint $table) {
            $table->id();

            $table->string('marca_beneficio');
            $table->string('codigo_cupon');
            $table->string('id_cliente');
            $table->string('rut');
            $table->string('fecha_asignacion');

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
        Schema::dropIfExists('cupon_asignados');
    }
}
