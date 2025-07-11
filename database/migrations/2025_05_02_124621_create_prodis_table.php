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
        Schema::create('prodi', function (Blueprint $table) {
            $table->uuid( 'id');
            $table->primary( 'id');
            $table->string( 'nama',  30);
            $table->char( 'singkatan',  2);
            $table->string( 'kaprodi',  30);
            $table->string( 'sekretaris', 30);
            $table->uuid('fakultas_id');
            $table->foreign('fakultas_id')->references (s: 'id')->on(table: 'fakultas')
            ->onDelete(action: 'restrict')->onUpdate(action: 'restrict');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodis');
    }
};
