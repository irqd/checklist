<?php

namespace App\Livewire\Forms\Auth;

use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    public string $email = '';
    public string $password = '';

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
        ];
    }
}
