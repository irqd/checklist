<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Livewire\Forms\Auth\RegisterForm;

#[Title('Register')] 
#[Layout('components.layouts.guest')]
class Register extends Component
{   
    public RegisterForm $form;

    public function register()
    {
        $validated = $this->validate();

        try {
            DB::transaction(function () use ($validated){
                $user = User::create([
                    'username' => $validated['username'],
                    'email' => $validated['email'],
                    'password' => Hash::make($validated['password']),
                ]);

                Auth::login($user);
            });
        } catch (\Exception $e) {
            return $this->dispatch('notify', type: 'danger', message: 'Something went wrong during registration. Please try again.');
        }

        return $this->redirect(route('dashboard'), true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
