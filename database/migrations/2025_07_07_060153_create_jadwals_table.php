<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_akademik');               // contoh: 2024/2025
            $table->string('kode_smt');                     // Gasal / Genap
            $table->string('kelas');                        // SI‑4A

            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id')->references('id')->on('users')
                  ->onUpdate('restrict')->onDelete('restrict');

            $table->uuid('mata_kuliah_id');
            $table->foreign('mata_kuliah_id')->references('id')->on('mata_kuliahs')
                  ->onUpdate('restrict')->onDelete('restrict');

            $table->foreignId('sesi_id')->constrained('sesis')
                  ->onUpdate('restrict')->onDelete('restrict');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};