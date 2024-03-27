<aside id="sidebar" class="js-sidebar border-end">
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="/">
                <span class="text-primary">Check</span>list
            </a>
        </div>
        
        <ul class="sidebar-nav d-flex flex-column">
            <x-layouts.partials.sidebar.sidebar-header title="Home" />

            <x-layouts.partials.sidebar.sidebar-item 
                route="dashboard" 
                icon="bi bi-speedometer2" 
                title="Dashboard" 
            />

            <x-layouts.partials.sidebar.sidebar-header title="Tasks" />
            
            <x-layouts.partials.sidebar.sidebar-item 
                route="" 
                icon="bi bi-list-check" 
                title="TO-DO" 
            />

            <x-layouts.partials.sidebar.sidebar-header title="Categories" />
            
            <livewire:categories.list-categories />


            <x-layouts.partials.sidebar.sidebar-header title="Tags" />
        </ul>
    </div>
</aside>