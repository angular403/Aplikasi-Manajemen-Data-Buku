<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        if($query)
        {
            $allBuku = Buku::when($query, function($queryBuilder) use ($query){
                $queryBuilder->where('judul','like','%' . $query . '%')
                ->orWhere('pengarang','like','%' . $query . '%')
                ->orWhere('tahun_terbit','like','%' . $query . '%');
            })->paginate(10);
            $allBuku->appends(['q' => $query]);
        }else{
            $allBuku = Buku::latest()->paginate(5);
        }
        return view('buku.index', compact('allBuku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.create', compact('kategori', 'penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'file_cover' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        // Upload File
        if ($request->hasFile('file_cover')) {
            $validateData['cover'] = $request->file('file_cover')->store('cover', 'public');
        }

        //hapus file_cover dari array validasi
        unset($validateData['file_cover']);

        Buku::create($validateData);
        return redirect()->route('buku.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        $kategori = Kategori::all();
        $penerbit = Penerbit::all();
        return view('buku.edit', compact('buku', 'penerbit', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $validateData = $request->validate([
            'judul' => 'required|max:100',
            'pengarang' => 'required|max:100',
            'tahun_terbit' => 'required|integer:4',
            'kategori_id' => 'required',
            'penerbit_id' => 'required',
            'file_cover' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
        ]);

        // Upload File
        if ($request->hasFile('file_cover')) {
            $validateData['cover'] = $request->file('file_cover')->store('cover', 'public');

            if ($request->cover_lama) {
                Storage::delete('public/' . $request->cover_lama);
            }
        }
        //hapus file_cover dari array validasi
        unset($validateData['file_cover']);

        $buku->update($validateData);
        return redirect()->route('buku.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        if ($buku->cover && Storage::exists('public/' . $buku->cover)) {
            Storage::delete('public/' . $buku->cover);
        }

        $buku->delete();
        return redirect()->route('buku.index');
    }
}
