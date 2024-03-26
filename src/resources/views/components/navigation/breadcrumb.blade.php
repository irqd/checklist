<ol class="breadcrumb rounded-0">
    @foreach($routes as $route)
        <li @class([
            'breadcrumb-item' => true,
            'active' => $loop->last
        ]) aria-current="page">
            @if($loop->last)
                {{ $route['name'] }}
            @else
                <a href="{{ $route['url'] ? route($route['url']) : '#' }}">
                    {{ $route['name'] }}
                </a>
            @endif
        </li>
    @endforeach
</ol>