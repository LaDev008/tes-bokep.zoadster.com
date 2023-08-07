<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class EditButton extends Component
{
  public $routeName, $routeId;

  public function render()
  {
    return view('livewire.admin.edit-button');
  }
}
