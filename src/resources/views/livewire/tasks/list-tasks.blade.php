<div>
    <x-navigation.breadcrumb :routes="[
        ['name' => 'Tasks', 'url' => ''],
        ['name' => 'My Tasks', 'url' => 'tasks.index']
    ]" />

    <livewire:tasks.add-task />
    <livewire:tasks.update-task />

    <div class="row justify-content-center align-items-start g-5">
        <div class="col-12 col-md-4 col-xl-2">
            <h6 class="fs-xs fw-bold">Status</h6>
            <livewire:tasks.filters.task-status wire:model.live="status"/>

            <hr>

            <h6 class="fs-xs fw-bold">Priority</h6>
            <livewire:tasks.filters.task-priority wire:model.live="priority"/>
        </div>
        
        <div class="col-12 col-md-8 col-xl-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <x-miscellaneous.simple-clock />
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#newTaskModal">
                    <i class="bi bi-plus-lg"></i>
                    New Task
                </button>
            </div>

            <div class="d-flex justify-content-center">
                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-default">All</button>
                    <button type="button" class="btn btn-default active">Today</button>
                    <button type="button" class="btn btn-default">This Week</button>
                    <button type="button" class="btn btn-default">This Month</button>
                    <button type="button" class="btn btn-default">Custom</button>
                </div>
            </div>

            <div class="row mt-3 g-1">
                @forelse($tasks as $index => $task)
                    <livewire:tasks.task-item :task="$task" :key="$task->id" />
                @empty
                    <div class="col-12">
                        <div class="alert alert-primary" role="alert">
                            <div class="d-flex gap-4">
                                <span>
                                    <i class="bi bi-info-circle icon-primary"></i>
                                </span>
                                <div class="d-flex flex-column gap-2">
                                    <h6 class="mb-0 fw-bold">
                                        No tasks found
                                    </h6>
                                    <p class="mb-0">
                                        You have no tasks to display. Start by creating a new task.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        @if ($tasks->hasPages())
            <div class="col-12">
                <div class="d-flex justify-content-end align-items-center">
                    {{ $tasks->links() }}
                </div>
            </div>
        @endif
    </div>
</div>

@push('scripts')
<script data-navigate-once>
    const tomSelectInstances = {};
    
    function resetSelectValues() {
        for (const id in tomSelectInstances) {
            if (Object.hasOwnProperty.call(tomSelectInstances, id)) {
                const tomSelect = tomSelectInstances[id];
                tomSelect.clear();
            }
        }
    }

    function setSelectValues(id, value) {
        const tomSelect = tomSelectInstances[id];
        tomSelect.setValue(value, true);
    }
</script>
@endpush

@script
<script>
    const tags = document.querySelectorAll('.tom-select');
    const newTaskModal = new bootstrap.Modal('#newTaskModal');
    const updateTaskModal = new bootstrap.Modal('#updateTaskModal');

    function initTomSelect(element, is_multiple) {
        const tomSelect = new TomSelect(element, {
            plugins: ['remove_button'],
            valueField: 'id',
            labelField: 'name',
            searchField: 'name',
            render: {
                option: function(data, escape) {
                    return `
                        <div>
                            <i class="bi bi-circle-fill" style="color: ${data.hexColor}"></i>
                            ${escape(data.name)}
                        </div>
                    `;
                },
                item: function(data, escape) {
                    const color = isTextLight(data.hexColor) ? 'text-dark' : 'text-light';

                    if (is_multiple) {
                        return `
                            <div class="${color}" style="background-color: ${data.hexColor};">
                                ${escape(data.name)}
                            </div>
                        `;
                    } else {
                        return `
                            <div>
                                <i class="bi bi-circle-fill me-1" style="color: ${data.hexColor}"></i>
                                ${escape(data.name)}
                            </div>
                        `;
                    }
                }
            }
        });

        tomSelectInstances[element.id] = tomSelect;
    }

    tags.forEach(tag => {
        const is_multiple = tag.hasAttribute('multiple');
        initTomSelect(tag, is_multiple);
    });

    Livewire.on('hide-task-form', (event) => {
        event == 'add-task' ? newTaskModal.hide() : updateTaskModal.hide();
    });
</script>
@endscript
