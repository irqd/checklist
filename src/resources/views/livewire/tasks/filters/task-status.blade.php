<div class="btn-group-vertical btn-group-sm w-100" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-outline-default border-0 mb-1 rounded {{ $status == 'all' ? 'active' : '' }}" x-on:click="$wire.set('status', 'all')" wire:model.live="status">
        <div class="d-flex justify-content-between align-items-center">
            <span class="ms-2">All</span>
            <span class="badge bg-primary px-2 py-1">3</span>
        </div>
    </button>
    <button type="button" class="btn btn-outline-default border-0 mb-1 rounded {{ $status == 'pending' ? 'active' : '' }}" x-on:click="$wire.set('status', 'pending')">
        <div class="d-flex justify-content-between align-items-center">
            <span class="ms-2">Pending</span>
            <span class="badge bg-primary px-2 py-1">3</span>
        </div>
    </button>
    <button type="button" class="btn btn-outline-default border-0 mb-1 rounded {{ $status == 'in_progress' ? 'active' : '' }}" x-on:click="$wire.set('status', 'in_progress')">
        <div class="d-flex justify-content-between align-items-center">
            <span class="ms-2">In Progress</span>
            <span class="badge bg-primary px-2 py-1">3</span>
        </div>
    </button>
    <button type="button" class="btn btn-outline-default border-0 mb-1 rounded {{ $status == 'completed' ? 'active' : '' }}" x-on:click="$wire.set('status', 'completed')">
        <div class="d-flex justify-content-between align-items-center">
            <span class="ms-2">Completed</span>
            <span class="badge bg-primary px-2 py-1">3</span>
        </div>
    </button>
</div>