@extends('layouts.app')

@section('title', 'Detail Perlakuan Penyimpanan')

@section('page-title', 'Perlakuan Penyimpanan')

@section('content')

<div class="page-heading">
    <div>
        <h2>Detail Perlakuan Penyimpanan</h2>
        <p>Informasi lengkap perlakuan penyimpanan benih.</p>
    </div>
</div>

<x-card title="Informasi Perlakuan Penyimpanan">

    <div class="detail-table">
        <table>
            <tr>
                <th>ID</th>
                <td>{{ $perlakuanPenyimpanan->id }}</td>
            </tr>

            <tr>
                <th>Nama Perlakuan</th>
                <td>{{ $perlakuanPenyimpanan->nama_perlakuan }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{{ $perlakuanPenyimpanan->deskripsi ?? '-' }}</td>
            </tr>

            <tr>
                <th>Dibuat Pada</th>
                <td>
                    {{ $perlakuanPenyimpanan->created_at?->format('d-m-Y H:i') ?? '-' }}
                </td>
            </tr>

            <tr>
                <th>Diperbarui Pada</th>
                <td>
                    {{ $perlakuanPenyimpanan->updated_at?->format('d-m-Y H:i') ?? '-' }}
                </td>
            </tr>
        </table>
    </div>

    <div class="form-actions">
        <a
            href="{{ route('Perlakuan Penyimpanan.edit', $perlakuanPenyimpanan->id) }}"
            class="btn-edit"
        >
            Edit
        </a>

        <a
            href="{{ route('Perlakuan Penyimpanan.index') }}"
            class="btn-secondary"
        >
            Kembali
        </a>
    </div>

</x-card>

@endsection