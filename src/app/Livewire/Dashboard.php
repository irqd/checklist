<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {   
        // if(url()->previous() === route('login')) {
        //     $this->dispatch(
        //         'notify', 
        //         type: 'success', 
        //         message: 'Hey, ' . auth()->user()->username . '! Welcome back!'
        //     );
        // }

        return view('livewire.dashboard');
    }
}
