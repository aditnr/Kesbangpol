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
        // Database migrasi untuk tabel ikm
        Schema::create('ikms', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('file');
            $table->integer('tahun');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ikm');
    }
};
