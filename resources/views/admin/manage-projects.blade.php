<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin | Manage Projects</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    @vite('resources/css/admin/manage-projects.css')
    @vite('resources/js/admin/manage-projects.js')
</head>

<body>

    <head>
        @include('admin.layouts.offcanvas')
    </head>

    <body>
        {{-- Modal --}}
        <div class="mt-5 d-flex justify-content-end me-4">
            <button type="button" class="btn btn-success ps-5 pe-5" data-bs-toggle="modal"
                data-bs-target="#addProjectModal">Add New Project</button>
        </div>

        <div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addUserModalLabel">Add New Project</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addProjectForm">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Project Description</label>
                                <input type="text" class="form-control" id="description" name="description">
                            </div>
                            <div class="mb-3">
                                <label for="project_link" class="form-label">Project Link</label>
                                <input type="text" class="form-control" id="project_link" name="project_link">
                            </div>
                            <div class="mb-3">
                                <label for="github_link" class="form-label">Github Link</label>
                                <input type="text" class="form-control" id="github_link" name="github_link">
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Add Project</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="container mt-1">
            <div class="text-center py-4 px-3 rounded shadow-sm">
                <h2 class="mb-0 fw-bold display-5" style="letter-spacing: 1px; color: white">Customers</h2>
            </div>
        </div>

        <div class="mx-4 mt-5">
            <table class="table table-hover border shadow rounded">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Image</th>
                        <th scope="col">Project Description</th>
                        <th scope="col">Project Link</th>
                        <th scope="col">Github Link</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col" style="display: flex; justify-content: center;">Actions</th>
                    </tr>
                </thead>
                <tbody id="projects-table-body">
                    <!-- Projects will be loaded dynamically here -->
                </tbody>
            </table>

        </div>

    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Routes --}}
    <script>
        // Project Routes and Asset Paths
        const projectAddRoute = "{{ route('projects.add') }}";
        const projectViewRoute = "{{ route('projects.view') }}";
        const projectImageBase = "{{ asset('images/projects') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
</body>

</html>
