@extends('layouts.app')

@section('title', 'Data Aksesi Benih')

@section('page-title', 'Aksesi Benih')

@section('content')

<x-alert />

<div class="page-heading">
    <div>
        <h2>Data Aksesi Benih</h2>
        <p>Kelola data koleksi dan asal pengumpulan benih.</p>
    </div>

    <a href="{{ route('Aksesi Benih.create') }}" class="btn-primary">
        + Tambah Aksesi Benih
    </a>
</div>

<x-card title="Daftar Aksesi Benih">

    <form
        action="{{ route('Aksesi Benih.index') }}"
        method="GET"
        class="search-form"
    >
        <input
            type="text"
            name="search"
            placeholder="Cari kode atau nama aksesi..."
            value="{{ request('search') }}"
        >

        <select name="kelompok_tanaman_id">
            <option value="">Semua Kelompok Tanaman</option>

            @foreach ($kelompokTanaman as $kelompok)
                <option
                    value="{{ $kelompok->id }}"
                    {{ request('kelompok_tanaman_id') == $kelompok->id ? 'selected' : '' }}
                >
                    {{ $kelompok->nama_kelompok }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn-primary">Cari</button>

        <a href="{{ route('Aksesi Benih.index') }}" class="btn-secondary">
            Reset
        </a>
    </form>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Aksesi</th>
                    <th>Nama Aksesi</th>
                    <th>Kelompok Tanaman</th>
                    <th>Asal Pengumpulan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($aksesiBenih as $aksesi)
                    <tr>
                        <td>
                            {{ $aksesiBenih->firstItem() + $loop->index }}
                        </td>

                        <td>{{ $aksesi->kode_aksesi }}</td>

                        <td>{{ $aksesi->nama_aksesi }}</td>

                        <td>
                            {{ $aksesi->kelompokTanaman->nama_kelompok ?? '-' }}
                        </td>

                        <td>
                            {{ $aksesi->asalPengumpulan->desa
                                ? $aksesi->asalPengumpulan->desa . ', '
                                : '' }}
                            {{ $aksesi->asalPengumpulan->kabupaten_kota }},
                            {{ $aksesi->asalPengumpulan->provinsi }}
                        </td>

                        <td>
                            <div class="action-buttons">
                                <a
                                    href="{{ route('Aksesi Benih.show', $aksesi->id) }}"
                                    class="btn-detail"
                                >
                                    Detail
                                </a>

                                <a
                                    href="{{ route('Aksesi Benih.edit', $aksesi->id) }}"
                                    class="btn-edit"
                                >
                                    Edit
                                </a>

                                <form action="{{ route('Aksesi Benih.destroy', $aksesi->id) }}"
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
                        <td colspan="6" class="empty-data">
                            Belum ada data aksesi benih.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $aksesiBenih->links() }}
    </div>

</x-card>

@endsection