@extends('layouts.app')

@section('title', 'Detail Aksesi Benih')
@section('page-title', 'Aksesi Benih')

@section('content')

<div class="page-heading">
    <div>
        <h2>Detail Aksesi Benih</h2>
        <p>Informasi lengkap data aksesi dan asal pengumpulan benih.</p>
    </div>
</div>

<x-card title="Data Aksesi Benih">
    <div class="detail-table">
        <table>
            <tr>
                <th>Kode Aksesi</th>
                <td>{{ $aksesiBenih->kode_aksesi }}</td>
            </tr>
            <tr>
                <th>Nama Aksesi</th>
                <td>{{ $aksesiBenih->nama_aksesi }}</td>
            </tr>
            <tr>
                <th>Kelompok Tanaman</th>
                <td>{{ $aksesiBenih->kelompokTanaman->nama_kelompok ?? '-' }}</td>
            </tr>
            <tr>
                <th>Catatan</th>
                <td>{{ $aksesiBenih->catatan ?? '-' }}</td>
            </tr>
        </table>
    </div>
</x-card>

<br>

<x-card title="Asal Pengumpulan">
    <div class="detail-table">
        <table>
            <tr>
                <th>Provinsi</th>
                <td>{{ $aksesiBenih->asalPengumpulan?->provinsi ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kabupaten/Kota</th>
                <td>{{ $aksesiBenih->asalPengumpulan?->kabupaten_kota ?? '-' }}</td>
            </tr>
            <tr>
                <th>Kecamatan</th>
                <td>{{ $aksesiBenih->asalPengumpulan?->kecamatan ?? '-' }}</td>
            </tr>
            <tr>
                <th>Desa</th>
                <td>{{ $aksesiBenih->asalPengumpulan?->desa ?? '-' }}</td>
            </tr>
            <tr>
                <th>Tanggal Pengumpulan</th>
                <td>
                    {{ $aksesiBenih->asalPengumpulan?->tanggal_pengumpulan?->format('d-m-Y') ?? '-' }}
                </td>
            </tr>
            <tr>
                <th>Nama Pengumpul</th>
                <td>{{ $aksesiBenih->asalPengumpulan?->nama_pengumpul ?? '-' }}</td>
            </tr>
            <tr>
                <th>Keterangan</th>
                <td>{{ $aksesiBenih->asalPengumpulan?->keterangan ?? '-' }}</td>
            </tr>
        </table>
    </div>
</x-card>

<br>

<x-card title="Perlakuan Penyimpanan">
    <div class="detail-table">
        @forelse ($aksesiBenih->perlakuanPenyimpanan as $perlakuan)
            <p>{{ $loop->iteration }}. {{ $perlakuan->nama_perlakuan }}</p>
        @empty
            <p>Belum ada perlakuan penyimpanan.</p>
        @endforelse
    </div>
</x-card>

<div class="form-actions">
    <a href="{{ route('Aksesi Benih.index') }}" class="btn-secondary">Kembali</a>
    <a href="{{ route('Aksesi Benih.edit', $aksesiBenih->id) }}" class="btn-edit">Edit</a>
</div>

@endsection