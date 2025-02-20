<!DOCTYPE html>
<html>
<head>
 
    <title>Item List</title>
</head>
<body>
    <h1>Items</h1>
    <!-- Menampilkan pesan sukses jika berhasil masuk session -->
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!-- Tombol untuk menambahkan item baru -->
    <a href="{{ route('items.create') }}">Add Item</a>
    <ul>
        <!-- Loop untuk menampilkan semua item -->
        @foreach ($items as $item)
        <li>
            <!-- Menampilkan nama item -->
            {{ $item->name}} -

            <!-- Link untuk mengedit item -->
            <a href="{{ route('items.edit', $item) }}">Edit</a>
            <!-- Form untuk menghapus item -->
            <form action="{{ route('items.destroy', $item) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')<!-- Menggunakan metode DELETE untuk menghapus item -->
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</body>
</html>