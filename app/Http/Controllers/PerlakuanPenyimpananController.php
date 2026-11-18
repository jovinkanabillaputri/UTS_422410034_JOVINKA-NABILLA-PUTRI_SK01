<?php

namespace App\Http\Controllers;

use App\Models\PerlakuanPenyimpanan;
use Illuminate\Http\Request;

class PerlakuanPenyimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = PerlakuanPenyimpanan::query();

        // Pencarian berdasarkan nama perlakuan
        if ($request->filled('search')) {
            $query->where(
                'nama_perlakuan',
                'like',
                '%' . $request->search . '%'
            );
        }

        $perlakuanPenyimpanan = $query
            ->orderBy('nama_perlakuan')
            ->paginate(10)
            ->withQueryString();

        return view(
            'Perlakuan Penyimpanan.index',
            compact('perlakuanPenyimpanan')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Perlakuan Penyimpanan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_perlakuan' => [
                'required',
                'string',
                'max:100',
                'unique:perlakuan_penyimpanan,nama_perlakuan',
            ],
            'deskripsi' => [
                'nullable',
                'string',
            ],
        ], [
            'nama_perlakuan.required' => 'Nama perlakuan wajib diisi.',
            'nama_perlakuan.max' => 'Nama perlakuan maksimal 100 karakter.',
            'nama_perlakuan.unique' => 'Nama perlakuan sudah terdaftar.',
        ]);

        PerlakuanPenyimpanan::create($validated);

        return redirect()
            ->route('Perlakuan Penyimpanan.index')
            ->with('success', 'Perlakuan penyimpanan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PerlakuanPenyimpanan $perlakuanPenyimpanan)
    {
       return view('Perlakuan Penyimpanan.show',compact('perlakuanPenyimpanan')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PerlakuanPenyimpanan $perlakuanPenyimpanan)
    {
        return view('Perlakuan Penyimpanan.edit',compact('perlakuanPenyimpanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PerlakuanPenyimpanan $perlakuanPenyimpanan)
    {
        $validated = $request->validate([
            'nama_perlakuan' => [
                'required',
                'string',
                'max:100',
                'unique:perlakuan_penyimpanan,nama_perlakuan,'
                    . $perlakuanPenyimpanan->id,
            ],
            'deskripsi' => [
                'nullable',
                'string',
            ],
        ], [
            'nama_perlakuan.required' => 'Nama perlakuan wajib diisi.',
            'nama_perlakuan.max' => 'Nama perlakuan maksimal 100 karakter.',
            'nama_perlakuan.unique' => 'Nama perlakuan sudah terdaftar.',
        ]);

        $perlakuanPenyimpanan->update($validated);

        return redirect()
            ->route('Perlakuan Penyimpanan.index')
            ->with('success', 'Perlakuan penyimpanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PerlakuanPenyimpanan $perlakuanPenyimpanan)
    {
        $perlakuanPenyimpanan->delete();

        return redirect()
            ->route('Perlakuan Penyimpanan.index')
            ->with('success', 'Perlakuan penyimpanan berhasil dihapus.');
    }
}