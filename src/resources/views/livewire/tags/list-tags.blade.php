<div class="d-flex-1 justify-content-start align-items-center mx-5 ps-1" x-data="{
    add_open:false,
    toggleAddCategory(){
        this.add_open = !this.add_open;
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
    @foreach($tags as $tag)
        <a type="button" class="btn btn-sm btn-default mb-1" style="
            --bs-btn-padding-y: 0.05rem; 
            --bs-btn-padding-x: 0.5rem; 
            --bs-btn-font-size: 0.8rem;
            background-color: {{ $tag->hex_color }};"
            x-bind:class="{ 'text-dark': isLight('{{ $tag->hex_color }}'), 'text-white': !isLight('{{ $tag->hex_color }}') }"
        >
            <small>{{ $tag->name }}</small>
        </a>
    @endforeach

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
