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
        Schema::create('tentangs', function (Blueprint $table) {
            $table->id();
            $table->string('judul_sejarah_id');
            $table->string('judul_sejarah_en');
            $table->text('isi_sejarah_id');
            $table->text('isi_sejarah_en');
            $table->text('visi_id');
            $table->text('misi_id');
            $table->text('visi_eng');
            $table->text('misi_eng');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tentangs');
    }
};
