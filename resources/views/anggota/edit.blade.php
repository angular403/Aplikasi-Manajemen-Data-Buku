@include('layout.header')
<h3 class="judul-h3">Edit Anggota</h3>

<form action="{{ route('anggota.update', $anggota->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-4">
        <label for="" class="block font-bold mb-2">Nama Anggota : </label>
        <input type="text" name="nama_anggota" id="" value="{{ $anggota->nama_anggota }}"
        class="w-full px-3 py-2  border border-gray-300 rounded">
    </div>

    <div class="mb-4">
        <label for="" class="block font-bold mb-2">Alamat : </label>
        <input type="text" autocomplete="off" placeholder="Masukkan Alamat Disini.." name="alamat" id=""
        class="w-full px-3 py-2 border border-gray-300 rounded" value="{{$anggota->alamat}}">
    </div>

    <div class="mb-4">
        <label for="" class="block font-bold mb-2">Nomor Telepon : </label>
        <input type="text" autocomplete="off" placeholder="+62" name="no_telepon" id=""
        class="w-full px-3 py-2 border border-gray-300 rounded" value="{{$anggota->no_telepon}}">
    </div>

    <button type="submit" class="tombol-biru">Submit</button>
</form>

@include('layout.footer')
