<head>
    @vite('resources/css/admin/layouts/offcanvas.css')
</head>

<body>
    <div class="sticky-top">
        <div class="navbar-head">
            <div style="width: 80%;">
                <div class="logo">
                    <img src="{{ asset('profille/Profile Image.png') }}" class="img-fluid logo-img" alt="...">
                    <p class="logo-text">My Portfolio</p>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: center;">
                <div>
                    <div style="display: flex; gap: 1em; align-items: center; justify-content: flex-end;">
                        <button type="button" class="btn position-relative" style="max-height: 3rem;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-bell-fill" viewBox="0 0 16 16">
                                <path
                                    d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2m.995-14.901a1 1 0 1 0-1.99 0A5 5 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901" />
                            </svg>
                            <span
                                class="position-absolute top-0 start-100 translate-middle p-2 bg-danger border border-light rounded-circle">
                                <span class="visually-hidden">New alerts</span>
                            </span>
                        </button>
                        <div class="dropdown" style="display: flex; align-items: center; gap: 1em;">
                            <button type="button" data-bs-toggle="dropdown" aria-expanded="false"
                                style="background-color: transparent; border: none; padding: 0;">
                                <img src="{{ asset('profille/my-img.jpeg') }}" class="img-fluid profile-img"
                                    alt="...">
                            </button>
                            <p class="profile-text"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <nav class="navbar bg-body-tertiary">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form>
                    <div class="offcanvas offcanvas-start half-screen" tabindex="-1" id="offcanvasNavbar"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header" style="background-color: #213448; display: inline-block;">
                            <div>
                                <div style="display: flex; justify-content: center;">
                                    <div class="icon-card mt-3 mb-3">
                                        <div class="icon-bg">
                                            <div class="icon-head mt-3"></div>
                                            <div class="icon-body mt-2"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-2" style="display: flex; justify-content: center;">
                                <h3 style="color: white;" class="offcanvas-title" id="offcanvasNavbarLabel">Admin</h3>
                            </div>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <div style="color: white;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            fill="currentColor" class="bi bi-house-check-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293z" />
                                            <path
                                                d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293z" />
                                            <path
                                                d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514" />
                                        </svg>
                                    </div>
                                    <div class="nav-link">
                                        <a class="link {{ Request::is('admin') ? 'active' : '' }}"
                                            href="{{ route('admin.dashboard') }}">Home</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div style="color: #FFCC00;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2" />
                                        </svg>
                                    </div>
                                    <div class="nav-link">
                                        <a class="link {{ Request::is('admin/manage-projects') ? 'active' : '' }}"
                                            href="{{ route('admin.projects') }}">Projects</a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div style="color: #A4CCD9;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-chat-left-text-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H4.414a1 1 0 0 0-.707.293L.854 15.146A.5.5 0 0 1 0 14.793zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1z" />
                                        </svg>
                                    </div>
                                    <div class="nav-link">
                                        <a class="link {{ Request::is('admin/manage-reviews') ? 'active' : '' }}"
                                            href="{{ route('admin.reviews') }}">Reviews</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</body>
