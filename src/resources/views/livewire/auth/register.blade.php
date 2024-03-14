<main class="d-flex justify-content-center align-items-center py-3 py-md-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="fs-2 fs-md-3 fw-normal text-secondary m-0">ACME</h1>
                    <a class="btn btn-link text-secondary text-decoration-none">Back to home</a>
                </div>
            </div>

            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-4">
                <div class="card border-0">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <a href="#!">
                                <img src="{{ asset('images/dummy_logo.png') }}" alt="BootstrapBrain Logo" width="175"
                                    height="120">
                            </a>
                        </div>
                        <h2 class="fs-6 fw-normal text-center text-secondary mb-4">Create an account</h2>
                        <form wire:submit="register">
                            <div class="row gy-2 overflow-hidden">
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input id="username" name="form.username" type="text" class="form-control"
                                            placeholder="John Doe" wire:model="form.username" />
                                        @error('form.username')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" name="form.email" type="email" class="form-control"
                                            placeholder="example@email.com" wire:model="form.email" />
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
                                                wire:model.live="form.password" />
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
                                                wire:model="form.password_confirmation" />
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
                                    <p class="m-0 text-secondary text-center">
                                        Already have an account? 
                                        <a href="{{ route('login') }}" class="link-primary text-decoration-none" wire:navigate>
                                            Sign in
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>