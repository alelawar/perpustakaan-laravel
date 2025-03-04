<?php
namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;




class CategoryFactory extends Factory
{

    public function definition() : array
    {
        return [
            'name' => fake()->unique()->sentence(4, false),
            'slug' => Str::slug( fake()->unique()->sentence(4, false) ),
            ];
        }
    }

        ?>
