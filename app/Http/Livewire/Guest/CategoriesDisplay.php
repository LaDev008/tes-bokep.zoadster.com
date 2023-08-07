<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;

class CategoriesDisplay extends Component
{
  public $item;
  
  public function render()
  {
    return view('livewire.guest.categories-display');
  }
}
