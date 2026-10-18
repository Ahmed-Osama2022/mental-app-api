<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Seeders\Concerns\HasUnsplashImages;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
  use HasUnsplashImages;

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $categories = [
      ['name' => 'Anxiety', 'description' => 'Articles and exercises to help manage anxiety.'],
      ['name' => 'Depression', 'description' => 'Support and coping strategies for depression.'],
      ['name' => 'Meditation', 'description' => 'Guided meditation and mindfulness practices.'],
      ['name' => 'Sleep', 'description' => 'Tips and routines for better sleep quality.'],
      ['name' => 'Stress Management', 'description' => 'Techniques to reduce and handle daily stress.'],
      ['name' => 'Self Esteem', 'description' => 'Build confidence and a healthier self-image.'],
      ['name' => 'Relationships', 'description' => 'Communication skills and healthier connections.'],
      ['name' => 'Focus & Productivity', 'description' => 'Beat procrastination and stay concentrated.'],
    ];

    foreach ($categories as $index => $category) {
      $categoryModel = Category::create([
        'name' => $category['name'],
        'slug' => \Illuminate\Support\Str::slug($category['name']),
        'description' => $category['description'],
        'sort_order' => $index + 1,
      ]);

      $this->attachRandomUnsplashImages($categoryModel, 1, 1);
    }
  }
}
