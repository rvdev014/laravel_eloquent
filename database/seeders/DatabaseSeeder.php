<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Country;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    self::createCountries();
    self::createUsers();
    self::createPosts();
    self::createComments();
  }
  
  private static function createCountries(): void
  {
    $countries = [
      ['name' => 'United States', 'code' => 'US'],
      ['name' => 'Canada', 'code' => 'CA'],
      ['name' => 'United Kingdom', 'code' => 'GB'],
      ['name' => 'Australia', 'code' => 'AU'],
      ['name' => 'Philippines', 'code' => 'PH'],
    ];
    
    foreach ($countries as $country) {
      Country::create($country);
    }
  }
  
  private static function createUsers(): void
  {
    User::factory(10)->create();
  }
  
  private static function createPosts(): void
  {
    User::all()->each(function(User $user) {
      $user->posts()->saveMany(
        Post::factory(5)->make()
      );
    });
  }
  
  private static function createComments(): void
  {
    Post::all()->each(function(Post $post) {
      $post->comments()->saveMany(
        Comment::factory(5)->make([
          'user_id' => User::query()->inRandomOrder()->first()->id,
        ])
      );
    });
  }
}
