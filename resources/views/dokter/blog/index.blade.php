@section('title', 'Table blog')
@extends('layouts.dokter.dashboard')
@section('content')
    <h4>Manajemen Blog</h4>
    <a href="{{ route('dokter.blog.create') }}" class="btn btn-primary">Tambah Halaman Berita</a>
    <table class="table">
        <thead class="table-secondary">
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Foto Berita</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $blog->title }}</td>
                    <td>
                        <div class="description" style="max-height: 50px; overflow: hidden;">
                            {{ Str::limit($blog->description, 100) }}
                        </div>
                        @if (strlen($blog->description) > 100)
                            <a href="#" class="read-more">Read more</a>
                        @endif
                    </td>
                    <td><img src="{{ Storage::url($blog->image) }}" width="100"></td>
                    <td>
                        <a href="{{ route('dokter.blog.edit', $blog->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('dokter.blog.delete', $blog->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const readMoreLinks = document.querySelectorAll('.read-more');

            readMoreLinks.forEach(function (link) {
                link.addEventListener('click', function (event) {
                    event.preventDefault();
                    const description = this.previousElementSibling;
                    if (description.style.maxHeight) {
                        description.style.maxHeight = null;
                        this.textContent = 'Read more';
                    } else {
                        description.style.maxHeight = description.scrollHeight + 'px';
                        this.textContent = 'Read less';
                    }
                });
            });
        });
    </script>
@endsection
