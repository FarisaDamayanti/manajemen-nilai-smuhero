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
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_siswa')->constrained('siswas');
            $table->foreignId('id_guru')->constrained('gurus');
            $table->foreignId('id_mapel')->constrained('mapels');
            $table->integer('nilai')->nullable();
            // 1 siswa 1 nilai per mapel
            $table->unique(['id_siswa', 'id_mapel']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};
