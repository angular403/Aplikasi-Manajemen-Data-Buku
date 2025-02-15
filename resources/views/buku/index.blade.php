@include('layout.header')
<h3>Buku</h3>
<a href="{{ route('buku.create') }}" class="tombol">Tambah Buku</a>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Cover</th>
            <th>judul Buku</th>
            <th>Pengarang</th>
            <th>Tahun</th>
            <th>Penerbit</th>
            <th>Kategori</th>
            <th width="170">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allBuku as $key => $r)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>
                    @if ($r->cover)
                        <img src="{{ asset('storage/' . $r->cover) }}" alt="cover" srcset="" width="80">
                    @endif
                </td>
                <td>{{ $r->judul }}</td>
                <td>{{ $r->pengarang }}</td>
                <td>{{ $r->tahun_terbit }}</td>
                <td>{{ $r->penerbit->nama_penerbit }}</td>
                <td>{{ $r->kategori->nama_kategori }}</td>
                <td>
                    <form action="{{ route('buku.destroy', $r->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('buku.show', $r->id) }}" class="tombol">Detail</a>
                        <a href="{{ route('buku.edit', $r->id) }}" class="tombol">Edit</a>
                        <button type="submit" class="tombol">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div style="margin-top:10px; display:flex; justify-content:center;">
    {{$allBuku->links('vendor.pagination.buatanku')}}
</div>

@include('layout.footer')
