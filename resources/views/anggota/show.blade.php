@include('layout.header')
<h3 class="judul-h3">Detail Kategori</h3>

<a href="{{route('kategori.create')}}" class="tombol">Tambah</a>

    <table class="tabel-1">
        <tbody>
            <tr>
                <td width="150px" class="px-4 py-2">Nama Kategori</td>
                <td width="2px" class="px-4 py-2">:</td>
                <td class="px-4 py-2">{{$kategori->nama_kategori}}</td>
            </tr>
        </tbody>
    </table>

@include('layout.footer')
