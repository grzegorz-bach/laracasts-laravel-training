<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $image_number = rand(1, 5);

        return [
            'title' => fake()->sentence(),
            'slug' => fake()->unique()->slug(),
            'excerpt' => '<p>' . implode('</p><p>', fake()->paragraphs(2)) . '</p>',
            'body' => '<p>' . implode('</p><p>', fake()->paragraphs(6)) . '</p>',
            'featured_image' => "/default_images/illustration-$image_number.png",
            'category_id' => fn () => \App\Models\Category::all()->random()->id,
            'user_id' => fn () => \App\Models\User::all()->random()->id
        ];
    }
}
