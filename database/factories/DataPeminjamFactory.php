<?php

namespace Database\Factories;

use App\Models\DataBuku;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DataPeminjamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory(),
            'buku_id' => DataBuku::inRandomOrder()->first()->id ?? DataBuku::factory(),
            'tanggal_dipinjam' => now(), // Waktu peminjaman saat ini
            'tanggal_pengembalian' => now()->addDays(30),
            'status' => 'belum dikembalikan',
            'token' => fake()->randomNumber(6, true), // Pastikan 6 digit dengan `true`
        ];
    }
}
