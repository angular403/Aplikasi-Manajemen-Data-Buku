@include('layout.header')
<h3>Detail Buku</h3>

<a href="{{route('buku.create')}}" class="tombol">Tambah</a>

    @if ($buku->cover)
    <div style="text-align: center;">
        <img src="{{asset('storage/' .$buku->cover)}}" alt="" srcset="">
    </div>
    @endif

    <table>
        <tbody>
            <tr>
                <td width="150px">Judul Buku</td>
                <td width="2px">:</td>
                <td>{{$buku->judul}}</td>
            </tr>
            <tr>
                <td width="150px">Pengarang</td>
                <td>:</td>
                <td>{{$buku->pengarang}}</td>
            </tr>
            <tr>
                <td width="150px">Tahun Terbit</td>
                <td>:</td>
                <td>{{$buku->tahun_terbit}}</td>
            </tr>
            <tr>
                <td width="150px">Penerbit</td>
                <td>:</td>
                <td>{{$buku->penerbit_id}}</td>
            </tr>
            <tr>
                <td width="150px">Kategori</td>
                <td>:</td>
                <td>{{$buku->kategori_id}}</td>
            </tr>
        </tbody>
    </table>

@include('layout.footer')
