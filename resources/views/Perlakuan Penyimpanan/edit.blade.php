@extends('layouts.app')

@section('title', 'Edit Perlakuan Penyimpanan')

@section('page-title', 'Perlakuan Penyimpanan')

@section('content')

<x-alert />

<div class="page-heading">
    <div>
        <h2>Edit Perlakuan Penyimpanan</h2>
        <p>Perbarui informasi perlakuan penyimpanan benih.</p>
    </div>
</div>

<x-card title="Form Edit Perlakuan Penyimpanan">

    <form
        action="{{ route('Perlakuan Penyimpanan.update', $perlakuanPenyimpanan->id) }}"
        method="POST"
        class="data-form"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_perlakuan">Nama Perlakuan Penyimpanan</label>

            <input
                type="text"
                id="nama_perlakuan"
                name="nama_perlakuan"
                value="{{ old('nama_perlakuan', $perlakuanPenyimpanan->nama_perlakuan) }}"
                maxlength="100"
                required
            >

            @error('nama_perlakuan')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>

            <textarea
                id="deskripsi"
                name="deskripsi"
                rows="5"
            >{{ old('deskripsi', $perlakuanPenyimpanan->deskripsi) }}</textarea>

            @error('deskripsi')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                Simpan Perubahan
            </button>

            <a
                href="{{ route('Perlakuan Penyimpanan.index') }}"
                class="btn-secondary"
            >
                Kembali
            </a>
        </div>

    </form>

</x-card>

@endsection