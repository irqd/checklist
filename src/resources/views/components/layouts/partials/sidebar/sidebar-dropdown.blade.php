<li class="sidebar-item">
    <a type="button" class="sidebar-link collapsed" data-bs-target="#{{ $id }}" data-bs-toggle="collapse" aria-expanded="false">
        <i class="{{ $icon }} fs-6 pe-2"></i>
        <span>{{ $title }}</span>
    </a>
    <ul 
        id="{{ $id }}" 
        @class([
            "sidebar-dropdown list-unstyled collapse",
            "show" => request()->routeIs(...$routes)
        ]) 
        data-bs-parent="#sidebar"
    >
        @if($routes)
            @foreach($routes as $route)
                <x-layouts.partials.sidebar.sidebar-item 
                    :route="$route['route']" 
                    :title="$route['title']"
                />
            @endforeach
        @endif

        @if($slot)
            {{ $slot }}
        @endif
    </ul>
</li>