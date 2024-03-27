<form wire:submit="submit">
    <div class="d-flex flex-column justify-content-start align-items-end">
        <div class="d-flex">
            <input type="color" class="form-control form-control-sm form-control-color flex-none" title="Choose your color" wire:model="hex_color">
            <input type="text" class="form-control form-control-sm" wire:model="name"/>
            
        </div>
        @error('name') <small class="text-danger" style="font-size: 10px">{{ $message }}</small> @enderror
        <div>
            <button type="submit" class="btn btn-primary mt-1 d-flex" style="
            --bs-btn-padding-y: 0.05rem; 
            --bs-btn-padding-x: 0.5rem; 
            --bs-btn-font-size: 0.7rem;"
            >
                Add
            </button>
        </div>
    </div>    
</form>