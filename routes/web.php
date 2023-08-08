<?php

use App\Models\Tag;
use App\Models\User;
use App\Models\Video;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  $videos = Video::with('category', 'country')->latest()->get();
  $categories = Category::with('videos')->latest()->get()->take(10);
  $tags = Tag::all()->shuffle()->take('10');

  return view('guest.home', compact('videos', 'categories', 'tags'));
});

Route::get('/video', function () {
  $videos = Video::with('category', 'tags')->get();

  return view('guest.video.list', compact('videos'));
})->name('videos.list');

Route::get('/video/{slug}', [VideoController::class, 'show'])->name('videos.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/tag/{slug}', [TagController::class, 'show'])->name('tag.show');
Route::resource('categories', CategoryController::class)->except('show');
Route::resource('tags', TagController::class)->except('show');
Route::resource('videos', VideoController::class)->except('show');

Route::prefix('admin')->middleware(['auth'])->group(function () {
  Route::get('/', function () {
    return view('admin.dashboard');
  })->name('dashboard');


  Route::resources([
    'countries' => CountryController::class,
    'users' => UserController::class,
  ]);
});

Route::get('/test', function () {
  $format = "%s";
  $number = "0234";

  dd(sprintf($format, $number));
});

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
