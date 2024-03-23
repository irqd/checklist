<?php

namespace App\View\Components\Layouts\Partials\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SidebarDropdown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $id,
        public string $icon,
        public string $title,
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
        return view('components.layouts.partials.sidebar.sidebar-dropdown');
    }
}
