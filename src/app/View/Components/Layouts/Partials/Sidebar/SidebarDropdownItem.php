<?php

namespace App\View\Components\Layouts\Partials\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarDropdownItem extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $title,
        public string $icon = '',
        public array $routes = [],
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layouts.partials.sidebar.sidebar-dropdown-item');
    }
}
