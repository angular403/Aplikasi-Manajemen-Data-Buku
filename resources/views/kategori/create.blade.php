@include('layout.header')
<h3 class="judul-h3">Tambah Kategori</h3>

<form action="{{route('kategori.store')}}" method="post">
    @csrf
    <div class="mb-4">
        <label for="" class="block font-bold mb-2">Nama Kategori : </label>
        <input type="text" autocomplete="off" name="nama_kategori" id="" placeholder="Masukkan Nama Kategori" class="w-full px-3 py-2 border border-gray-300 rounded">
    </div>

    <button type="submit" class="tombol-biru">Submit</button>
</form>

@include('layout.footer')
