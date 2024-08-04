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
        Schema::create('beritas', function (Blueprint $table) {
            $table->id();
            $table->string('gambar');
            $table->string('judul');
            $table->string('excerpt');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('views')->default(0);
            $table->longText('body');
            $table->foreignId('user_id');
            $table->foreignId('status_id');
            $table->foreignId('kategori_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
