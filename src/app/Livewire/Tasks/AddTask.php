<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\Tasks\TaskForm;
use App\Models\Task;
use Livewire\Component;

class AddTask extends Component
{
    public TaskForm $form;

    public function render()
    {
        return view('livewire.tasks.add-task');
    }

    public function save()
    {
        $this->form->store();
    }
}
