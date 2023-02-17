<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('codigo');
            $table->timestamp('fecha_entrada')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime('fecha_salida')->nullable();
            $table->string('matricula')->nullable();
            $table->integer('estado')->default(0);//0:entra ; 1:paga ; 2:sale
            $table->double('importe')->nullable();
            $table->double('impoteTarifa')->nullable();
            $table->integer('tarifa')->nullable();
            $table->double('dinero_pagado')->nullable()->default(0);
            $table->double('devolucion_dinero')->nullable()->default(0);
            $table->dateTime('fecha_pago')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tickets');
    }

};
