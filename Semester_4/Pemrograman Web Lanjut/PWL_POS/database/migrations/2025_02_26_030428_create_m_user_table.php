<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('level_id'); // Pastikan kolom ini ada!
            $table->string('username', 20)->unique();
            $table->string('nama', 100);
            $table->string('password');
            $table->timestamps();
        
            // Foreign key ke tabel level
            $table->foreign('level_id')->references('level_id')->on('m_level');
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
