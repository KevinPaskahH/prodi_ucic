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
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();

            // Relasi ke tabel lain
            $table->foreignId('level_id')->constrained('levels')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Informasi PMB
            $table->string('title', 255);
            $table->string('slug', 255)->unique(); 
            $table->text('excerpt')->nullable(); 
            $table->longText('description');
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
        Schema::dropIfExists('promotions');
    }
};
