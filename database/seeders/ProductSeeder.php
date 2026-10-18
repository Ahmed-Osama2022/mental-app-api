<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Database\Seeders\Concerns\HasUnsplashImages;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
  use HasUnsplashImages;

  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    // Products keyed by category name; each row is [name, description]
    $productsByCategory = [
      'Anxiety' => [
        ['Breathing Exercises for Panic', 'Simple breathing techniques to calm a panic attack in minutes.'],
        ['Understanding Anxiety Triggers', 'Learn how to identify and prepare for common anxiety triggers.'],
        ['Grounding Techniques (5-4-3-2-1)', 'A quick sensory exercise to bring you back to the present moment.'],
      ],
      'Depression' => [
        ['Small Steps Against Depression', 'How tiny daily actions can slowly lift low moods.'],
        ['When to Seek Professional Help', 'Signs that it is time to talk to a therapist or doctor.'],
        ['Building a Routine That Helps', 'Structure as a gentle tool against depressive episodes.'],
      ],
      'Meditation' => [
        ['5-Minute Morning Meditation', 'A short guided session to start the day with a clear mind.'],
        ['Body Scan for Beginners', 'A step-by-step relaxation practice from head to toe.'],
        ['Mindful Breathing Basics', 'The foundation technique behind every meditation practice.'],
      ],
      'Sleep' => [
        ['Wind-Down Routine for Better Sleep', 'An evening schedule that prepares your body for rest.'],
        ['Fighting Insomnia Without Pills', 'Behavioural tips for falling asleep faster.'],
        ['What to Do When Your Mind Races at Night', 'Techniques to quiet racing thoughts in bed.'],
      ],
      'Stress Management' => [
        ['Desk Stretches for Work Stress', 'Quick physical resets during a stressful workday.'],
        ['Saying No Without Guilt', 'Set healthy boundaries without ruining relationships.'],
        ['Time Blocking to Reduce Overwhelm', 'Plan your day so tasks stop piling up mentally.'],
      ],
      'Self Esteem' => [
        ['Replacing the Inner Critic', 'Catch and reframe negative self-talk patterns.'],
        ['Celebrating Small Wins', 'Why recording tiny victories builds lasting confidence.'],
        ['Healthy Comparison Habits', 'Use others as inspiration instead of a measure of failure.'],
      ],
      'Relationships' => [
        ['Active Listening Skills', 'Make the people around you feel truly heard.'],
        ['Conflict Resolution Without Fights', 'Disagree productively and keep the relationship intact.'],
        ['Recognising Unhealthy Patterns', 'Spot red flags early in friendships and romantic relationships.'],
      ],
      'Focus & Productivity' => [
        ['The Pomodoro Technique Explained', 'Work in focused intervals and avoid burnout.'],
        ['Taming Digital Distractions', 'Phone and notification settings that protect your attention.'],
        ['Turning Vague Goals into Actionable Tasks', 'Break big projects into doable next steps.'],
      ],
    ];

    foreach ($productsByCategory as $categoryName => $products) {
      $category = Category::where('name', $categoryName)->first();

      if (! $category) {
        continue;
      }

      foreach ($products as [$name, $description]) {
        $product = Product::create([
          'category_id' => $category->id,
          'name' => $name,
          'slug' => Str::slug($name),
          'description' => $description,
        ]);

        $this->attachRandomUnsplashImages($product, 1, 3);
      }
    }
  }
}
