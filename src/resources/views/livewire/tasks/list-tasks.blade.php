@section('styles')
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js" data-navigate-once></script>
@endsection

<div>
    <x-navigation.breadcrumb :routes="[
        ['name' => 'Tasks', 'url' => ''],
        ['name' => 'My Tasks', 'url' => 'tasks.index']
    ]" />

    <div class="modal modal-lg fade" tabindex="-1" id="taskModal" aria-labelledby="taskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-sm-down">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="taskModalLabel">Task:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form>
                        <div class="row justify-content-center align-items-start g-3">
                            <div class="col-12 col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Title</label>
                                    <input type="email" class="form-control form-control-sm" id="exampleInputEmail1" aria-describedby="emailHelp" />
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Description</label>
                                    <textarea class="form-control form-control-sm" id="textAreaExample" rows="3" placeholder="Make your tasks meaningful..."></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Priority</label>
                                    
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked/>
                                            <label class="form-check-label" for="inlineRadio1">
                                                Low
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
                                            <label class="form-check-label" for="inlineRadio2">
                                                Medium
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" />
                                            <label class="form-check-label" for="inlineRadio3">
                                                High
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Status</label>
                                    
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio11" value="option1" checked/>
                                            <label class="form-check-label" for="inlineRadio11">
                                                Pending
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio22" value="option2" />
                                            <label class="form-check-label" for="inlineRadio22">
                                                In Progress
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio33" value="option3" />
                                            <label class="form-check-label" for="inlineRadio33">
                                                Completed
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Category</label>
                                    <select class="form-select form-select-sm" aria-label="Default select example">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>

                                <div x-data="{
                                    initTomSelect() {
                                        new TomSelect(this.$refs['tag-select'], {
                                            plugins: ['remove_button'],
                                            create: true,
                                            valueField: 'id',
                                            labelField: 'name',
                                            searchField: 'name',
                                            options: [
                                                {id: 1, name: 'One'},
                                                {id: 2, name: 'Two'},
                                                {id: 3, name: 'Three'},
                                            ]
                                        });
                                    },
                                }" x-init="initTomSelect()">
                                    <label for="exampleInputEmail1" class="form-label fw-bold">Tags</label>
                                    <select multiple aria-label="multiple select example" autocomplete="off" x-ref="tag-select">
                                        <option selected>Open this select menu</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="d-flex justify-content-between align-items-end border-bottom pb-1 mb-1">
                                    <h6 class="mb-0">Subtasks</h6>
                                    <a type="button" class="text-primary">
                                        <i class="bi bi-plus-lg"></i>
                                    </a>
                                </div>
                                <ul class="list-group border-0">
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between align-items-start">
                                            <div class="d-flex align-items-start g-1">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                                                </div> 
                                                <div>
                                                    <h6 class="mb-0">
                                                        Some longs subtasks title
                                                    </h6>
                                                    <span class="badge text-bg-success px-2">
                                                        Low
                                                    </span>
                                                    <span class="badge text-bg-warning px-2">
                                                        Pending
                                                    </span>
                                                </div>
                                            </div>
                                            <div>
                                                <a type="button" class="text-warning me-2">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <a type="button" class="text-danger">
                                                    <i class="bi bi-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <div class="d-flex justify-content-between align-items-start gap-2">
                                            <div class="flex-grow-1">
                                                <div class="mb-3">
                                                    <input type="text" class="form-control form-control-sm" placeholder="Click here to input..." />
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label fw-bold">Priority</label>
                                                    
                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked/>
                                                            <label class="form-check-label" for="inlineRadio1">
                                                                Low
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2" />
                                                            <label class="form-check-label" for="inlineRadio2">
                                                                Medium
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3" />
                                                            <label class="form-check-label" for="inlineRadio3">
                                                                High
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label fw-bold">Status</label>
                                                    
                                                    <div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio11" value="option1" checked/>
                                                            <label class="form-check-label" for="inlineRadio11">
                                                                Pending
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio22" value="option2" />
                                                            <label class="form-check-label" for="inlineRadio22">
                                                                In Progress
                                                            </label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions2" id="inlineRadio33" value="option3" />
                                                            <label class="form-check-label" for="inlineRadio33">
                                                                Completed
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <a type="button" class="text-danger me-2">
                                                    <i class="bi bi-x-lg"></i>
                                                </a>
                                                <a type="button" class="text-success">
                                                    <i class="bi bi-check-lg"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-subtle" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </div>
    </div>

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
