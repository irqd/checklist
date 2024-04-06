<div>
    <x-navigation.breadcrumb :routes="[
        ['name' => 'Tasks', 'url' => ''],
        ['name' => 'My Tasks', 'url' => 'tasks.index']
    ]" />

    <livewire:tasks.add-task />

    <div class="row justify-content-center align-items-start g-5">
        <div class="col-12 col-md-4 col-xl-2">
            <h6 class="fs-xs fw-bold">Status</h6>

            <div 
                class="btn-group-vertical btn-group-sm w-100" 
                role="group" 
                aria-label="Basic example"
            >
                <button type="button" class="btn btn-outline-default border-0 mb-1 rounded active">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ms-2">All</span>
                        <span class="badge bg-primary px-2 py-1">3</span>
                    </div>
                </button>
                <button type="button" class="btn btn-outline-default border-0 mb-1 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ms-2">Pending</span>
                        <span class="badge bg-primary px-2 py-1">3</span>
                    </div>
                </button>
                <button type="button" class="btn btn-outline-default border-0 mb-1 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ms-2">In Progress</span>
                        <span class="badge bg-primary px-2 py-1">3</span>
                    </div>
                </button>
                <button type="button" class="btn btn-outline-default border-0 mb-1 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ms-2">Completed</span>
                        <span class="badge bg-primary px-2 py-1">3</span>
                    </div>
                </button>
            </div>

            <hr>

            <h6 class="fs-xs fw-bold">Priority</h6>
            <div 
                class="btn-group-vertical btn-group-sm w-100" 
                role="group" 
                aria-label="Basic example"
            >
                <button type="button" class="btn btn-outline-default border-0 mb-1 rounded active">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ms-2">All</span>
                        <span class="badge bg-primary px-2 py-1">3</span>
                    </div>
                </button>
                <button type="button" class="btn btn-outline-default border-0 mb-1 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ms-2">Low</span>
                        <span class="badge bg-primary px-2 py-1">3</span>
                    </div>
                </button>
                <button type="button" class="btn btn-outline-default border-0 mb-1 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ms-2">Medium</span>
                        <span class="badge bg-primary px-2 py-1">3</span>
                    </div>
                </button>
                <button type="button" class="btn btn-outline-default border-0 mb-1 rounded">
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="ms-2">High</span>
                        <span class="badge bg-primary px-2 py-1">3</span>
                    </div>
                </button>
            </div>
        </div>
        
        <div class="col-12 col-md-8 col-xl-10">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="d-flex align-items-center">
                    <h1 class="fs-1 m-0">
                        31
                    </h1>
                    <div>
                        <h6 class="m-0 fw-bold fs-sm">March</h6>
                        <h6 class="m-0 fw-bold fs-sm">2024</h6>
                    </div>
                    <div class="mx-1 vr"></div>
                    <div>
                        <h6 class="m-0 fw-bold fs-sm">Monday</h6>
                        <h6 class="m-0 fw-bold fs-sm">12:00 PM</h6>
                    </div>
                </div>
                <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#taskModal">
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
                <div class="col-12 col-lg-6 col-xl-4">
                    <div class="card card-body p-3 bg-body" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#taskModal">
                        <h6 class="card-title fs-xs fw-bold text-truncate mb-0">
                            <i class="bi bi-circle-fill text-primary"></i>
                            Some long task name here ada adwwd adawd adwawd dawda
                        </h6>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge text-bg-success px-2">
                                    Low
                                </span>
                                <span class="badge text-bg-warning px-2">
                                    Pending
                                </span>
                            </div>
                            <div class="fs-xs">
                                10/03/2024 12:00 PM
                            </div>
                        </div>

                        <div class="fs-xs mt-3">
                            Subtasks: 0/3 completed

                            <div class="progress mt-1">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mt-3 mb-1">
                            <i class="bi bi-tags"></i>
                            Tags:
                        </div>

                        <div class="d-flex justify-content-start gap-1">
                            <span class="badge bg-primary px-2 py-1">Tag 1</span>
                            <span class="badge bg-primary px-2 py-1">Tag 2</span>
                            <span class="badge bg-primary px-2 py-1">Tag 3</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-4">
                    <div class="card card-body p-3 bg-body" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#taskModal">
                        <h6 class="card-title fs-xs fw-bold text-truncate mb-0">
                            <i class="bi bi-circle-fill text-primary"></i>
                            Some long task name here ada adwwd adawd adwawd dawda
                        </h6>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge text-bg-success px-2">
                                    Low
                                </span>
                                <span class="badge text-bg-warning px-2">
                                    Pending
                                </span>
                            </div>
                            <div class="fs-xs">
                                10/03/2024 12:00 PM
                            </div>
                        </div>

                        <div class="fs-xs mt-3">
                            Subtasks: 0/3 completed

                            <div class="progress mt-1">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mt-3 mb-1">
                            <i class="bi bi-tags"></i>
                            Tags:
                        </div>

                        <div class="d-flex justify-content-start gap-1">
                            <span class="badge bg-primary px-2 py-1">Tag 1</span>
                            <span class="badge bg-primary px-2 py-1">Tag 2</span>
                            <span class="badge bg-primary px-2 py-1">Tag 3</span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-6 col-xl-4">
                    <div class="card card-body p-3 bg-body" style="cursor: pointer" data-bs-toggle="modal" data-bs-target="#taskModal">
                        <h6 class="card-title fs-xs fw-bold text-truncate mb-0">
                            <i class="bi bi-circle-fill text-primary"></i>
                            Some long task name here ada adwwd adawd adwawd dawda
                        </h6>

                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <span class="badge text-bg-success px-2">
                                    Low
                                </span>
                                <span class="badge text-bg-warning px-2">
                                    Pending
                                </span>
                            </div>
                            <div class="fs-xs">
                                10/03/2024 12:00 PM
                            </div>
                        </div>

                        <div class="fs-xs mt-3">
                            Subtasks: 0/3 completed

                            <div class="progress mt-1">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>

                        <div class="mt-3 mb-1">
                            <i class="bi bi-tags"></i>
                            Tags:
                        </div>

                        <div class="d-flex justify-content-start gap-1">
                            <span class="badge bg-primary px-2 py-1">Tag 1</span>
                            <span class="badge bg-primary px-2 py-1">Tag 2</span>
                            <span class="badge bg-primary px-2 py-1">Tag 3</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script data-navigate-once>
    const tomSelectInstances = {};
    const tags = document.querySelectorAll('.tom-select');
    const modal = new bootstrap.Modal('#taskModal');
    
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

    function resetItems() {
        for (const id in tomSelectInstances) {
            if (Object.hasOwnProperty.call(tomSelectInstances, id)) {
                const tomSelect = tomSelectInstances[id];
                tomSelect.clear();
            }
        }
    }

    tags.forEach(tag => {
        const is_multiple = tag.hasAttribute('multiple');
        initTomSelect(tag, is_multiple);
    });

    document.addEventListener('livewire:navigated', () => {
        Livewire.on('reset-form', () => {
            modal.hide();
        });
    });
</script>
@endpush
