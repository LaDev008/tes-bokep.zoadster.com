<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ThumbnailDisplay extends Component
{
  public $video;

  public function render()
  {
    return view('livewire.thumbnail-display');
  }
}
