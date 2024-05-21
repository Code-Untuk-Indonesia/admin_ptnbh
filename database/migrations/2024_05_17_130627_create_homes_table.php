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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('judul_ptnbh_id');
            $table->text('tentang_ptnbh_id');
            $table->text('sambutan_rektor_id'); // Pastikan ini benar sesuai dengan kebutuhan Anda
            $table->string('judul_ptnbh_en');
            $table->text('tentang_ptnbh_en');
            $table->text('sambutan_rektor_en');
            $table->string('gambar_rektor');
            $table->string('judul_rektor_id');
            $table->string('judul_rektor_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
