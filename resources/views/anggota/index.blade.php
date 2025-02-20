@include('layout.header')
<h3 class="judul-h3">Anggota</h3>
<div style="display: flex; justify-content:space-between; align-items:center;">

    <a href="{{ route('anggota.create') }}" class="tombol-biru">Tambah</a>

    <form action="{{ route('anggota.index') }}" method="get">
        <input type="text" name="q" id="" style="padding: 5px; margin-right:8px;"  placeholder="Cari Disini..." autocomplete="off">
        <button type="submit" class="tombol-hijau">Cari</button>
    </form>

</div>

<table class="tabel-1">
    <thead>
        <tr class="bg-gray-100">
            <th class="custom_th">No.</th>
            <th class="custom_th">Nama Anggota</th>
            <th class="custom_th">Alamat</th>
            <th class="custom_th">No. Telepon</th>
            <th class="custom_th">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allAnggota as $key => $r)
            <tr>
                <td class="custom_td">{{ $key + 1 }}</td>
                <td class="custom_td">{{ $r->nama_anggota }}</td>
                <td class="custom_td">
                    <form action="{{ route('anggota.destroy', $r->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('anggota.show', $r->id) }}" class="tombol-hijau">Detail</a>
                        <a href="{{ route('anggota.edit', $r->id) }}" class="tombol-orange">Edit</a>
                        <button type="submit" class="tombol-merah">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('layout.footer')
