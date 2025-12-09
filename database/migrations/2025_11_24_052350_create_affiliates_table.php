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
        Schema::create('affiliates', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel lain
            $table->foreignId('level_id')->constrained('levels')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Informasi Afiliasi / Kerjasama
            $table->string('name', 255);
            $table->string('thumbnail', 255)->nullable(); 

            // Status PMB
            $table->enum('status', ['draft', 'menunggu', 'revisi', 'disetujui', 'ditolak'])
                  ->default('draft');

            $table->dateTime('published_at')->nullable(); 
            $table->text('catatan_reviewer')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('affiliates');
    }
};
