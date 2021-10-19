<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        return [
            'todo_id' => Todo::factory(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraph()
        ];
    }
}
