<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
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
    ];

    foreach ($categories as $index => $category) {
      Category::create([
        'name' => $category['name'],
        'slug' => Str::slug($category['name']),
        'description' => $category['description'],
        'sort_order' => $index + 1,
      ]);
    }
  }
}
