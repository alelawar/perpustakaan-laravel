<?php

namespace Database\Seeders;

use App\Models\DataBuku;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataBukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataBuku::factory(20)->create();
    }
}
