@section('title', 'Table blog')
@extends('layouts.admin.dashboard')
@section('content')
    <h4>Manajemen Blog</h4>
    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Create New Blog</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td><img src="{{ Storage::url($blog->image) }}" width="100"></td>
                     <td>
                        <a href="{{ route('admin.blog.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('admin.blog.delete', $blog->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                   
                    
                   
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
