<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class Product extends Model
{
  /** @use HasFactory<\Database\Factories\ProductFactory> */
  use HasFactory;

  protected $fillable = [
    'category_id',
    'name',
    'slug',
    'description',
  ];

  // Slug is auto-generated from the name unless one is provided.
  protected static function booted(): void
  {
    static::saving(function (Product $product) {
      $product->slug = $product->slug ?: Str::slug($product->name);
    });
  }

  public function category(): BelongsTo
  {
    return $this->belongsTo(Category::class);
  }

  public function images(): MorphMany
  {
    return $this->morphMany(Image::class, 'imageable');
  }
}
