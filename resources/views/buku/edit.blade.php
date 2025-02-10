@include('layout.header')
<h3>Edit Penerbit</h3>

<form action="{{ route('buku.update',$buku->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="">Judul Buku : </label>
        <input type="text" name="judul" id="" value="{{$buku->judul}}">
    </div>
    <div class="form-group">
        <label for="">Pengarang : </label>
        <input type="text" name="pengarang" id="" value="{{$buku->pengarang}}">
    </div>
    <div class="form-group">
        <label for="">Tahun Terbit : </label>
        <input type="text" name="tahun_terbit" id="" value="{{$buku->tahun_terbit}}">
    </div>
    <div class="form-group">
        <label for="">Penerbit : </label>
        <select name="penerbit_id" id="">
            @foreach ($penerbit as $p)
                <option value="{{ $p->id }}" {{ ($p->id == $buku->penerbit_id) ? 'selected' : ''}}>
                    {{ $p->nama_penerbit }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="">Kategori : </label>
        <select name="kategori_id" id="">
            @foreach ($kategori as $k)
                <option value="{{ $k->id }}" {{ ($k->id == $buku->kategori_id) ? 'selected': '' }}>
                   {{$k->nama_kategori}}                 </option>
            @endforeach
        </select>
    </div>

        <div class="form-group">
            <label for="">Gambar Sampul:</label>
            @if ($buku->cover)
            <img src="{{asset('storage/'. $buku->cover) }}" alt="Cover Lama" srcset="" width="90">
            @endif
            <input type="file" name="file_cover" id="">
        </div>


        <input type="hidden" name="cover_lama" value="{{$buku->cover}}">
    <button type="submit" class="tombol">Submit</button>
</form>

@include('layout.footer')
