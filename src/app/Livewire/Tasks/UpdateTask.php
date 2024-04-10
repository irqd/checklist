<?php

namespace App\Livewire\Tasks;

use App\Models\Tag;
use App\Models\Task;
use Livewire\Component;
use App\Models\Category;
use Livewire\Attributes\On;
use App\Livewire\Forms\Tasks\TaskForm;

class UpdateTask extends Component
{
    public TaskForm $form;

    public function render()
    {
        $categories = Category::select('id', 'name', 'hex_color')
            ->where('user_id', auth()->id())
            ->get();

        $tags = Tag::select('id', 'name', 'hex_color')
            ->where('user_id', auth()->id())
            ->get();

        return view('livewire.tasks.update-task', compact('categories', 'tags'));
    }

    #[On('set-task')]
    public function setTask($id)
    {
        $task = Task::findOrFail($id);

        $this->form->setTask($task);
    }
}
