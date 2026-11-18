@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: @json(session('success')),
                confirmButtonText: 'Oke',
                confirmButtonColor: '#315c3d'
            });
        });
    </script>
@endif

@if (session('error'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: @json(session('error')),
                confirmButtonText: 'Oke',
                confirmButtonColor: '#315c3d'
            });
        });
    </script>
@endif

@if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            Swal.fire({
                icon: 'warning',
                title: 'Periksa Kembali!',
                text: @json($errors->first()),
                confirmButtonText: 'Mengerti',
                confirmButtonColor: '#315c3d'
            });
        });
    </script>
@endif