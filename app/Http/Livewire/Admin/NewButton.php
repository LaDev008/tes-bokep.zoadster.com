<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class NewButton extends Component
{
  public $routeName;

  public function render()
  {
    return view('livewire.admin.new-button');
  }
}
