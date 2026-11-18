@extends('layouts.app')

@section('title', 'Tambah Perlakuan Penyimpanan')

@section('page-title', 'Perlakuan Penyimpanan')

@section('content')

<x-alert />

<div class="page-heading">
    <div>
        <h2>Tambah Perlakuan Penyimpanan</h2>
        <p>Tambahkan data perlakuan penyimpanan benih baru.</p>
    </div>
</div>

<x-card title="Form Tambah Perlakuan Penyimpanan">

    <form
        action="{{ route('Perlakuan Penyimpanan.store') }}"
        method="POST"
        class="data-form"
    >
        @csrf

        <div class="form-group">
            <label for="nama_perlakuan">Nama Perlakuan Penyimpanan</label>

            <input
                type="text"
                id="nama_perlakuan"
                name="nama_perlakuan"
                value="{{ old('nama_perlakuan') }}"
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
            >{{ old('deskripsi') }}</textarea>

            @error('deskripsi')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                Simpan
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