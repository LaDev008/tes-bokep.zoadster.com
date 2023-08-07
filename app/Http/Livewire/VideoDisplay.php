<?php

namespace App\Http\Livewire;

use Livewire\Component;

class VideoDisplay extends Component
{
  public $item;

  public function viewed()
  {
    $this->item->views = intval($this->item->views) + 1;
  }

  public function render()
  {
    return view('livewire.video-display');
  }
}
