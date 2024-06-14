@extends('layouts.admin.dashboard')
@section('title', 'Table Paramedik')

@section('content')
    <div class="container mt-5">
        <h4>Manajemen Kecamatan</h4>
        <a href="{{ route('admin.paramedik.create') }}" class="btn btn-primary mb-3">Tambah Kecamatan</a>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table border">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kecamatan</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatans as $kecamatan)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $kecamatan->nama }}</td>
                        <td>
                            <form action="{{ route('admin.paramedik.delete', $kecamatan->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('admin.paramedik.edit', $kecamatan->id) }}">Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container mt-5">
        <h4>Daftar Paramedik</h4>
        <a href="{{ route('admin.paramedik.create') }}" class="btn btn-primary mb-3">Tambah Paramedik</a>

        <table class="table border">
            <thead>
                <tr>
                    <th>Foto</th>
                    <th>Nama</th>
                    <th>Spesialis</th>
                    <th>Domisili</th>
                    <th>Nomor STR</th>
                    <th>Nomor WhatsApp</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dokterParamediks as $dokterParamedik)
                    <tr>
                        <td>
                            @if ($dokterParamedik->foto)
                                <img src="{{ asset('images/' . $dokterParamedik->foto) }}" alt="Foto Paramedik"
                                    width="50">
                            @else
                                Tidak ada foto
                            @endif
                        </td>
                        <td>{{ $dokterParamedik->nama }}</td>
                        <td>{{ $dokterParamedik->spesialis }}</td>
                        <td>{{ $dokterParamedik->domisili }}</td>
                        <td>{{ $dokterParamedik->nomor_str }}</td>
                        <td>{{ $dokterParamedik->nomor_whatsapp }}</td>
                        <td>
                            <a href="{{ route('admin.paramedik.edit', $dokterParamedik->id) }}"
                                class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.paramedik.destroy', $dokterParamedik->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus paramedik ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
