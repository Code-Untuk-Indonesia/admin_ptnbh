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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('judul_id');
            $table->text('deskripsi_id');
            $table->string('judul_en');
            $table->text('deskripsi_en');
            $table->date('tanggal_agenda');
            $table->time('waktu_agenda');
            $table->string('tempat_agenda');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
