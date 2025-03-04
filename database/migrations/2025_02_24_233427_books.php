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

        Schema::create('data_buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->string('pembuat');
            $table->string('cover')->nullable();
            $table->text('deskripsi');
            $table->string('penerbit');
            $table->bigInteger('isbn');
            $table->bigInteger('halaman');
            $table->string('bahasa');
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key ke categories
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_buku');
    }
};
