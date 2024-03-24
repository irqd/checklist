<li class="sidebar-item">
    <a href="{{ $route ? route($route) : '#' }}" @class([
        'sidebar-link',
        'active' => request()->routeIs($route)
    ]) wire:navigate>
        @if($icon)
            <i class="{{ $icon }} fs-6 pe-2"></i> 
        @endif

        <span>
            {{ $title }}
        </span>
    </a>
</li>