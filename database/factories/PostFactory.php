<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author_id' => User::factory(), // hubungkan langsung ke factory users
            'category_id' => Category::factory(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text(),
        ];
    }
}
