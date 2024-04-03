<div wire:ignore.self class="modal modal-lg fade" tabindex="-1" id="taskModal" aria-labelledby="taskModalLabel" aria-hidden="true">
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
                                <label for="title" class="form-label fw-bold">
                                    Title
                                </label>
                                <input type="text" id="title" class="form-control form-control-sm" wire:model="form.title" />

                                @error('form.title') 
                                    <span class="text-danger fs-xs">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-bold">Description</label>
                                <textarea class="form-control form-control-sm" id="textAreaExample" rows="3"
                                    placeholder="Make your tasks meaningful..."></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Priority</label>
                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="priority-low" value="low" wire:model="form.priority" />
                                        <label class="form-check-label" for="priority-low">
                                            Low
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" 
                                        id="priority-medium" value="medium" wire:model="form.priority" />
                                        <label class="form-check-label" for="priority-medium">
                                            Medium
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="priority-high" value="high" wire:model="form.priority" />
                                        <label class="form-check-label" for="priority-high">
                                            High
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label fw-bold">Status</label>

                                <div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2"
                                            id="inlineRadio11" value="option1" checked />
                                        <label class="form-check-label" for="inlineRadio11">
                                            Pending
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2"
                                            id="inlineRadio22" value="option2" />
                                        <label class="form-check-label" for="inlineRadio22">
                                            In Progress
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="inlineRadioOptions2"
                                            id="inlineRadio33" value="option3" />
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

                            <div class="mb-3" wire:ignore>
                                <label for="exampleInputEmail1" class="form-label fw-bold">Tags</label>
                                <select multiple aria-label="multiple select example" autocomplete="off" class="tom-select">
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
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" />
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
                                                <input type="text" class="form-control form-control-sm"
                                                    placeholder="Click here to input..." />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label fw-bold">Priority</label>

                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio1"
                                                            value="option1" checked />
                                                        <label class="form-check-label" for="inlineRadio1">
                                                            Low
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio2"
                                                            value="option2" />
                                                        <label class="form-check-label" for="inlineRadio2">
                                                            Medium
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions" id="inlineRadio3"
                                                            value="option3" />
                                                        <label class="form-check-label" for="inlineRadio3">
                                                            High
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1"
                                                    class="form-label fw-bold">Status</label>

                                                <div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions2" id="inlineRadio11"
                                                            value="option1" checked />
                                                        <label class="form-check-label" for="inlineRadio11">
                                                            Pending
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions2" id="inlineRadio22"
                                                            value="option2" />
                                                        <label class="form-check-label" for="inlineRadio22">
                                                            In Progress
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio"
                                                            name="inlineRadioOptions2" id="inlineRadio33"
                                                            value="option3" />
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
                <button type="submit" class="btn btn-primary" x-on:click="$wire.save()">
                    Save
                </button>
            </div>
        </div>
    </div>
</div>