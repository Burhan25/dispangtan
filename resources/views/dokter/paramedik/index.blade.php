@section('title', 'Table Paramedik')
@extends('layouts.dokter.dashboard')
@section('content')
    <h4>Menejemen Paramedik</h4>
    <div class="container mt-5">
        <a href="{{ route('dokter.paramedik.create') }}" class="btn btn-primary mb-3">Tambah Kecamatan</a>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <table class="table table-bordered">
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
                            <form action="{{ route('dokter.paramedik.delete',$kecamatan->id) }}" method="POST">
                                <a class="btn btn-primary" href="{{ route('dokter.paramedik.edit',$kecamatan->id) }}">Edit</a>

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
</body>
</html>
@endsection
