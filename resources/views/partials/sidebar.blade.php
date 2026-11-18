<aside class="sidebar">

    <div class="sidebar-brand">
        <div class="brand-icon">🌱</div>
        <div>
            <h2>Bank Benih</h2>
            <span>PUSAKA</span>
        </div>
    </div>

    <div class="sidebar-menu">
        <p class="menu-label">MENU UTAMA</p>

        <a href="{{ route('dashboard') }}"
           class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <span>⌂</span>
            Dashboard
        </a>

        <p class="menu-label">DATA MASTER</p>

        <a href="{{ route('Kelompok Tanaman.index') }}"
           class="{{ request()->routeIs('Kelompok Tanaman.*') ? 'active' : '' }}">
            <span>❀</span>
            Kelompok Tanaman
        </a>

        <a href="{{ route('Perlakuan Penyimpanan.index') }}"
           class="{{ request()->routeIs('Perlakuan Penyimpanan.*') ? 'active' : '' }}">
            <span>❋</span>
            Perlakuan Penyimpanan
        </a>

        <a href="{{ route('Aksesi Benih.index') }}"
           class="{{ request()->routeIs('Aksesi Benih.*') ? 'active' : '' }}">
            <span>🌾</span>
            Data Aksesi Benih
        </a>
    </div>

    <div class="sidebar-bottom">
        <form action="{{ route('logout') }}" method="POST" class="form-logout">
            @csrf
            <button type="submit" class="logout-button">
                <span>↪</span>
                Keluar
            </button>
        </form>
    </div>

</aside>