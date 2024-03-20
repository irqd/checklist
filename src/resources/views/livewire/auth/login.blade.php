<main class="d-flex justify-content-center align-items-center py-3 py-md-5 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="fs-2 fs-md-3 fw-normal text-body-secondary m-0">ACME</h1>
                    <a type="button" class="theme-toggle rounded-circle">
                        <i class="bi bi-moon"></i>
                        <i class="bi bi-sun"></i>
                    </a>
                </div>
            </div>

            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-4 col-xxl-4 mt-5">
                <div class="card bg-body border-0">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="text-center mb-3">
                            <a type="button">
                                <img 
                                    src="{{ asset('images/dummy_logo.png') }}" 
                                    alt="BootstrapBrain Logo" 
                                    width="175"
                                    height="120"
                                >
                            </a>
                        </div>

                        @if($select_email)
                            <h2 class="fs-6 fw-bold text-center text-body-secondary mb-4">
                                Recent logins
                            </h2>

                            <ul class="list-group">
                                @foreach($recent_emails as $email)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <a href="#!" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center icon-link icon-link-hover"
                                            wire:click="toggleSelectEmail('{{ $email }}')">
                                            <div class="d-flex align-items-center gap-3">
                                                <img class="avatar" src="{{ asset('images/user-icon-female.png') }}" alt="User icon">
                                                <span>{{ $email }}</span>
                                            </div>
                                            <i class="bi bi-arrow-right" wire:loading.remove wire:target="toggleSelectEmail('{{ $email }}')"></i>
                                            
                                            <span 
                                                wire:loading 
                                                wire:target="toggleSelectEmail('{{ $email }}')"
                                                class="spinner-border spinner-border-sm" role="status" aria-hidden="true"
                                            ></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                            
                            <div class="d-grid my-3">
                                <button class="btn btn-link text-body-secondary" wire:click="toggleSelectEmail">
                                    Use another account
                                </button>
                            </div>
                        @else
                            <h2 class="fs-6 fw-bold text-center text-body-secondary mb-4 fw">
                                Sign in to your account
                            </h2>

                            <form wire:submit="login">
                                <div class="row gy-2 overflow-hidden">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" type="email" class="form-control"
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
                                                <input id="password" type="password" class="form-control"
                                                    x-bind:type="isPasswordVisible ? 'text' : 'password'"
                                                    wire:model="form.password" autocomplete="current-password"/>
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
                                    </div>

                                    <div class="col-12">
                                        <div class="d-flex gap-2 justify-content-between">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="remember" wire:model="form.remember">
                                                <label class="form-check-label text-body-secondary" for="remember">
                                                    Keep me logged in
                                                </label>
                                            </div>
                                            <a href="#!" class="link-primary text-decoration-none">Forgot password?</a>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid my-3">
                                            <button class="btn btn-primary btn-lg" type="submit"
                                                wire:loading.attr="disabled">
                                                <span wire:loading wire:target="login"
                                                    class="spinner-border spinner-border-sm" role="status"
                                                    aria-hidden="true"></span>
                                                Log in
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <p class="m-0 text-body-secondary text-center">
                                            Don't have an account? 
                                            <a href="{{ route('register') }}" class="link-primary text-decoration-none" wire:navigate>
                                                Sign up
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
