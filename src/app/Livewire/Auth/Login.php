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

        if(auth()->attempt(
            $this->form->only('email', 'password'), 
            $this->form->remember
        ))
        {
            TODO:
            // add email to recent accounts signed in on this device
            // but check first if the email is already in the list
            // if it is, remove it and add it again to the top of the list
            // if it is not, add it to the top of the list
            // limit the list to 5 recent accounts
            // save the list to the session
            // if(session()->has('recent_accounts'))
            // {
            //     $recent_accounts = session('recent_accounts');

            //     if(in_array($this->form->email, $recent_accounts))
            //     {
            //         $recent_accounts = array_diff($recent_accounts, [$this->form->email]);
            //     }

            //     array_unshift($recent_accounts, $this->form->email);
            //     $recent_accounts = array_slice($recent_accounts, 0, 5);
            //     session(['recent_accounts' => $recent_accounts]);
            // }
            // else
            // {
            //     session(['recent_accounts' => [$this->form->email]]);
            // }

            return redirect()->intended(route('dashboard'));
        }

        return $this->dispatch('notify', type: 'danger', message: 'Invalid credentials');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
