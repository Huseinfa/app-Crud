<!DOCTYPE html>
<html>
<head>
 
    <title>Item List</title>
</head>
<body>
    <h1>Items</h1>

    <!--Menunjukkan sudah sukses berjalan-->
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <!--Menambahkan item baru-->
    <a href="{{ route('items.create') }}">Add Item</a>
    <ul>
        @foreach ($items as $item)
        <li>
            <!--Menampilkan nama item-->
            {{ $item->name}} -

            <!--Link untuk mengedit item-->
            <a href="{{ route('items.edit', $item) }}">Edit</a>

            <!--Form untuk menghapus item-->
            <form action="{{ route('items.destroy', $item) }}" method="POST" style="display: inline">
                @csrf
                @method('DELETE')<!--Mengubah metode form menjadi DELETE-->
                <button type="submit">Delete</button><!-- Tombol untuk menghapus item -->
            </form>
        </li>
        @endforeach
    </ul>
    
</body>
</html>