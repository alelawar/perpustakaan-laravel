<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DataBukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {;
        return [
            'judul' => fake()->unique()->sentence(4, false),
            'slug' => Str::slug(fake()->sentence(4, false)),
            'pembuat' => fake()->unique()->name(),
            'cover' => null,
            'penerbit' => fake()->unique()->company(),
            'deskripsi' => fake()->unique()->paragraph(4, false),
            'isbn' => fake()->unique()->numerify('#############'), // 13 digit ISBN
            'halaman' => fake()->numberBetween(50, 1000),
            'bahasa' => fake()->languageCode(),
            'category_id' => Category::inRandomOrder()->value('id') ?? Category::factory()->create()->id,
        ];
    }
}
