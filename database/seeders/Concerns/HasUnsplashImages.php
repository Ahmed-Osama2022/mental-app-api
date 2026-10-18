<?php

namespace Database\Seeders\Concerns;

use App\Models\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

trait HasUnsplashImages
{
  /**
   * Pre-verified Unsplash CDN URLs (HTTP 200 confirmed).
   *
   * @var array<int, string>
   */
  private static array $unsplashUrls = [
    'https://images.unsplash.com/photo-1783174942139-429f4b9a6a6f?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1758874383583-59c39da93e40?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1688382575775-9aaa5025524e?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1615914143778-1a1a6e50c5dd?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1787112824517-dd95f4cc7867?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1620136619922-f592abb9df44?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1621887348744-6b0444f8a058?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1758599879559-efc4a3fb4243?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1758274529460-455002cfe74c?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1767611070476-09d0db4374a4?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1758273240112-c7724c9bb4a5?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1565793244233-3d09028aad47?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1544264796-acfb69e05b37?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1571355104663-60567c828084?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/flagged/photo-1573998594056-53123f2fedec?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1466979939565-131c4b39a51b?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1529519195486-16945f0fb37f?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
    'https://images.unsplash.com/photo-1625283518288-00362afc8663?ixlib=rb-4.1.0&q=85&fm=jpg&crop=entropy&cs=srgb',
  ];

  /**
   * Attach $count random Unsplash images (1..$max per call) to the model
   * through the polymorphic imageable relation, so imageable_type is never null.
   */
  private function attachRandomUnsplashImages(Model $model, int $min = 1, int $max = 1): void
  {
    $count = rand($min, $max);

    foreach (Arr::random(self::$unsplashUrls, $count) as $url) {
      $model->images()->create(['path' => $url]);
    }
  }
}
