<div class="col-12 col-lg-6 col-xl-4">
    <div class="card card-body p-3 bg-body h-100" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#updateTaskModal" wire:click="$dispatch('set-task', { id: {{ $task->id }} })">
        <h6 class="card-title fs-xs fw-bold text-truncate mb-0">
            {{-- {{ dd($task) }} --}}
            <i class="bi bi-circle-fill" style="color: {{ $task->category->hex_color }}"></i>
            {{ $task->title }}
        </h6>

        <div class="d-flex justify-content-between align-items-center">
            <div>
                <span @class([
                    'badge px-2',
                    'text-bg-success' => $task->priority->value == 'low',
                    'text-bg-warning' => $task->priority->value == 'medium',
                    'text-bg-danger' => $task->priority->value == 'high',
                ])>
                    {{ $task->priority }}
                </span>
                <span @class([
                    'badge px-2',
                    'text-bg-warning' => $task->status->value == 'pending',
                    'text-bg-primary' => $task->status->value == 'in_progress',
                    'text-bg-success' => $task->status->value == 'completed',
                ])>
                    {{ $task->status }}
                </span>
            </div>

            @if(isset($task->due_date))
                <div class="fs-xs">
                    <i class="bi bi-clock"></i>
                    {{ $task->due_date->format('d/m/Y h:i A') }}
                </div>
            @endif
        </div>

        @if($totalSubTasks > 0)
            <div class="fs-xs mt-3">
                Subtasks: {{ $completedSubTasks }}/{{ $totalSubTasks }} completed

                <div class="progress mt-1">
                    <div class="progress-bar bg-primary" role="progressbar" 
                    style="width: {{ $subTasksPercentage }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        @else
            <div class="alert alert-primary fs-xs fw-bold mt-3 px-2 py-1 m-0">
                No subtasks
            </div>
        @endif

        <div class="mt-3 mb-1">
            <i class="bi bi-tags"></i>
            Tags:
        </div>

        <div class="d-flex justify-content-start gap-1">
            @forelse($task->tags as $tag)
                <span class="badge px-2 py-1" 
                    style="background-color: {{ $tag->hex_color }}"
                    x-bind:class="{ 
                        'text-dark': isTextLight('{{ $tag->hex_color }}'), 
                        'text-white': !isTextLight('{{ $tag->hex_color }}') 
                    }"
                >
                    {{ $tag->name }}
                </span>
            @empty
                <span class="badge px-2 py-1 bg-light text-dark">No tags</span>
            @endforelse
        </div>
    </div>
</div>
