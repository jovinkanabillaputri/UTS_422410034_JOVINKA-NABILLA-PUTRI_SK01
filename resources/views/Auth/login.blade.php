<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Bank Benih Pusaka</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

    <div class="login-container">

        <div class="login-card">

            <div class="login-logo">🌱</div>

            <h2>Bank Benih Pusaka</h2>
            <p class="login-description">Silakan masuk untuk mengelola data benih.</p>

            <x-alert />

            <form action="{{ route('login.process') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email"
                           value="{{ old('email') }}"
                           placeholder="Masukkan email"
                           required>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password"
                           placeholder="Masukkan password"
                           required>
                </div>

                <button type="submit" class="btn-login">Masuk</button>
            </form>

            <div class="login-footer">
                Bank Benih Pusaka &copy; {{ date('Y') }}
            </div>

        </div>

    </div>

</body>
</html>