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
        Schema::create('unitbisnis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_id');
            $table->text('deskripsi_id');
            $table->string('nama_en');
            $table->text('deskripsi_en');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('unitbisnis');
    }
};
