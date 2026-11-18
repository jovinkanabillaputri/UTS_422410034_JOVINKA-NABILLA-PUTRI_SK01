@extends('layouts.app')

@section('title', 'Data Kelompok Tanaman')
@section('page-title', 'Kelompok Tanaman')

@section('content')

    <x-alert />

    <div class="page-heading">
        <div>
            <h2>Data Kelompok Tanaman</h2>
            <p>Kelola data kelompok tanaman yang tersedia.</p>
        </div>

        <a href="{{ route('Kelompok Tanaman.create') }}" class="btn-primary">
            + Tambah Kelompok Tanaman
        </a>
    </div>

    <x-card title="Daftar Kelompok Tanaman">

        <form action="{{ route('Kelompok Tanaman.index') }}" method="GET" class="search-form">
            <input
                type="text"
                name="search"
                placeholder="Cari nama kelompok tanaman..."
                value="{{ request('search') }}"
            >

            <button type="submit" class="btn-primary">Cari</button>

            <a href="{{ route('Kelompok Tanaman.index') }}" class="btn-secondary">
                Reset
            </a>
        </form>

        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kelompok</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($kelompokTanaman as $index => $kelompok)
                        <tr>
                            <td>{{ $kelompokTanaman->firstItem() + $index }}</td>
                            <td>{{ $kelompok->nama_kelompok }}</td>
                            <td>{{ $kelompok->deskripsi ?? '-' }}</td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('Kelompok Tanaman.show', $kelompok->id) }}" class="btn-detail">
                                        Detail
                                    </a>

                                    <a href="{{ route('Kelompok Tanaman.edit', $kelompok->id) }}" class="btn-edit">
                                        Edit
                                    </a>

                                    <form action="{{ route('Kelompok Tanaman.destroy', $kelompok->id) }}"
                                        method="POST" class="form-hapus">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn-delete">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="empty-data">
                                Data kelompok tanaman belum tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            {{ $kelompokTanaman->links() }}
        </div>

    </x-card>

@endsection