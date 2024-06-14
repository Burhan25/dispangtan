@extends('layouts.admin.dashboard')
@section('title', 'Edit Data')

@section('content')
    <div class="container mt-5">
        <!-- Edit Kecamatan Section -->
        <h4>Edit Kecamatan</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.paramedik.update', $kecamatan->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama Kecamatan</label>
                <input type="text" name="nama" class="form-control" value="{{ $kecamatan->nama }}" placeholder="Nama Kecamatan">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <div class="container mt-5">
        <!-- Edit Paramedik Section -->
        <h4>Edit Paramedik</h4>

        <form action="{{ route('admin.dokter-paramedik.update', $dokterParamedik->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" class="form-control" name="foto">
                @if ($dokterParamedik->foto)
                    <img src="{{ asset('images/' . $dokterParamedik->foto) }}" alt="Foto Paramedik" width="100">
                @endif
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" name="nama" value="{{ $dokterParamedik->nama }}" required>
            </div>
            <div class="form-group">
                <label for="spesialis">Spesialis</label>
                <input type="text" class="form-control" name="spesialis" value="{{ $dokterParamedik->spesialis }}" required>
            </div>
            <div class="form-group">
                <label for="domisili">Domisili</label>
                <input type="text" class="form-control" name="domisili" value="{{ $dokterParamedik->domisili }}" required>
            </div>
            <div class="form-group">
                <label for="nomor_str">Nomor STR</label>
                <input type="text" class="form-control" name="nomor_str" value="{{ $dokterParamedik->nomor_str }}">
            </div>
            <div class="form-group">
                <label for="nomor_whatsapp">Nomor WhatsApp</label>
                <input type="text" class="form-control" name="nomor_whatsapp" value="{{ $dokterParamedik->nomor_whatsapp }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
