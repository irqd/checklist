<ul class="list-group border-0 mx-5 ps-1" x-data="{
    activeCategoryId: null,
    add_open:false,
    update_open:false,
    context_open:false,
    menuPosition: { x: 0, y: 0 },
    longPressTimer: null,
    toggleAddCategory(){
        this.add_open = !this.add_open;
        this.update_open = false;
    },
    toggleUpdateCategory(){
        this.update_open = !this.update_open;
        this.add_open = false;
    },
    toggleContext(categoryId, event){
        if (this.activeCategoryId === categoryId) {
            this.context_open = !this.context_open;
        } else {
            this.activeCategoryId = categoryId;
            this.context_open = true;
        }

        this.menuPosition = {
            x: event.clientX,
            y: event.clientY
        };
    },
    handleClickAway(event) {
        if (this.context_open && !event.target.closest('.position-relative')) {
            this.context_open = false;
        }
    },
    handleMouseDown(event, categoryId) {
        this.longPressTimer = setTimeout(() => {
            this.toggleContext(categoryId, event);
        }, 500);
    },
    handleMouseUp() {
        clearTimeout(this.longPressTimer);
    }
}" x-on:click.away="handleClickAway($event)">
    <!-- Categories list -->
    @foreach($categories as $category)
        <li class="p-0 position-relative">
            <a href="#" class="list-group-item-action rounded d-flex justify-content-between align-items-center p-1"
                x-on:contextmenu.prevent="toggleContext('{{ $category->id }}', $event)"
                x-on:mousedown="handleMouseDown($event, '{{ $category->id }}')"
                x-on:mouseup="handleMouseUp()"
            >
                <div class="d-flex align-items-center gap-2">
                    <i class="bi bi-circle-fill" style="color: {{ $category->hex_color }}"></i>
                    <small>{{ $category->name }}</small>
                </div>
            </a>
        </li>
    @endforeach

    <!-- Context menu outside of the loop -->
    <div class="position-absolute card card-body border-0 shadow p-1 z-1"
        x-cloak
        x-show="context_open"
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 transform scale-95"
        x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-95"
        x-bind:style="{ top: menuPosition.y + 'px', left: menuPosition.x + 'px'}"
    >
        <div class="list-group border-0">
            <a type="button" class="list-group-item-action rounded d-flex justify-content-between align-items-center p-1" x-on:click="$dispatch('update-category', {id : activeCategoryId}), context_open = false">
                <small class="text-warning d-flex gap-1">
                    <i class="bi bi-pencil"></i>
                    Edit
                </small>
            </a>
            <a type="button" class="list-group-item-action rounded d-flex justify-content-between align-items-center p-1" wire:click="deleteCategory(activeCategoryId), context_open = false">
                <small class="text-danger d-flex gap-1">
                    <i class="bi bi-trash"></i>
                    Delete
                </small>
            </a>
        </div>
    </div>

    <!-- Add Category button -->
    <li class="p-0">
        <a type="button" class="list-group-item-action rounded d-flex justify-content-between align-items-center p-1" x-on:click="toggleAddCategory()">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-plus-lg fw-bold"></i>
                <small>Add Category</small>
            </div>
        </a>
    </li>

    <!-- Add Category Livewire component -->
    <li class="p-0 mt-1" 
        x-cloak x-show="add_open"
        x-on:add-close="add_open = false" 
        x-transition>
        <livewire:categories.add-categories />
    </li>

    <!-- Update Category Livewire component -->
    <li class="p-0 mt-1"
        x-cloak 
        x-on:update-open="update_open = true, add_open = false" 
        x-on:update-close="update_open = false"
        x-show="update_open" 
        x-transition
    >
        <livewire:categories.update-categories x-transition/>
    </li>
</ul>
