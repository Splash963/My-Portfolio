@extends('admin.layouts.app')

@section('title', 'Edit Project')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4" style="color: #BFC9D1;">Edit Project: {{ $project->title }}</h2>

    <div class="card" style="border: none; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3); background-color: #101a20;">
        <div class="card-body">
            <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="form-label" style="color: #bfc9d1;">Project Title</label>
                    <input type="text" name="title" class="form-control" style="background-color: #213448; color: #fff; border: 1px solid #333;" value="{{ $project->title }}" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" style="color: #bfc9d1;">Description</label>
                    <textarea name="description" class="form-control" style="background-color: #213448; color: #fff; border: 1px solid #333;" rows="4" required>{{ $project->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" style="color: #bfc9d1;">Project Image</label>
                    <input type="file" name="image" class="form-control" style="background-color: #213448; color: #fff; border: 1px solid #333;" accept="image/*">
                    @if($project->image_path)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $project->image_path) }}" alt="Current Image" style="height: 100px; border-radius: 5px;">
                        </div>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label" style="color: #bfc9d1;">Project Link (Optional)</label>
                    <input type="url" name="link" class="form-control" style="background-color: #213448; color: #fff; border: 1px solid #333;" value="{{ $project->link }}">
                </div>
                <button type="submit" class="btn btn-success">Update Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
