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
            $table->string('judul_sejarah');
            $table->string('title_history');
            $table->text('isi_sejarah');
            $table->text('content_history');
            $table->text('visi');
            $table->text('misi');
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
