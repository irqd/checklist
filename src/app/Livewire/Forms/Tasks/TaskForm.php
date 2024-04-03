<?php

namespace App\Livewire\Forms\Tasks;

use Livewire\Form;
use App\Models\Tag;
use App\Enums\Status;
use App\Enums\Priority;
use App\Models\Category;
use App\Models\Task;
use Livewire\Attributes\Validate;
use Illuminate\Validation\Rule;

class TaskForm extends Form
{
    public ?Task $task;

    public ?string $title;
    public ?string $description;
    public ?Priority $priority = Priority::LOW;
    public ?Status $status = Status::PENDING;
    public ?int $category_id;
    public array $tags = [];
    public ?string $due_date;
    public array $sub_tasks = [];

    public function setTask(Task $task)
    {
        $this->task = $task;

        $this->title = $task->title;
        $this->description = $task->description;
        $this->priority = $task->priority;
        $this->status = $task->status;
        $this->category_id = $task->category_id;
        $this->tags = $task->tags->pluck('id')->toArray();
        $this->due_date = $task->due_date ? $task->due_date->format('Y-m-d') : '';
        $this->sub_tasks = $task->subTasks->map(function ($subTask) {
            return [
                'name' => $subTask->title,
                'priority' => $subTask->priority,
                'status' => $subTask->status,
            ];
        })->toArray();
    }

    public function store()
    {
        $this->validate();

        $task = Task::create(
            $this->only(['title', 'description', 'priority', 'status', 'category_id', 'due_date'])
        );

        $task->tags()->attach($this->tags);

        $task->subTasks()->createMany($this->sub_tasks);

        $this->reset();
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'string', Rule::enum(Priority::class)],
            'status' => ['required', 'string', Rule::enum(Status::class)],
            'category_id' => ['nullable', 'integer', 'exists:categories,id'],
            'tags.*' => ['nullable', 'integer', 'exists:tags,id'],
            'due_date' => ['nullable', 'date'],
            'sub_tasks.*.name' => ['nullable', 'string', 'max:255'],
            'sub_tasks.*.priority' => ['nullable', 'string', Rule::enum(Priority::class)],
            'sub_tasks.*.status' => ['nullable', 'string', Rule::enum(Status::class)],
        ];
    }
}
