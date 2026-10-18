<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Str;

class Category extends Model
{
  /** @use HasFactory<\Database\Factories\CategoryFactory> */
  use HasFactory;

  protected $fillable = [
    'name',
    'slug',
    'description',
    'sort_order',
  ];

  // Categories are always returned sorted by sort_order, then name,
  // so consumers (e.g. Flutter) just display the received order.
  protected static function booted(): void
  {
    static::addGlobalScope('ordered', fn (Builder $query) => $query->orderBy('sort_order')->orderBy('name'));

    // Slug is auto-generated from the name unless one is provided.
    static::saving(function (Category $category) {
      $category->slug = $category->slug ?: Str::slug($category->name);
    });
  }

  // Route model binding resolves categories by slug instead of id.
  public function getRouteKeyName(): string
  {
    return 'slug';
  }

  public function products(): HasMany
  {
    return $this->hasMany(Product::class);
  }

  public function images(): MorphMany
  {
    return $this->morphMany(Image::class, 'imageable');
  }
}
