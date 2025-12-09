<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up(): void
    {
      
        Schema::create('news', function (Blueprint $table) {
            $table->id(); 
            
            // Relasi ke tabel lain
            $table->foreignId('level_id')->constrained('levels')->onDelete('cascade');
            $table->foreignId('unit_id')->constrained('units')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            // Informasi berita
            $table->string('title', 255);
            $table->string('slug', 255)->unique(); 
            $table->text('excerpt')->nullable(); 
            $table->longText('content'); 
            $table->string('thumbnail', 255)->nullable(); 

            // Status berita
            $table->enum('status', ['draft', 'menunggu', 'revisi', 'disetujui', 'ditolak'])
                  ->default('draft');

            $table->dateTime('published_at')->nullable(); 
            $table->text('catatan_reviewer')->nullable(); 

            $table->timestamps(); 
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
