<?php

namespace App\Livewire\Tasks;

use App\Enums\Priority;
use App\Enums\Status;
use App\Models\Tag;
use App\Models\Task;
use Livewire\Component;
use App\Models\Category;
use App\Livewire\Forms\Tasks\TaskForm;

class AddTask extends Component
{
    public TaskForm $form;
    public array $subTasks = [];
    
    public function render()
    {
        $categories = Category::select('id', 'name', 'hex_color')
            ->where('user_id', auth()->id())
            ->get();

        $tags = Tag::select('id', 'name', 'hex_color')
            ->where('user_id', auth()->id())
            ->get();

        return view('livewire.tasks.add-task', compact('categories', 'tags'));
    }

    public function addSubTask()
    {
        $this->form->sub_tasks[] = [
            'id' => null,
            'is_editing' => true,
            'is_subtask' => true,
            'title' => null,
            'priority' => Priority::LOW,
            'status' => Status::PENDING,
        ];
    }

    public function editSubTask($index)
    {
        $this->form->sub_tasks[$index]['is_editing'] = true;
    }

    public function cancelEditSubTask($index)
    {   
        unset($this->form->sub_tasks[$index]);
    }

    public function saveEditSubTask($index)
    {
        $this->form->validateOnly("sub_tasks.{$index}.title");
        $this->form->validateOnly("sub_tasks.{$index}.priority");
        $this->form->validateOnly("sub_tasks.{$index}.status");

        $this->form->sub_tasks[$index]['is_editing'] = false;
    }

    public function save()
    {
        $this->form->validate();
        
        try {
            $this->form->store();

            $this->dispatch('notify', type: 'success', message: 'New task added successfully');
            $this->dispatch('refresh-tasks');
            $this->dispatch('hide-task-form', 'add-task');
        } catch (\Exception $e) {
            $this->dispatch('notify', type: 'danger', message: 'Something went wrong. Please try again.');
        }
    }

    public function resetForm()
    {
        $this->form->resetForm();
    }
}
