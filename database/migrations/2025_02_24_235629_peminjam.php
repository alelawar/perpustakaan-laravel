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
        Schema::create('data_peminjam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('buku_id')->constrained('data_buku')->onDelete('cascade'); 
            $table->timestamp('tanggal_dipinjam')->useCurrent(); 
            $table->timestamp('tanggal_pengembalian')->nullable(); 
            $table->enum('status', ['belum dikembalikan', 'sudah dikembalikan', 'belum diambil', 'sudah diambil'])->default('sudah diambil');
            $table->integer('token')->unique();
            $table->timestamps();
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
