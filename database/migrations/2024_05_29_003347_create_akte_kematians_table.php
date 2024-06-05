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
        Schema::create('akte_kematians', function (Blueprint $table) {
            $table->id();
            $table->string('nik');
            $table->string('nama');
            $table->string('alamat');  
            $table->string('pdf'); // Jangan lupa tambahkan kolom 'pdf'
            $table->string('original_filename')->nullable(); // Jangan menggunakan 'after' dalam tabel baru
            $table->timestamp('tanggallahir');
            $table->timestamps();

            // Tambahkan foreign key untuk relasi dengan tabel akte
            // $table->foreign('nik')->references('nik')->on('akte')->onDelete('cascade');
            // $table->foreign('kk')->references('kk')->on('akte')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akte_kematians');
    }
};
