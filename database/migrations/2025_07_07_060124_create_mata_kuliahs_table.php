<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('kode_mk')->unique();
            $table->string('nama');
            $table->uuid('prodi_id');
            $table->foreign('prodi_id')->references('id')->on('prodi')
                  ->onUpdate('restrict')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};