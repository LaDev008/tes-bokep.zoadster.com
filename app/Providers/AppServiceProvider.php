<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   */
  public function register(): void
  {
    //
  }

  /**
   * Bootstrap any application services.
   */
  public function boot(): void
  {
    view()->composer(
      'layouts.mainlayout',
      function ($view) {
        $view->with('tags', Tag::all()->shuffle()->take('10'));
        $view->with('categories', Category::with('videos')->get()->take(10)->shuffle()->sortBy('name'));
      }
    );
  }
}
