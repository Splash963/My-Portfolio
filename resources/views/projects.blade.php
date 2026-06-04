<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    @vite('resources/css/projects.css')
</head>

<body>

    <head>
        @include('layouts.navbar')
    </head>

    <body>
        <div class="container mt-5 mb-5 pb-5">
            <h1 class="text-center mb-5 title">My Work</h1>

            <p class="text-center lead mb-5 mx-auto" style="max-width: 800px;">
                Here are a few design projects I've worked on recently. Want to see more? <a
                    href="{{ route('contact') }}"
                    class="text-accent text-decoration-none border-bottom border-accent">Email me</a>.
            </p>

            <div class="row g-4">
                @forelse($projects as $project)
                    <div class="col-md-6 col-lg-4">
                        <div class="card project-card border-0 h-100 bg-dark-card shadow">
                            <div class="position-relative overflow-hidden project-img-wrapper">
                                @if ($project->image_path)
                                    <img src="{{ asset('storage/' . $project->image_path) }}" class="card-img-top"
                                        alt="{{ $project->title }}">
                                @else
                                    <img src="{{ asset('images/project1.jpg') }}" class="card-img-top"
                                        alt="Placeholder">
                                @endif
                                <div class="project-overlay d-flex align-items-center justify-content-center">
                                    @if ($project->link)
                                        <a href="{{ $project->link }}" target="_blank"
                                            class="btn btn-outline-accent rounded-circle icon-btn"><i
                                                class="fa-solid fa-link"></i></a>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h4 class="card-title text-white fw-bold mt-3 mb-2">{{ $project->title }}</h4>
                                <p class="card-text text-muted mb-4">{{ $project->description }}</p>
                                @if ($project->link)
                                    <a href="{{ $project->link }}" target="_blank"
                                        class="btn btn-accent px-4 py-2 rounded-bill shadow-sm w-100 fw-bold">View Case
                                        Study</a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted">
                        <p>No projects found. Please check back later!</p>
                    </div>
                @endforelse
            </div>

            <div class="text-center mt-5 pt-4">
                <a href="https://github.com/Splash963" target="_blank"
                    class="btn btn-outline-accent btn-lg px-5 py-3 rounded-pill shadow fw-bold">
                    <i class="fa-brands fa-github me-2"></i> View More on GitHub
                </a>
            </div>
        </div>
    </body>
    <footer>
        @include('layouts.footer')
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
