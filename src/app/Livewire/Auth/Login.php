<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Login')] 
#[Layout('components.layouts.guest')]
class Login extends Component
{
    public function render()
    {
        return view('livewire.auth.login');
    }
}
