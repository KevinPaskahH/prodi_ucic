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
      
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // BIGINT (PK, AUTO_INCREMENT)

            // Relasi ke tabel lain
            $table->foreignId('level_id')->constrained('levels')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Informasi berita
            $table->string('title', 255);
            $table->string('slug', 255)->unique(); // SEO-friendly URL
            $table->text('excerpt')->nullable(); // ringkasan singkat
            $table->longText('content'); // isi lengkap berita
            $table->string('thumbnail', 255)->nullable(); // path gambar utama

            // Status berita
            $table->enum('status', ['draft', 'menunggu', 'revisi', 'disetujui', 'ditolak'])
                  ->default('draft');

            $table->dateTime('published_at')->nullable(); // tanggal tayang
            $table->text('catatan_reviewer')->nullable(); // catatan dari reviewer

            $table->timestamps(); // created_at dan updated_at otomatis
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
