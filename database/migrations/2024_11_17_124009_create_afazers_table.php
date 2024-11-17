<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('afazers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_user')->unsigned(); // Altere para bigInteger
            $table->string('titulo');
            $table->date('data_final');
            $table->boolean('concluido')->default(false);
            $table->string('descricao')->nullable();
            $table->enum('tipo', ['trabalho', 'estudo', 'casa', 'outro'])->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('afazers');
    }
};
