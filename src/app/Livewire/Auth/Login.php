<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\LoginForm;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Login')] 
#[Layout('components.layouts.guest')]
class Login extends Component
{
    public LoginForm $form;

    public function login()
    {   
        $this->validate();

        dd('Login successful');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
