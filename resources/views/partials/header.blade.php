<header class="top-header">

    <div class="header-title">
        <h3>@yield('page-title', 'Dashboard')</h3>
        <p>Sistem Informasi Bank Benih Pusaka</p>
    </div>

    <div class="header-profile">
        <div class="profile-icon">
            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
        </div>

        <div class="profile-info">
            <strong>{{ Auth::user()->name }}</strong>
            <span>Administrator</span>
        </div>
    </div>

</header>