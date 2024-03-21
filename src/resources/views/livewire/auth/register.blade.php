<div class="card bg-body border-0">
    <div class="card-body p-3 p-md-4 p-xl-5">
        <div class="text-center mb-3">
            <a href="#!">
                <img src="{{ asset('images/dummy_logo.png') }}" alt="BootstrapBrain Logo" width="175"
                    height="120">
            </a>
        </div>
        <h2 class="fs-6 fw-normal text-center text-body-secondary mb-4">Create an account</h2>
        <form wire:submit="register">
            <div class="row gy-2 overflow-hidden">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input id="username" name="form.username" type="text" class="form-control"
                            placeholder="John Doe" wire:model="form.username" autocomplete="username"/>
                            
                        @error('form.username')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input id="email" name="form.email" type="email" class="form-control"
                            placeholder="example@email.com" wire:model="form.email" autocomplete="off"/>

                        @error('form.email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group input-group-end" x-data="{
                            isPasswordVisible: false
                        }">
                            <input id="password" name="password" type="password" class="form-control"
                                x-bind:type="isPasswordVisible ? 'text' : 'password'"
                                wire:model.live="form.password" autocomplete="new-password"/>
                            <span class="input-group-text">
                                <a type="button" x-on:click="isPasswordVisible = !isPasswordVisible">
                                    <i
                                        x-bind:class="isPasswordVisible ? 'bi bi-eye' : 'bi bi-eye-slash'"></i>
                                </a>
                            </span> 
                        </div>

                        @error('form.password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <livewire:auth.partials.password-strength 
                        wire:model="form.password"
                    />
                </div>
                <div class="col-12">
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <div class="input-group input-group-end" x-data="{
                            isPasswordVisible: false
                        }">
                            <input id="password_confirmation" name="password" type="password" class="form-control"
                                x-bind:type="isPasswordVisible ? 'text' : 'password'"
                                wire:model="form.password_confirmation" autocomplete="new-password"/>
                            <span class="input-group-text">
                                <a type="button" x-on:click="isPasswordVisible = !isPasswordVisible">
                                    <i
                                        x-bind:class="isPasswordVisible ? 'bi bi-eye' : 'bi bi-eye-slash'"></i>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="d-grid my-3">
                        <button class="btn btn-primary btn-lg" type="submit"
                            wire:loading.attr="disabled" wire:target="register">
                            <span wire:loading wire:target="register"
                                class="spinner-border spinner-border-sm" role="status"
                                aria-hidden="true"></span>
                            Register
                        </button>
                    </div>
                </div>
                <div class="col-12">
                    <p class="m-0 text-body-secondary text-center">
                        Already have an account? 
                        <a href="{{ route('login') }}" class="link-primary text-decoration-none">
                            Sign in
                        </a>
                    </p>
                </div>
            </div>
        </form>
    </div>
</div>