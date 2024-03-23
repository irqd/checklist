<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Traits\HasRecentEmails;
use Livewire\Attributes\Layout;
use App\Livewire\Forms\Auth\LoginForm;

#[Title('Login')] 
#[Layout('components.layouts.guest')]
class Login extends Component
{
    use HasRecentEmails;

    public LoginForm $form;
    public $recent_emails = [];
    public $select_email = false;

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function mount()
    {
        $this->recent_emails = json_decode(request()->cookie('recent_emails'), true);
        
        if (!is_null($this->recent_emails)) {
            $this->select_email = true;
        }
    }
    
    public function toggleSelectEmail($email = null)
    {
        $this->select_email = !$this->select_email;

        if ($email) {
            $this->form->email = $email;
            $this->form->remember = true;
        }
    }

    public function login()
    {   
        $this->validate();

        if(auth()->attempt(
            $this->form->only('email', 'password'), 
            $this->form->remember
        ))
        {
            $this->updateRecentEmails($this->form->email);

            return $this->redirect(route('dashboard'), true);
        }

        return $this->dispatch('notify', type: 'danger', message: 'Invalid credentials');
    }
}
