@extends('layouts.app')

@section('title', 'Edit Aksesi Benih')
@section('page-title', 'Aksesi Benih')

@section('content')

<x-alert />

<div class="page-heading">
    <div>
        <h2>Edit Aksesi Benih</h2>
        <p>Perbarui data aksesi dan informasi asal pengumpulan benih.</p>
    </div>
</div>

<form action="{{ route('Aksesi Benih.update', $aksesiBenih->id) }}" method="POST">
    @csrf
    @method('PUT')

    <x-card title="Data Aksesi Benih">
        <div class="data-form">

            <div class="form-group">
                <label for="kode_aksesi">Kode Aksesi</label>
                <input type="text" id="kode_aksesi" name="kode_aksesi"
                    value="{{ old('kode_aksesi', $aksesiBenih->kode_aksesi) }}">
                @error('kode_aksesi')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_aksesi">Nama Aksesi</label>
                <input type="text" id="nama_aksesi" name="nama_aksesi"
                    value="{{ old('nama_aksesi', $aksesiBenih->nama_aksesi) }}">
                @error('nama_aksesi')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="kelompok_tanaman_id">Kelompok Tanaman</label>
                <select id="kelompok_tanaman_id" name="kelompok_tanaman_id">
                    <option value="">Pilih Kelompok Tanaman</option>
                    @foreach ($kelompokTanaman as $kelompok)
                        <option value="{{ $kelompok->id }}"
                            {{ old('kelompok_tanaman_id', $aksesiBenih->kelompok_tanaman_id) == $kelompok->id ? 'selected' : '' }}>
                            {{ $kelompok->nama_kelompok }}
                        </option>
                    @endforeach
                </select>
                @error('kelompok_tanaman_id')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="catatan">Catatan</label>
                <textarea id="catatan" name="catatan" rows="4">{{ old('catatan', $aksesiBenih->catatan) }}</textarea>
                @error('catatan')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

        </div>
    </x-card>

    <br>

    <x-card title="Asal Pengumpulan">
        <div class="data-form">

            <div class="form-group">
                <label for="provinsi">Provinsi</label>
                <input type="text" id="provinsi" name="provinsi"
                    value="{{ old('provinsi', $aksesiBenih->asalPengumpulan?->provinsi) }}">
                @error('provinsi')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="kabupaten_kota">Kabupaten/Kota</label>
                <input type="text" id="kabupaten_kota" name="kabupaten_kota"
                    value="{{ old('kabupaten_kota', $aksesiBenih->asalPengumpulan?->kabupaten_kota) }}">
                @error('kabupaten_kota')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="kecamatan">Kecamatan</label>
                <input type="text" id="kecamatan" name="kecamatan"
                    value="{{ old('kecamatan', $aksesiBenih->asalPengumpulan?->kecamatan) }}">
                @error('kecamatan')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="desa">Desa</label>
                <input type="text" id="desa" name="desa"
                    value="{{ old('desa', $aksesiBenih->asalPengumpulan?->desa) }}">
                @error('desa')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="tanggal_pengumpulan">Tanggal Pengumpulan</label>
                <input type="date" id="tanggal_pengumpulan" name="tanggal_pengumpulan"
                    value="{{ old('tanggal_pengumpulan', $aksesiBenih->asalPengumpulan?->tanggal_pengumpulan?->format('Y-m-d')) }}">
                @error('tanggal_pengumpulan')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="nama_pengumpul">Nama Pengumpul</label>
                <input type="text" id="nama_pengumpul" name="nama_pengumpul"
                    value="{{ old('nama_pengumpul', $aksesiBenih->asalPengumpulan?->nama_pengumpul) }}">
                @error('nama_pengumpul')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea id="keterangan" name="keterangan" rows="4">{{ old('keterangan', $aksesiBenih->asalPengumpulan?->keterangan) }}</textarea>
                @error('keterangan')
                    <small class="error-message">{{ $message }}</small>
                @enderror
            </div>

        </div>
    </x-card>

    <br>

    <x-card title="Perlakuan Penyimpanan">
        <p class="form-description">
            Pilih perlakuan penyimpanan yang diterapkan pada benih.
        </p>

        @php
            $perlakuanTerpilih = old(
                'perlakuan_penyimpanan',
                $aksesiBenih->perlakuanPenyimpanan->pluck('id')->toArray()
            );
        @endphp

        <div class="checkbox-group">
            @forelse ($perlakuanPenyimpanan as $perlakuan)
                <label class="checkbox-item">
                    <input type="checkbox" name="perlakuan_penyimpanan[]"
                        value="{{ $perlakuan->id }}"
                        {{ in_array($perlakuan->id, $perlakuanTerpilih) ? 'checked' : '' }}>
                    <span>{{ $perlakuan->nama_perlakuan }}</span>
                </label>
            @empty
                <p>Belum ada data perlakuan penyimpanan.</p>
            @endforelse
        </div>

        @error('perlakuan_penyimpanan')
            <small class="error-message">{{ $message }}</small>
        @enderror

        @error('perlakuan_penyimpanan.*')
            <small class="error-message">{{ $message }}</small>
        @enderror
    </x-card>

    <div class="form-actions">
        <button type="submit" class="btn-primary">Simpan Perubahan</button>
        <a href="{{ route('Aksesi Benih.index') }}" class="btn-secondary">Kembali</a>
    </div>

</form>

@endsection