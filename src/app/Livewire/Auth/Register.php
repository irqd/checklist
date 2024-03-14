<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\Auth\RegisterForm;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;

#[Title('Register')] 
#[Layout('components.layouts.guest')]
class Register extends Component
{   
    public RegisterForm $form;

    public function register()
    {
        $this->validate();
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
