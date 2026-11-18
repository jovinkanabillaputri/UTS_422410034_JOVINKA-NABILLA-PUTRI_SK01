@extends('layouts.app')

@section('title', 'Edit Kelompok Tanaman')

@section('page-title', 'Kelompok Tanaman')

@section('content')

<x-alert />

<div class="page-heading">
    <div>
        <h2>Edit Kelompok Tanaman</h2>
        <p>Perbarui informasi kelompok tanaman.</p>
    </div>
</div>

<x-card title="Form Edit Kelompok Tanaman">

    <form
        action="{{ route('Kelompok Tanaman.update', $kelompokTanaman->id) }}"
        method="POST"
        class="data-form"
    >
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama_kelompok">Nama Kelompok Tanaman</label>
            <input
                type="text"
                id="nama_kelompok"
                name="nama_kelompok"
                value="{{ old('nama_kelompok', $kelompokTanaman->nama_kelompok) }}"
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
            >{{ old('deskripsi', $kelompokTanaman->deskripsi) }}</textarea>

            @error('deskripsi')
                <small class="error-message">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-primary">
                Simpan Perubahan
            </button>

            <a href="{{ route('Kelompok Tanaman.index') }}" class="btn-secondary">
                Kembali
            </a>
        </div>

    </form>

</x-card>

@endsection