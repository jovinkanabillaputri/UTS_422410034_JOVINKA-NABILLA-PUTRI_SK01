@extends('layouts.app')

@section('title', 'Dashboard - Bank Benih Pusaka')
@section('page-title', 'Dashboard')

@section('content')

    <div class="welcome-section">
        <h2>Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p>Kelola dan pantau data koleksi benih melalui Bank Benih Pusaka.</p>
    </div>

    <x-alert />

    <div class="dashboard-grid">

        <x-card title="Kelompok Tanaman">
            <h2>{{ \App\Models\KelompokTanaman::count() }}</h2>
            <p>Total kelompok tanaman</p>
        </x-card>

        <x-card title="Perlakuan Penyimpanan">
            <h2>{{ \App\Models\PerlakuanPenyimpanan::count() }}</h2>
            <p>Total jenis perlakuan</p>
        </x-card>

        <x-card title="Aksesi Benih">
            <h2>{{ \App\Models\AksesiBenih::count() }}</h2>
            <p>Total data aksesi benih</p>
        </x-card>

    </div>

    <x-card title="Informasi Sistem">
        <p>
            Sistem Informasi Bank Benih Pusaka digunakan untuk mengelola
            data kelompok tanaman, perlakuan penyimpanan, dan aksesi benih
            beserta asal pengumpulannya.
        </p>
    </x-card>

@endsection