<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVoucherTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voucher_tracks', function (Blueprint $table) {
            $table->id();
            $table->string('id_cliente');
            $table->string('rut');
            $table->string('accion');
            $table->string('modulo');
            $table->string('observacion')->nullable();
            $table->string('fecha_track');
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
        Schema::dropIfExists('voucher_tracks');
    }
}
