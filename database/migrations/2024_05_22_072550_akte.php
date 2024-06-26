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
        Schema::create('akte', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('kk');  
            $table->string('nik');  
            $table->string('ayah');  
            $table->string('ibu');  
            $table->string('alamat');  
            $table->timestamp('tanggallahir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
            Schema::dropIfExists('akte');

    }
};
