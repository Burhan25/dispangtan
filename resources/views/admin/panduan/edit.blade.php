<!DOCTYPE html>
<html>
<head>
    <title>Edit Panduan</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Edit Panduan</h2>
    <form action="{{ route('panduans.update', $panduan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $panduan->title }}" required>
        </div>
        <div class="form-group">
            <label for="file">Upload PDF:</label>
            <input type="file" class="form-control" id="file" name="file" accept="application/pdf">
            <small>Current file: <a href="{{ asset('storage/' . $panduan->file) }}" target="_blank">View PDF</a></small>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
</body>
</html>
