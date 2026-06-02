@extends('admin.layouts.app')

@section('title', 'Add New Project')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4" style="color: #BFC9D1;">Add New Project</h2>

    <div class="card" style="border: none; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3); background-color: #101a20;">
        <div class="card-body">
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="form-label" style="color: #bfc9d1;">Project Title</label>
                    <input type="text" name="title" class="form-control" style="background-color: #213448; color: #fff; border: 1px solid #333;" required>
                </div>
                <div class="mb-3">
                    <label class="form-label" style="color: #bfc9d1;">Description</label>
                    <textarea name="description" class="form-control" style="background-color: #213448; color: #fff; border: 1px solid #333;" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" style="color: #bfc9d1;">Project Image</label>
                    <input type="file" name="image" class="form-control" style="background-color: #213448; color: #fff; border: 1px solid #333;" accept="image/*">
                </div>
                <div class="mb-3">
                    <label class="form-label" style="color: #bfc9d1;">Project Link (Optional)</label>
                    <input type="url" name="link" class="form-control" style="background-color: #213448; color: #fff; border: 1px solid #333;">
                </div>
                <button type="submit" class="btn btn-success">Save Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
