<div class="d-flex-1 justify-content-start align-items-center mx-5 ps-1" x-data="{
    activeTagId: null,
    add_open:false,
    context_open:false,
    menuPosition: { x: 0, y: 0 },
    longPressTimer: null,
    toggleAddCategory(){
        this.add_open = !this.add_open;
    },
    toggleContext(tagId){
        if (this.activeTagId === tagId) {
            this.context_open = !this.context_open;
        } else {
            this.activeTagId = tagId;
            this.context_open = true;
        }

        this.menuPosition = {
            x: event.clientX > 110 ? event.clientX - 120 : event.clientX,
            y: event.clientY
        };
    },
    handleClickAway(event) {
        if (this.context_open && !event.target.closest('.position-relative')) {
            this.context_open = false;
        }
    },
    handleMouseDown(event, tagId) {
        this.longPressTimer = setTimeout(() => {
            this.toggleContext(tagId);
        }, 500);
    },
    handleMouseUp() {
        clearTimeout(this.longPressTimer);
    },
    isLight(hex_color) {
        hex_color = hex_color.replace('#', '');
        var r = parseInt(hex_color.substring(0,2),16);
        var g = parseInt(hex_color.substring(2,4),16);
        var b = parseInt(hex_color.substring(4,6),16);
        var brightness = ((r * 299) + (g * 587) + (b * 114)) / 1000;
        return brightness > 155;
    }
}">
    <div class="position-relative" x-on:click.away="handleClickAway($event)">
        @foreach($tags as $tag)
            <a type="button" class="btn btn-sm btn-default mb-1" style="
                --bs-btn-padding-y: 0.05rem; 
                --bs-btn-padding-x: 0.5rem; 
                --bs-btn-font-size: 0.8rem;
                background-color: {{ $tag->hex_color }};"
                x-bind:class="{ 'text-dark': isLight('{{ $tag->hex_color }}'), 'text-white': !isLight('{{ $tag->hex_color }}') }"
                x-on:contextmenu.prevent="toggleContext('{{ $tag->id }}')"
                x-on:mousedown="handleMouseDown($event, '{{ $tag->id }}')"
                x-on:mouseup="handleMouseUp()"
            >
                <small>{{ $tag->name }}</small>
            </a>

            <div class="position-absolute card card-body border-0 shadow p-1 z-1"
                x-cloak
                x-show="context_open && activeTagId === '{{ $tag->id }}'"
                x-transition:enter="transition ease-out duration-100"
                x-transition:enter-start="opacity-0 transform scale-95"
                x-transition:enter-end="opacity-100 transform scale-100"
                x-transition:leave="transition ease-in duration-75"
                x-transition:leave-start="opacity-100 transform scale-100"
                x-transition:leave-end="opacity-0 transform scale-95"
                x-bind:style="{ left: menuPosition.x + 'px' }"
                style="top: 12px;"
            >
                <div class="list-group border-0">
                    <a type="button" class="list-group-item-action rounded d-flex justify-content-between align-items-center p-1" x-on:click="$dispatch('update-category', {id : {{ $tag->id }}}), toggleContext()">
                        <small class="text-warning">
                            <i class="bi bi-pencil"></i>
                            Edit
                        </small>
                    </a>
                    <a type="button" class="list-group-item-action rounded d-flex justify-content-between align-items-center p-1" wire:click="deleteCategory({{ $tag->id }})">
                        <small class="text-danger">
                            <i class="bi bi-trash"></i>
                            Delete
                        </small>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
    
    <a type="button" class="btn btn-sm btn-default mb-1" style="
        --bs-btn-padding-y: 0.05rem; 
        --bs-btn-padding-x: 0.5rem; 
        --bs-btn-font-size: 0.8rem;"
        x-on:click.prevent="toggleAddCategory()"
    >
        <div class="d-flex align-items-center gap-2">
            <i class="bi bi-plus-lg fw-bold"></i>
            <small>Add Tag</small>
        </div>
    </a>

    <div x-cloak x-show="add_open" x-transition>
        <livewire:tags.add-tags />
    </div>
</div>
