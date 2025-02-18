@include('layout.header')
<h3>Penerbit</h3>
<div style="display: flex; justify-content:space-between; align-items:center;">
    <a href="{{ route('penerbit.create') }}" class="tombol">Tambah</a>

    <form action="{{ route('penerbit.index') }}" method="get">
        <input type="text" name="q" id="" style="padding: 5px; margin-right:8px;" placeholder="Cari Disini..." autocomplete="off">
        <button type="submit" class="tombol">Cari</button>
    </form>
</div>

<table>
    <thead>
        <tr>
            <th>No.</th>
            <th>Nama Penerbit</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($allPenerbit as $key => $r)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $r->nama_penerbit }}</td>
                <td>
                    <form action="{{ route('penerbit.destroy', $r->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('penerbit.show', $r->id) }}" class="tombol">Detail</a>
                        <a href="{{ route('penerbit.edit', $r->id) }}" class="tombol">Edit</a>
                        <button type="submit" class="tombol">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@include('layout.footer')
