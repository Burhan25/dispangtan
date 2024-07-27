@extends('layouts.dokter.dashboard')
@section('title', 'Create Blog')
@section('content')
    <h4>Create Blog</h4>
    <form action="{{ route('dokter.blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Judul:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Deskripsi:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="image">Foto Berita:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Kirim</button>
    </form>
@endsection
