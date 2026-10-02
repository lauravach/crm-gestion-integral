<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_empresa', 150);
            $table->string('contacto_principal', 100);
            $table->string('telefono_whatsapp', 20);
            $table->enum('zona_geografica', ['Oeste', 'Este', 'Cabudare', 'Centro', 'Zona Industrial']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('origin_id')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
