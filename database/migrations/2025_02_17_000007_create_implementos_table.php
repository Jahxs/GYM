<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('implementos', function (Blueprint $table) {
            $table->id('id_implemento');
            $table->string('nombre_implemento');
            $table->text('descripcion');
            $table->integer('cantidad');
            $table->enum('estado', ['operativo', 'en_reparacion', 'fuera_servicio'])
                  ->default('operativo');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('implementos');
    }
}; 