@include('layout.header')


<div class="flex items-center justify-between">
    <h2 class="judul-h3">Peminjaman Buku</h2>
    <a href="{{ route('peminjaman.create') }}" class="tombol-biru">Peminjaman Baru</a>
</div>

<table class="tabel-1">
    <thead>
        <tr>
            <th class="custom_th">No.</th>
            <th class="custom_th">Tanggal</th>
            <th class="custom_th">Nama Anggota</th>
            <th class="custom_th">Status Peminjaman</th>
            <th class="custom_th">Aksi</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($allPeminjaman as $key => $r)
            <tr>
                <td class="custom_td">{{ $key + 1 }}</td>
                <td class="custom_td">{{ $r->tgl_peminjaman }}</td>
                <td class="custom_td">{{ $r->anggota->nama_anggota }}</td>
                <td class="custom_td">{{ $r->status_peminjaman }}</td>
                <td>
                    <form action="{{ route('peminjaman.destroy', $r->id) }}" method="post">
                        <a href="{{ route('peminjaman.show', $r->id) }}" class="tombol-hijau">Detail</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="tombol-merah">Hapus</button>
                </td>
            </tr>
            </form>
        @endforeach
    </tbody>
</table>
@include('layout.footer')
