@extends('admin.layouts.app')

@section('title', 'Reviews & Comments')

@section('content')
<div class="container-fluid py-4">
    <h2 class="mb-4" style="color: #BFC9D1;">Reviews & Comments Management</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card" style="border: none; box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.3); background-color: #101a20;">
        <div class="card-body">
            <table class="table table-dark table-hover" style="background-color: transparent;">
                <thead>
                    <tr>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">ID</th>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">Name</th>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">Email</th>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">Message</th>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">Status</th>
                        <th style="background-color: #101a20; color: #bfc9d1; border-bottom: 1px solid #333;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($comments as $comment)
                    <tr>
                        <td style="background-color: #101a20; color: #bfc9d1; border-color: #333;">{{ $comment->id }}</td>
                        <td style="background-color: #101a20; color: #bfc9d1; border-color: #333;">{{ $comment->name }}</td>
                        <td style="background-color: #101a20; color: #bfc9d1; border-color: #333;">{{ $comment->email }}</td>
                        <td style="background-color: #101a20; color: #bfc9d1; border-color: #333;">{{ Str::limit($comment->message, 50) }}</td>
                        <td style="background-color: #101a20; border-color: #333;">
                            @if($comment->is_approved)
                                <span class="badge bg-success">Approved</span>
                            @else
                                <span class="badge bg-warning text-dark">Pending</span>
                            @endif
                        </td>
                        <td style="background-color: #101a20; border-color: #333;">
                            @if(!$comment->is_approved)
                                <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-primary">Approve</button>
                                </form>
                            @endif
                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center" style="background-color: #101a20; color: #bfc9d1; border-color: #333;">No comments found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
