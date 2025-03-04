<?php

namespace Database\Seeders;

use App\Models\DataPeminjam;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataPeminjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataPeminjam::factory(30)->create();
    }
}
