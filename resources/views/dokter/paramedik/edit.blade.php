@extends('layouts.dokter.dashboard')

@section('title', 'Edit Panduan')

@section('content')
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

    <form action="{{ route('dokter.paramedik.update', $kecamatan->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama Kecamatan</label>
            <input type="text" name="nama" class="form-control" value="{{ $kecamatan->nama }}"
                placeholder="Nama Kecamatan">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </body>

    </html>
@endsection
