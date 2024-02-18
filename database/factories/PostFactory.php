<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Post>
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
    return [
      'title' => $this->faker->sentence,
      'content' => $this->faker->paragraphs(3, true),
      'slug' => $this->faker->slug,
      'published_at' => $this->faker->optional()->dateTime,
    ];
  }
}
