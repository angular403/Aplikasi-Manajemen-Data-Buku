@include('layout.header')
<h3>Detail Kategori</h3>

<a href="{{route('kategori.create')}}" class="tombol">Tambah</a>

    <table>
        <tbody>
            <tr>
                <td width="150px">Nama Kategori</td>
                <td width="2px">:</td>
                <td>{{$kategori->nama_kategori}}</td>
            </tr>
        </tbody>
    </table>

@include('layout.footer')
