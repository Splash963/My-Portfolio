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
                        <th scope="col">Project Image</th>
                        <th scope="col">Project Link</th>
                        <th scope="col">Created At</th>
                        <th scope="col">Updated At</th>
                        <th scope="col" style="display: flex; justify-content: center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="table-dark">
                        <th scope="row"></th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td style="display: flex; justify-content: center; gap: 2rem;">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateUserModal"
                                data-bs-id="" data-bs-name="" data-bs-address="" data-bs-phone_number=""
                                data-bs-whatsapp_number=""><svg xmlns="http://www.w3.org/2000/svg" width="50"
                                    height="16" fill="currentColor" class="bi bi-pencil-square"
                                    viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </button>
                            <form action="" style="display: inline;" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this user?');">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>

        </div>

    </body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    {{-- Routes --}}
    <script>
        // Add Project Route
        const projectAddRoute = "{{ route('projects.add') }}";
        const csrfToken = "{{ csrf_token() }}";
    </script>
</body>

</html>
