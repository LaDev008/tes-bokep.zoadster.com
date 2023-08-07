<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TagDisplay extends Component
{
  public $item;

  public function render()
  {
    return view('livewire.tag-display');
  }
}
