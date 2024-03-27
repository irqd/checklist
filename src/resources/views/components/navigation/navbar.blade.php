<nav class="navbar navbar-expand d-flex justify-content-between align-items-center px-2 border-bottom fixed-top" id="navbar">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <!-- search bar -->
    <form class="d-none d-sm-inline-block me-3 my-2 my-md-0 mw-100 position-relative">
        <div class="input-group input-group-suffix me-2">
            <input type="text" class="form-control form-control-sm" placeholder="Search..."/>
            <span class="input-group-text">
                <i class="bi bi-search"></i>
            </span>
        </div>
    </form>

    <div class="px-md-3">
        <ul class="navbar-nav d-flex align-items-center gap-2">
            <li class="nav-item">
                <x-miscellaneous.theme-toggler />
            </li>

            <li class="nav-item">
                <a class="nav-link link-body-emphasis position-relative" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
                    <i class="bi bi-envelope fs-6 fw-semibold text-muted"></i>
                    <span class="position-absolute end-25 start-75 translate-middle-x p-1 text-bg-danger border border-light rounded-circle">
                        <span class="animate-ping position-absolute h-100 w-100 rounded-circle bg-danger bg-opacity-75" style="top: 10%; right: 0"></span>
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link link-body-emphasis position-relative" href="#">
                    <i class="bi bi-bell fs-6 fw-semibold text-muted"></i>
                    <span class="position-absolute end-25 start-25 bottom-75 translate-middle-x p-1 text-bg-danger border border-light rounded-circle">
                        <span class="animate-ping position-absolute h-100 w-100 rounded-circle bg-danger bg-opacity-75" style="top: 10%; right: 0"></span>
                        <span class="visually-hidden">New alerts</span>
                    </span>
                </a>
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
                                <h6 class="mb-0">Ivan Rey Deposoy</h6>
                                <small class="text-muted text-break">
                                    ivan.deposoy@atomitsoln.com
                                </small>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <a href="#" class="dropdown-item rounded-2">
                            <i class="bi bi-person fs-6 me-2"></i>
                            <span>Profile</span>
                        </a>
                        <a href="#" class="dropdown-item rounded-2">
                            <i class="bi bi-gear fs-6 me-2"></i>
                            <span>Settings</span>
                        </a>
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