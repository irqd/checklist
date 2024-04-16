<div>
    <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
        <button type="button" class="btn btn-default {{ $dateRange == 'all' ? 'active' : '' }}" x-on:click="$wire.set('dateRange', 'all')">All</button>
        <button type="button" class="btn btn-default {{ $dateRange == 'today' ? 'active' : '' }}" x-on:click="$wire.set('dateRange', 'today')">Today</button>
        <button type="button" class="btn btn-default {{ $dateRange == 'this_week' ? 'active' : '' }}" x-on:click="$wire.set('dateRange', 'this_week')">This Week</button>
        <button type="button" class="btn btn-default {{ $dateRange == 'this_month' ? 'active' : '' }}" x-on:click="$wire.set('dateRange', 'this_month')">This Month</button>
        <button type="button" class="btn btn-default {{ $dateRange == 'custom' ? 'active' : '' }}" x-on:click="$wire.set('dateRange', 'custom')">Custom</button>
    </div>
</div>