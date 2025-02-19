@include('layout.header')
<h3 class="judul-h3">Buku</h3>
<div style="display: flex; justify-content:space-between; align-items:center;">
    <a href="{{ route('buku.create') }}" class="tombol-biru">Tambah</a>

    <form action="{{ route('buku.index') }}" method="get" class="flex items-center ml-3">
        <input type="text" name="q" id="" style="padding: 5px; margin-right:8px;" placeholder="Cari Disini..." autocomplete="off">
        <button type="submit" class="tombol-hijau">Cari</button>
    </form>
</div>

<table class="tabel-1 mb-3">
    <thead>
        <tr class="bg-gray-100">
            <th class="custom_th">No.</th>
            <th class="custom_th">Cover</th>
            <th class="custom_th">judul Buku</th>
            <th class="custom_th">Pengarang</th>
            <th class="custom_th">Tahun</th>
            <th class="custom_th">Penerbit</th>
            <th class="custom_th">Kategori</th>
            <th width="170" class="custom_th">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allBuku as $key => $r)
            <tr>
                <td class="custom_td">{{ $key + $allBuku->firstItem() }}</td>
                <td class="custom_td">
                    @if ($r->cover)
                        <img src="{{ asset('storage/' . $r->cover) }}" alt="cover" srcset="" width="80">
                    @endif
                </td>
                <td class="custom_td">{{ $r->judul }}</td>
                <td class="custom_td">{{ $r->pengarang }}</td>
                <td class="custom_td">{{ $r->tahun_terbit }}</td>
                <td class="custom_td">{{ $r->penerbit->nama_penerbit }}</td>
                <td class="custom_td">{{ $r->kategori->nama_kategori }}</td>
                <td class="custom_td" width="220">
                    <form action="{{ route('buku.destroy', $r->id) }}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('buku.show', $r->id) }}" class="tombol-hijau">Detail</a>
                        <a href="{{ route('buku.edit', $r->id) }}" class="tombol-orange">Edit</a>
                        <button type="submit" class="tombol-merah">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div style="mt-3">
    {{$allBuku->links('vendor.pagination.tailwind')}}
</div>

@include('layout.footer')
