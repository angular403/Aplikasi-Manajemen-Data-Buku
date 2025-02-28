<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = $request->input('q');

        if($query)
        {
            $allKategori = Kategori::when($query, function($queryBuilder) use ($query){
                $queryBuilder->where('nama_kategori','like','%' . $query . '%');
            })->paginate(5);
            $allKategori->appends(['q' => $query]);
        }else{
            $allKategori = Kategori::latest()->paginate(10);
        }
        // $allKategori = Kategori::all();
        return view('kategori.index', compact('allKategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        Kategori::create($validateData);
        return redirect()->route('kategori.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(Kategori $kategori)
    {
        return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategori $kategori)
    {
        return view('kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategori $kategori)
    {
        $validateData = $request->validate([
            'nama_kategori' => 'required|max:100',
        ]);

        $kategori->update($validateData);
        return redirect()->route('kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategori $kategori)
    {
        $kategori->delete();
        return redirect()->route('kategori.index');
    }
}
