<div class="btn-group-vertical btn-group-sm w-100" role="group" aria-label="Basic example">
    <button type="button" class="btn btn-outline-default border-0 mb-1 rounded {{ $priority == 'all' ? 'active' : '' }}" x-on:click="$wire.set('priority', 'all')">
        <div class="d-flex justify-content-between align-items-center">
            <span class="ms-2">All</span>
            <span class="badge bg-primary px-2 py-1">3</span>
        </div>
    </button>
    <button type="button" class="btn btn-outline-default border-0 mb-1 rounded {{ $priority == 'low' ? 'active' : '' }}" x-on:click="$wire.set('priority', 'low')">
        <div class="d-flex justify-content-between align-items-center">
            <span class="ms-2">Low</span>
            <span class="badge bg-primary px-2 py-1">3</span>
        </div>
    </button>
    <button type="button" class="btn btn-outline-default border-0 mb-1 rounded {{ $priority == 'medium' ? 'active' : '' }}" x-on:click="$wire.set('priority', 'medium')">
        <div class="d-flex justify-content-between align-items-center">
            <span class="ms-2">Medium</span>
            <span class="badge bg-primary px-2 py-1">3</span>
        </div>
    </button>
    <button type="button" class="btn btn-outline-default border-0 mb-1 rounded {{ $priority == 'high' ? 'active' : '' }}" x-on:click="$wire.set('priority', 'high')">
        <div class="d-flex justify-content-between align-items-center">
            <span class="ms-2">High</span>
            <span class="badge bg-primary px-2 py-1">3</span>
        </div>
    </button>
</div>
