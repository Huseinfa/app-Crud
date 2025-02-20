<!DOCTYPE html>
<html>
<head>
 
    <title>Edit Item</title>
</head>
<body>
    <h1>Edit Item</h1>

     <!-- Form untuk mengedit item -->
    <form action="{{ route('items.update', $item) }}" method="POST">
        @csrf
        @method('PUT')<!-- Menggunakan metode PUT untuk update data -->

        <!-- Input nama item -->
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $item->name }}" required>
        <br>
        <!-- Input deskripsi item -->
        <label for="description">Description</label>
        <textarea name="description" required>{{ $item->description}}</textarea>
        <br>
        <!-- Tombol simpan perubahan -->
        <button type="submit">Update Item</button>
    </form>
    <!-- Link kembali ke daftar item -->
    <a href="{{ route('items.index')}}">Back to List</a>
</body>
</html>