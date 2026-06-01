@extends('admin.layouts.offcanvas')

@section('content')
<div class="container-fluid py-4" style="margin-left: 280px; width: calc(100% - 280px);">
    <h2 class="text-white mb-4">Add New Project</h2>

    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Project Title</label>
                    <input type="text" name="title" class="form-control bg-secondary text-white border-0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control bg-secondary text-white border-0" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Project Image</label>
                    <input type="file" name="image" class="form-control bg-secondary text-white border-0" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Project Link (Optional)</label>
                    <input type="url" name="link" class="form-control bg-secondary text-white border-0">
                </div>
                <button type="submit" class="btn btn-success">Save Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
