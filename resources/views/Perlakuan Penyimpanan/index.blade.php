@extends('layouts.app')

@section('title', 'Data Perlakuan Penyimpanan')

@section('page-title', 'Perlakuan Penyimpanan')

@section('content')

<x-alert />

<div class="page-heading">
    <div>
        <h2>Data Perlakuan Penyimpanan</h2>
        <p>Kelola data perlakuan penyimpanan benih.</p>
    </div>

    <a href="{{ route('Perlakuan Penyimpanan.create') }}" class="btn-primary">
        + Tambah Perlakuan Penyimpanan
    </a>
</div>

<x-card title="Daftar Perlakuan Penyimpanan">

    <form
        action="{{ route('Perlakuan Penyimpanan.index') }}"
        method="GET"
        class="search-form"
    >
        <input
            type="text"
            name="search"
            placeholder="Cari nama perlakuan..."
            value="{{ request('search') }}"
        >

        <button type="submit" class="btn-primary">Cari</button>

        <a href="{{ route('Perlakuan Penyimpanan.index') }}" class="btn-secondary">
            Reset
        </a>
    </form>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Perlakuan</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($perlakuanPenyimpanan as $index => $perlakuan)
                    <tr>
                        <td>
                            {{ $perlakuanPenyimpanan->firstItem() + $index }}
                        </td>

                        <td>{{ $perlakuan->nama_perlakuan }}</td>

                        <td>{{ $perlakuan->deskripsi ?? '-' }}</td>

                        <td>
                            <div class="action-buttons">
                                <a
                                    href="{{ route('Perlakuan Penyimpanan.show', $perlakuan->id) }}"
                                    class="btn-detail"
                                >
                                    Detail
                                </a>

                                <a
                                    href="{{ route('Perlakuan Penyimpanan.edit', $perlakuan->id) }}"
                                    class="btn-edit"
                                >
                                    Edit
                                </a>

                                <form action="{{ route('Perlakuan Penyimpanan.destroy', $perlakuan->id) }}"
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
                            Data perlakuan penyimpanan belum tersedia.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $perlakuanPenyimpanan->links() }}
    </div>

</x-card>

@endsection