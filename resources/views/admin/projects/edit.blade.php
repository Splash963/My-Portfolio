@extends('admin.layouts.offcanvas')

@section('content')
<div class="container-fluid py-4" style="margin-left: 280px; width: calc(100% - 280px);">
    <h2 class="text-white mb-4">Edit Project: {{ $project->title }}</h2>

    <div class="card bg-dark text-white">
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label">Project Title</label>
                    <input type="text" name="title" class="form-control bg-secondary text-white border-0" value="{{ $project->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea name="description" class="form-control bg-secondary text-white border-0" rows="4" required>{{ $project->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Project Image</label>
                    <input type="file" name="image" class="form-control bg-secondary text-white border-0" accept="image/*">
                    @if($project->image_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="Current Image" style="height: 100px;">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Project Link (Optional)</label>
                    <input type="url" name="link" class="form-control bg-secondary text-white border-0" value="{{ $project->link }}">
                </div>
                <button type="submit" class="btn btn-success">Update Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
