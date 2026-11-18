@extends('layouts.app')

@section('title', 'Tambah Kelompok Tanaman')

@section('page-title', 'Kelompok Tanaman')

@section('content')

<x-alert />

<div class="page-heading">
    <div>
        <h2>Tambah Kelompok Tanaman</h2>
        <p>Tambahkan data kelompok tanaman baru.</p>
    </div>
</div>

<x-card title="Form Tambah Kelompok Tanaman">

    <form
        action="{{ route('Kelompok Tanaman.store') }}"
        method="POST"
        class="data-form"
    >
        @csrf

        <div class="form-group">
            <label for="nama_kelompok">Nama Kelompok Tanaman</label>

            <input
                type="text"
                id="nama_kelompok"
                name="nama_kelompok"
                value="{{ old('nama_kelompok') }}"
                maxlength="100"
                required
            >

            @error('nama_kelompok')
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
                href="{{ route('Kelompok Tanaman.index') }}"
                class="btn-secondary"
            >
                Kembali
            </a>
        </div>

    </form>

</x-card>

@endsection