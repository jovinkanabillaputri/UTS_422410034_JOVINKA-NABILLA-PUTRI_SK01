<?php

namespace App\Http\Controllers;

use App\Models\KelompokTanaman;
use Illuminate\Http\Request;

class KelompokTanamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = KelompokTanaman::query();

        // Pencarian berdasarkan nama kelompok
        if ($request->filled('search')) {
            $query->where(
                'nama_kelompok',
                'like',
                '%' . $request->search . '%'
            );
        }

        $kelompokTanaman = $query
            ->orderBy('nama_kelompok')
            ->paginate(10)
            ->withQueryString();

        return view('Kelompok Tanaman.index',compact('kelompokTanaman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Kelompok Tanaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kelompok' => [
                'required',
                'string',
                'max:100',
                'unique:kelompok_tanaman,nama_kelompok',
            ],
            'deskripsi' => [
                'nullable',
                'string',
            ],
        ], [
            'nama_kelompok.required' => 'Nama kelompok tanaman wajib diisi.',
            'nama_kelompok.max' => 'Nama kelompok maksimal 100 karakter.',
            'nama_kelompok.unique' => 'Nama kelompok tanaman sudah terdaftar.',
        ]);

        KelompokTanaman::create($validated);

        return redirect()->route('Kelompok Tanaman.index')->with('success', 'Kelompok tanaman berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(KelompokTanaman $kelompokTanaman)
    {
        return view('Kelompok Tanaman.show',compact('kelompokTanaman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelompokTanaman $kelompokTanaman)
    {
         return view('Kelompok Tanaman.edit',compact('kelompokTanaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KelompokTanaman $kelompokTanaman)
    {
        $validated = $request->validate([
            'nama_kelompok' => [
                'required',
                'string',
                'max:100',
                'unique:kelompok_tanaman,nama_kelompok,'
                    . $kelompokTanaman->id,
            ],
            'deskripsi' => [
                'nullable',
                'string',
            ],
        ], [
            'nama_kelompok.required' => 'Nama kelompok tanaman wajib diisi.',
            'nama_kelompok.max' => 'Nama kelompok maksimal 100 karakter.',
            'nama_kelompok.unique' => 'Nama kelompok tanaman sudah terdaftar.',
        ]);

        $kelompokTanaman->update($validated);

        return redirect()->route('Kelompok Tanaman.index')->with('success', 'Kelompok tanaman berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelompokTanaman $kelompokTanaman)
    {
         if ($kelompokTanaman->aksesiBenih()->exists()) {
            return redirect()
                ->route('Kelompok Tanaman.index')
                ->with(
                    'error',
                    'Kelompok tanaman tidak dapat dihapus karena masih digunakan oleh data aksesi.'
                );
        }

        $kelompokTanaman->delete();

        return redirect()
            ->route('Kelompok Tanaman.index')
            ->with('success', 'Kelompok tanaman berhasil dihapus.');
    }
}
