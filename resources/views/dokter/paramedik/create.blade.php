@extends('layouts.dokter.dashboard')

@section('title', 'Create Panduan')

@section('content')
<h4>Tambah Kecamatan</h4>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('dokter.paramedik.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Input Kecamatan</label>
        <input type="text" name="nama" class="form-control" placeholder="Nama Kecamatan">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
</body>
</html>
@endsection