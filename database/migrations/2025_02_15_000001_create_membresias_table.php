<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('membresias', function (Blueprint $table) {
            $table->id('id_membresia');
            $table->foreignId('id_usuario')->constrained('users');
            $table->enum('tipo_membresia', ['anual', 'mensual', 'por_visitas']);
            $table->date('fecha_compra');
            $table->date('fecha_vencimiento');
            $table->integer('visitas_permitidas')->nullable();
            $table->integer('visitas_restantes')->nullable();
            $table->boolean('renovacion')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('membresias');
    }
}; 