@section('title', 'Table Panduan')
@extends('layouts.admin.dashboard')
@section('content')
    <h1>Table Management Panduan</h1>
@endsection

<!DOCTYPE html>
<html>
<head>
  <title>Panduan Management</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">

  <h2>Panduan List</h2>
  <a href="{{ route('panduan') }}" class="btn btn-success">Create New Panduan</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Title</th>
        <th>PDF</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($panduans as $panduan)
        <tr>
          <td>{{ $panduan->title }}</td>
          <td><a href="{{ asset('storage/' . $panduan->file) }}" target="_blank">View PDF</a></td>
          <td>
            <a href="{{ route('panduans.edit', $panduan->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('panduans.destroy', $panduan->id) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <hr>  <h2>Create Panduan</h2>
  <form action="{{ route('panduans.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
      <label for="title">Title:</label>
      <input type="text" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group">
      <label for="file">Upload PDF:</label>
      <input type="file" class="form-control" id="file" name="file" accept="application/pdf" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
</body>
</html>
