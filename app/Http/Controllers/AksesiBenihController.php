<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AksesiBenih;
use App\Models\KelompokTanaman;
use App\Models\PerlakuanPenyimpanan;
use Illuminate\Support\Facades\DB;

class AksesiBenihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AksesiBenih::with(['kelompokTanaman', 'asalPengumpulan']);

        // Pencarian berdasarkan kode atau nama aksesi
        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('kode_aksesi', 'like', '%' . $request->search . '%')
                    ->orWhere('nama_aksesi', 'like', '%' . $request->search . '%');
            });
        }

        // Filter berdasarkan kelompok tanaman
        if ($request->filled('kelompok_tanaman_id')) {
            $query->where(
                'kelompok_tanaman_id',
                $request->kelompok_tanaman_id
            );
        }

        $aksesiBenih = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        $kelompokTanaman = KelompokTanaman::orderBy('nama_kelompok')->get();

        return view(
            'Aksesi Benih.index',
            compact('aksesiBenih', 'kelompokTanaman')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelompokTanaman = KelompokTanaman::orderBy('nama_kelompok')->get();

        $perlakuanPenyimpanan = PerlakuanPenyimpanan::orderBy('nama_perlakuan')->get();

        return view(
            'Aksesi Benih.create',
            compact('kelompokTanaman', 'perlakuanPenyimpanan')
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
            'kode_aksesi' => 'required|string|max:30|unique:aksesi_benih,kode_aksesi',
            'nama_aksesi' => 'required|string|max:150',
            'kelompok_tanaman_id' => 'required|exists:kelompok_tanaman,id',
            'catatan' => 'nullable|string',
            'provinsi' => 'required|string|max:100',
            'kabupaten_kota' => 'required|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'desa' => 'nullable|string|max:100',
            'tanggal_pengumpulan' => 'required|date',
            'nama_pengumpul' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'perlakuan_penyimpanan' => 'nullable|array',
            'perlakuan_penyimpanan.*' => 'integer|distinct|exists:perlakuan_penyimpanan,id',
        ]);

        DB::transaction(function () use ($validated) {
            $aksesi = AksesiBenih::create([
                'kode_aksesi' => $validated['kode_aksesi'],
                'nama_aksesi' => $validated['nama_aksesi'],
                'kelompok_tanaman_id' => $validated['kelompok_tanaman_id'],
                'catatan' => $validated['catatan'] ?? null,
            ]);

            $aksesi->asalPengumpulan()->create([
                'provinsi' => $validated['provinsi'],
                'kabupaten_kota' => $validated['kabupaten_kota'],
                'kecamatan' => $validated['kecamatan'] ?? null,
                'desa' => $validated['desa'] ?? null,
                'tanggal_pengumpulan' => $validated['tanggal_pengumpulan'],
                'nama_pengumpul' => $validated['nama_pengumpul'] ?? null,
                'keterangan' => $validated['keterangan'] ?? null,
            ]);

            $aksesi->perlakuanPenyimpanan()->sync(
                $validated['perlakuan_penyimpanan'] ?? []
            );
        });

        return redirect()->route('Aksesi Benih.index')
            ->with('success', 'Data aksesi benih berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AksesiBenih $aksesiBenih)
    {
       $aksesiBenih->load([
            'kelompokTanaman',
            'asalPengumpulan',
            'perlakuanPenyimpanan',
        ]);

        return view('Aksesi Benih.show', compact('aksesiBenih')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AksesiBenih $aksesiBenih)
    {
        $aksesiBenih->load([
            'asalPengumpulan',
            'perlakuanPenyimpanan',
        ]);

        $kelompokTanaman = KelompokTanaman::orderBy('nama_kelompok')->get();
        $perlakuanPenyimpanan = PerlakuanPenyimpanan::orderBy('nama_perlakuan')->get();

        return view('Aksesi Benih.edit', compact(
            'aksesiBenih',
            'kelompokTanaman',
            'perlakuanPenyimpanan'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AksesiBenih $aksesiBenih)
    {
        $validated = $request->validate([
            'kode_aksesi' => 'required|string|max:30|unique:aksesi_benih,kode_aksesi,' . $aksesiBenih->id,
            'nama_aksesi' => 'required|string|max:150',
            'kelompok_tanaman_id' => 'required|exists:kelompok_tanaman,id',
            'catatan' => 'nullable|string',
            'provinsi' => 'required|string|max:100',
            'kabupaten_kota' => 'required|string|max:100',
            'kecamatan' => 'nullable|string|max:100',
            'desa' => 'nullable|string|max:100',
            'tanggal_pengumpulan' => 'required|date',
            'nama_pengumpul' => 'nullable|string|max:100',
            'keterangan' => 'nullable|string',
            'perlakuan_penyimpanan' => 'nullable|array',
            'perlakuan_penyimpanan.*' => 'integer|distinct|exists:perlakuan_penyimpanan,id',
        ]);

        DB::transaction(function () use ($validated, $aksesiBenih) {
            $aksesiBenih->update([
                'kode_aksesi' => $validated['kode_aksesi'],
                'nama_aksesi' => $validated['nama_aksesi'],
                'kelompok_tanaman_id' => $validated['kelompok_tanaman_id'],
                'catatan' => $validated['catatan'] ?? null,
            ]);

            $aksesiBenih->asalPengumpulan()->updateOrCreate(
                ['aksesi_benih_id' => $aksesiBenih->id],
                [
                    'provinsi' => $validated['provinsi'],
                    'kabupaten_kota' => $validated['kabupaten_kota'],
                    'kecamatan' => $validated['kecamatan'] ?? null,
                    'desa' => $validated['desa'] ?? null,
                    'tanggal_pengumpulan' => $validated['tanggal_pengumpulan'],
                    'nama_pengumpul' => $validated['nama_pengumpul'] ?? null,
                    'keterangan' => $validated['keterangan'] ?? null,
                ]
            );

            $aksesiBenih->perlakuanPenyimpanan()->sync(
                $validated['perlakuan_penyimpanan'] ?? []
            );
        });

        return redirect()->route('Aksesi Benih.index')
            ->with('success', 'Data aksesi benih berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AksesiBenih $aksesiBenih)
    {
        $aksesiBenih->delete();

        return redirect()->route('Aksesi Benih.index')
            ->with('success', 'Data aksesi benih berhasil dihapus.');
    }
}
