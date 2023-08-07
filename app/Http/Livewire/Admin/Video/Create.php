<?php

namespace App\Http\Livewire\Admin\Video;

use getid3;
use App\Models\Tag;
use App\Models\Video;
use App\Models\Country;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
  use WithFileUploads;

  public $categories, $countries, $tags;
  public $title, $video, $category_id, $country_id, $photo, $tag_items = [], $source;

  public function mount()
  {
    $this->categories = Category::all()->sortBy('name');
    $this->countries = Country::all()->sortBy('name');
    $this->tags = Tag::all()->sortBy('name');
  }

  public function submit()
  {
    $this->validate([
      'title' => 'required|string|max:255',
      'video' => 'required',
      'category_id' => 'required',
      'country_id' => 'required',
      'photo' => 'required|image|mimes:png,jpg,jpeg,webp',
    ]);

    $random_name = Str::random(12);

    $extension = $this->video->getClientOriginalExtension();
    $newname =  "$random_name.$extension";
    $this->video->storeAs(Auth::user()->name, $newname);
    $video_path = "/storage/" . Auth::user()->name . "/" . $newname;

    $extension2 = $this->photo->getClientOriginalExtension();
    $newname2 = "$random_name.$extension2";
    $this->photo->storeAs(Auth::user()->name, $newname2);
    $image_path = "/storage/" . Auth::user()->name . "/" . $newname2;

    $video = Video::create([
      'title' => $this->title,
      'link' => $video_path,
      'thumbnail' => $image_path,
      'slug' => str_replace(" ", "-", Str::lower($this->title)),
      'category_id' => $this->category_id,
      'country_id' => $this->country_id,
      'user_id' => Auth::id(),
    ]);

    // get video length
    $getID3 = new \getID3;
    $storage_path = substr($video->link, 9);
    $video_file = $getID3->analyze(base_path("/storage/app/public/$storage_path"));
    $video->video_length = $video_file['playtime_string'];
    $video->save();

    if ($this->source) {
      $video->source = $this->source;
      $video->save();
    } else {
      $video->source = Auth::user()->name;
      $video->save();
    }

    $video->tags()->attach($this->tag_items);

    Session::flash('status', 'success');
    Session::flash('message', 'Berhasil Mengupload Video Baru');

    return redirect()->route('videos.index');
  }

  public function render()
  {
    return view('livewire.admin.video.create');
  }
}
