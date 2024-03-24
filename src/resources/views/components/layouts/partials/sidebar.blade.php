<aside id="sidebar" class="js-sidebar border-end">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="/">IRQD</a>
        </div>
        
        <ul class="sidebar-nav d-flex flex-column">
            <x-layouts.partials.sidebar.sidebar-header title="Home" />

            <x-layouts.partials.sidebar.sidebar-item 
                route="dashboard" 
                icon="bi bi-speedometer2" 
                title="Dashboard" 
            />

            <x-layouts.partials.sidebar.sidebar-header title="Apps" />
            
            <x-layouts.partials.sidebar.sidebar-item 
                route="to-do" 
                icon="bi bi-list-check" 
                title="TO-DO" 
            />

            <x-layouts.partials.sidebar.sidebar-dropdown 
                id="pages" 
                icon="bi bi-shop-window" 
                title="Shop" 
                :routes="[
                    ['route' => '', 'title' => 'Page 1'],
                    ['route' => '', 'title' => 'Page 2'],
                    ['route' => '', 'title' => 'Page 3'],
                ]"
            />

            {{-- <x-layouts.partials.sidebar.sidebar-dropdown 
                id="posts" 
                icon="bi bi-people" 
                title="Customers" 
                :routes="[
                    ['route' => '', 'title' => 'Posts 1'],
                    ['route' => '', 'title' => 'Posts 2'],
                    ['route' => '', 'title' => 'Posts 3'],
                ]"
            />

            <x-layouts.partials.sidebar.sidebar-dropdown 
                id="auth" 
                icon="bi bi-calendar" 
                title="Calendar" 
                :routes="[
                    ['route' => '', 'title' => 'Posts 1'],
                    ['route' => '', 'title' => 'Posts 2'],
                    ['route' => '', 'title' => 'Posts 3'],
                ]"
            />

            <x-layouts.partials.sidebar.sidebar-header title="Admin" />

            <x-layouts.partials.sidebar.sidebar-dropdown 
                id="multi"
                icon="bi bi-person-lock"
                title="Authorization"
            >
                <x-layouts.partials.sidebar.sidebar-dropdown-item 
                    id="level-1"
                    title="Level 1"
                    :routes="[
                        ['route' => '', 'title' => 'Page 1'],
                        ['route' => '', 'title' => 'Page 2'],
                        ['route' => '', 'title' => 'Page 3'],
                    ]" 
                />
            </x-layouts.partials.sidebar.sidebar-dropdown> --}}
        </ul>
    </div>
</aside>