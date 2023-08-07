<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class NavigationCard extends Component
{
  public $routeName, $routeId, $title;

    public function render()
    {
        return view('livewire.admin.navigation-card');
    }
}
