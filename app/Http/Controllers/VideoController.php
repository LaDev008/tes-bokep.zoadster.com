<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Country;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    if (Auth::id() < 3) {
      $videos = Video::with('category', 'country')->latest()->take(200)->get();
    } else {
      $videos = Video::with('category', 'country')->where('user_id', Auth::id())->latest()->take(200)->get();
    }

    $play_video = Video::latest()->first();

    return view('admin.videos.index', compact('videos', 'play_video'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.videos.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
  }

  /**
   * Display the specified resource.
   */
  public function show($slug)
  {
    $video = Video::with('tags', 'category', 'country')->firstWhere('slug', $slug);

    foreach ($video->tags as $item) {
      $item->clicked_today = intval($item->clicked_today) + 1;
      $item->popularity = intval($item->popularity) + 1;
      $item->save();
    }

    $video->clicked_today = intval($video->clicked_today) + 1;
    $video->save();

    $video->category->clicked_today = intval($video->category->clicked_today) + 1;
    $video->category->popularity = intval($video->category->popularity) + 1;
    $video->category->save();

    $video->country->clicked_today = intval($video->country->clicked_today) + 1;
    $video->country->popularity = intval($video->country->popularity) + 1;
    $video->country->save();

    return view('guest.video.show', compact('video'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Video $video)
  {
    $video = Video::with('tags', 'country', 'category')->find($video->id);
    $countries = Country::all();
    $categories = Category::all();

    foreach ($video->tags as $videoTag) {
      $videoTags[] = $videoTag->id;
    }

    $tags = tag::whereNotIn("id", $videoTags)->orderBy("name", "asc")->get();

    return view('admin.videos.edit', compact('countries', 'categories', 'video', 'tags'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Video $video)
  {
    $request->validate([
      'name' => 'required|string|max:255',
      'category_id' => 'required',
      'country_id' => 'required',
    ]);

    if ($request->file('video')) {
      $storage_path = substr($video->link, 9);
      Storage::delete($storage_path);

      $extension = $request->file('video')->getClientOriginalExtension();
      $newname = Str::random(12) . $extension;
      $request->file('video')->storeAs(Auth::user()->name, $newname);
      $image_path = "/storage/" . Auth::user()->name . $newname;

      $video->link = $image_path;
    }

    $video->name = $request->name;
    $video->category_id = $request->category_id;
    $video->country_id = $request->country_id;
    $video->tags->sync($request->tags);
    $video->save();

    Session::flash('status', 'success');
    Session::flash('message', 'Berhasil Mengupdate Video');

    return redirect()->route('videos.index');
  }

  public function destroy(Video $video)
  {
    $storage_path = substr($video->link, 9);
    $image_path = substr($video->thumbnail, 9);
    Storage::delete($storage_path);
    Storage::delete($image_path);

    $video->delete();

    Session::flash('status', 'warning');
    Session::flash('message', 'Berhasil Menghapus Video');

    return redirect()->route('videos.index');
  }
}
