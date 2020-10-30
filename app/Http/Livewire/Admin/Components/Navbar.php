<?php

namespace App\Http\Livewire\Admin\Components;

use Livewire\Component;

class Navbar extends Component
{
    public $activeRoute;

    public function mount($active)
    {
        $this->activeRoute = $active;
    }

    public function render()
    {
        return view('livewire.admin.components.navbar', ['active' => $this->activeRoute]);
    }
}
