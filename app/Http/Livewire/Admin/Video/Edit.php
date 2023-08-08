<?php

namespace App\Http\Livewire\Admin\Video;

use App\Models\Tag;
use App\Models\Country;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Edit extends Component
{
  use WithFileUploads;

  public $categories, $countries, $tags, $item;
  public $title, $category_id, $country_id, $photo, $tag_items = [], $source, $old_photo, $video_length, $video, $old_video, $itemTags;

  protected $rules = [
    'title' => 'required|string|max:255',
    'category_id' => 'required',
    'country_id' => 'required',
    'tag_items' => 'required',
  ];

  public function mount()
  {
    $this->categories = Category::all()->sortBy('name');
    $this->countries = Country::all()->sortBy('name');
    $this->tags = Tag::all()->sortBy('name');
    $this->title = $this->item->title;
    $this->category_id = $this->item->category_id;
    $this->country_id = $this->item->country_id;
    $this->old_photo = $this->item->thumbnail;
    $this->source = $this->item->source;
    $this->video_length = $this->item->video_length;
    $this->old_video = $this->item->link;
    foreach ($this->item->tags as $data) {
      $this->tag_items[] = $data->id;
    }
  }

  public function submit()
  {
    $this->validate();

    $random_name = Str::random(12);

    if ($this->video) {
      $extension = $this->video->getClientOriginalExtension();
      $newname =  "$random_name.$extension";
      $this->video->storeAs(Auth::user()->name, $newname);
      $video_path = "/storage/" . Auth::user()->name . "/" . $newname;
      $this->item->link = $video_path;
      $this->item->save();
    }

    if ($this->photo) {
      $extension2 = $this->photo->getClientOriginalExtension();
      $newname2 = "$random_name.$extension2";
      $this->photo->storeAs(Auth::user()->name, $newname2);
      $image_path = "/storage/" . Auth::user()->name . "/" . $newname2;
      $this->item->thumbnail = $image_path;
      $this->item->save();
    }

    $this->item->title = $this->title;
    $this->item->slug = str_replace(" ", "-", $this->title);
    $this->item->category_id = $this->category_id;
    $this->item->country_id = $this->country_id;
    $this->item->user_id = Auth::id();
    $this->item->save();

    if ($this->video) {
      // get video length
      $getID3 = new \getID3;
      $storage_path = substr($this->item->link, 9);
      $video_file = $getID3->analyze(base_path("/storage/app/public/$storage_path"));
      $this->item->video_length = $video_file['playtime_string'];
      $this->item->save();
    }

    if ($this->source) {
      $this->item->source = $this->source;
      $this->item->save();
    } else {
      $this->item->source = Auth::user()->name;
      $this->item->save();
    }

    $this->item->tags()->sync($this->tag_items);

    Session::flash('status', 'success');
    Session::flash('message', 'Berhasil Mengupdate Video ' . $this->item->title);

    return redirect()->route('videos.index');
  }


  public function render()
  {
    return view('livewire.admin.video.edit');
  }
}
