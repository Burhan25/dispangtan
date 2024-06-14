@extends('layouts.admin.dashboard')
@section('title', 'Create Data')

@section('content')
<div class="container mt-5">
    <!-- Tambah Kecamatan Section -->
    <h1>Tambah Kecamatan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.paramedik.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Input Kecamatan</label>
            <input type="text" name="nama" class="form-control" placeholder="Nama Kecamatan">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<div class="container mt-5">
    <!-- Tambah Paramedik Section -->
    <h2>Tambah Paramedik</h2>

    <form action="{{ route('admin.paramedik.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="form-group">
            <label for="spesialis">Spesialis</label>
            <input type="text" class="form-control" name="spesialis" required>
        </div>
        <div class="form-group">
            <label for="domisili">Domisili</label>
            <input type="text" class="form-control" name="domisili" required>
        </div>
        <div class="form-group">
            <label for="nomor_str">Nomor STR</label>
            <input type="text" class="form-control" name="nomor_str">
        </div>
        <div class="form-group">
            <label for="nomor_whatsapp">Nomor WhatsApp</label>
            <input type="text" class="form-control" name="nomor_whatsapp" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
