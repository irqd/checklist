<nav class="navbar navbar-expand d-flex justify-content-between align-items-center px-2 border-bottom fixed-top" id="navbar">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="px-md-3">
        <ul class="navbar-nav d-flex align-items-center gap-2">
            <li class="nav-item">
                <x-miscellaneous.theme-toggler />
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="nav-icon pe-md-0 d-flex align-items-center" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    <img src="{{ asset('images/profile.jpg') }}" class="avatar img-fluid rounded-circle" alt="">
                </a>
                <div class="dropdown-menu dropdown-menu-end border shadow p-3" style="width: 300px;">
                    <div class="d-flex justify-content-start align-items-center">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('images/profile.jpg') }}" class="avatar img
                            -fluid rounded-circle" alt="">
                            <div class="ms-2">
                                <h6 class="mb-0">{{ auth()->user()->username }}</h6>
                                <small class="text-muted text-break">
                                    {{ auth()->user()->email }}
                                </small>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-sm btn-default mt-3 w-100" x-data="{
                        logout() {
                            axios.post('/logout')
                            .then(() => {
                                window.location.href = '/';
                            })
                            .catch(error => {
                                console.error(error);
                            });
                        }
                    }" x-on:click="logout()">
                        <i class="bi bi-box-arrow-right me-2"></i>
                        <span>Sign out</span>
                    </button>
                </div>
            </li>
        </ul>
    </div>
</nav>