@extends('admin.layouts.app')

@section('title', 'Projects Management')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-white">Projects Management</h2>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Add New Project</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card bg-dark text-white" style="border: none; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3);">
        <div class="card-body" style="background-color: #101a20;">
            <table class="table table-dark table-hover" style="background-color: transparent;">
                <thead>
                    <tr>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">ID</th>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">Image</th>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">Title</th>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($projects as $project)
                    <tr>
                        <td style="background-color: #101a20; color: #bfc9d1; border-color: #333;">{{ $project->id }}</td>
                        <td style="background-color: #101a20; border-color: #333;">
                            @if($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                            @else
                                <span class="text-muted">N/A</span>
                            @endif
                        </td>
                        <td style="background-color: #101a20; color: #bfc9d1; border-color: #333;">{{ $project->title }}</td>
                        <td style="background-color: #101a20; border-color: #333;">
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-sm btn-info">Edit</a>
                            <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="text-center" style="background-color: #101a20; color: #bfc9d1; border-color: #333;">No projects found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
