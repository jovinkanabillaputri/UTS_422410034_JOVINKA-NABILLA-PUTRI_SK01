<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bank Benih Pusaka')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('styles')
</head>
<body>

    <div class="app-wrapper">

        @include('partials.sidebar')

        <div class="main-content">

            @include('partials.header')

            <main class="content">
                @yield('content')
            </main>

            @include('partials.footer')

        </div>

    </div>

    @stack('scripts')

<script>
    document.addEventListener('DOMContentLoaded', function () {

        // Konfirmasi hapus
        document.querySelectorAll('.form-hapus').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: 'Data yang dihapus tidak dapat dikembalikan.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#c94c4c',
                    cancelButtonColor: '#849187',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

        // Konfirmasi logout
        document.querySelectorAll('.form-logout').forEach(function (form) {
            form.addEventListener('submit', function (event) {
                event.preventDefault();

                Swal.fire({
                    title: 'Yakin ingin keluar?',
                    text: 'Anda harus login kembali untuk mengakses aplikasi.',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#c94c4c',
                    cancelButtonColor: '#849187',
                    confirmButtonText: 'Ya, Logout',
                    cancelButtonText: 'Batal',
                    reverseButtons: true
                }).then(function (result) {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });

    });
</script>
</body>
</html>