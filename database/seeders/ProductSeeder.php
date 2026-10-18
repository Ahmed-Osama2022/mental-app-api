<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // 3 products per category
    Category::all()->each(function (Category $category) {
      Product::factory(3)->create([
        'category_id' => $category->id,
      ]);
    });
  }
}
