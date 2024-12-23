<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermohonanInformasiTable extends Migration
{
    public function up()
    {
        Schema::create('permohonan_informasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik');
            $table->string('nim');
            $table->string('perguruan_tinggi');
            $table->text('alamat');
            $table->string('email');
            $table->string('no_hp');
            $table->text('informasi');
            $table->string('ktp')->nullable(); // Untuk menyimpan nama file foto KTP
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('permohonan_informasi');
    }
}
