<div class="card card-body p-3 bg-body" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#taskModal">
    <h6 class="card-title fs-xs fw-bold text-truncate mb-0">
        <i class="bi bi-circle-fill text-primary"></i>
        {{ $task->title }}
    </h6>

    <div class="d-flex justify-content-between align-items-center">
        <div>
            <span class="badge text-bg-success px-2">
                {{ $task->priority }}
            </span>
            <span class="badge text-bg-warning px-2">
                {{ $task->status }}
            </span>
        </div>
        <div class="fs-xs">
            <i class="bi bi-clock"></i>
            {{ $task->due_date->format('d/m/Y h:i A') }}
        </div>
    </div>

    <div class="fs-xs mt-3">
        Subtasks: {{ $completedSubTasks }}/{{ $totalSubTasks }} completed

        <div class="progress mt-1">
            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $subTasksPercentage }}%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>

    <div class="mt-3 mb-1">
        <i class="bi bi-tags"></i>
        Tags:
    </div>

    <div class="d-flex justify-content-start gap-1">
        @foreach ($task->tags as $tag)
            <span class="badge px-2 py-1" 
                style="background-color: {{ $tag->hex_color }}">
                {{ $tag->name }}
            </span>
        @endforeach
    </div>
</div>
