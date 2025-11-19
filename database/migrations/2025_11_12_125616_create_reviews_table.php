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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id(); // BIGINT (PK, AUTO_INCREMENT)

            // Relasi ke tabel lain
            $table->foreignId('news_id')->constrained('news')->onDelete('cascade');
            $table->foreignId('reviewer_id')->constrained('users')->onDelete('cascade');

            // Status review
            $table->enum('status', ['menunggu', 'revisi', 'disetujui', 'ditolak'])
                  ->default('menunggu');

            // Informasi review
            $table->text('catatan')->nullable();
            $table->dateTime('reviewed_at')->nullable();

            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
