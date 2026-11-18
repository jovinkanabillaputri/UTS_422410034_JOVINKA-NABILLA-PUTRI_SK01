@extends('layouts.app')

@section('title', 'Detail Kelompok Tanaman')

@section('page-title', 'Kelompok Tanaman')

@section('content')

<div class="page-heading">
    <div>
        <h2>Detail Kelompok Tanaman</h2>
        <p>Informasi lengkap kelompok tanaman yang tersimpan.</p>
    </div>
</div>

<x-card title="Informasi Kelompok Tanaman">

    <div class="detail-table">
        <table>
            <tr>
                <th>ID</th>
                <td>{{ $kelompokTanaman->id }}</td>
            </tr>

            <tr>
                <th>Nama Kelompok Tanaman</th>
                <td>{{ $kelompokTanaman->nama_kelompok }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{{ $kelompokTanaman->deskripsi ?? '-' }}</td>
            </tr>

            <tr>
                <th>Dibuat Pada</th>
                <td>
                    {{ $kelompokTanaman->created_at?->format('d-m-Y H:i') ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>Diperbarui Pada</th>
                <td>
                    {{ $kelompokTanaman->updated_at?->format('d-m-Y H:i') ?? '-' }}
                </td>
            </tr>
        </table>
    </div>

    <div class="form-actions">
        <a
            href="{{ route('Kelompok Tanaman.edit', $kelompokTanaman->id) }}"
            class="btn-edit"
        >
            Edit
        </a>

        <a
            href="{{ route('Kelompok Tanaman.index') }}"
            class="btn-secondary"
        >
            Kembali
        </a>
    </div>

</x-card>

@endsection