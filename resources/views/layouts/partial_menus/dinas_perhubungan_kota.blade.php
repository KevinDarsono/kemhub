<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-kota.dashboard', 'active') }}">
    <a href="{{ route('app.dishub-kota.dashboard') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-gauge-high"></i></span>
        <span class="nxl-mtext">Dashboard</span>
    </a>
</li>


<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-kota.kendaraan-angkutan.index', 'active') }}">
    <a href="{{ route('app.dishub-kota.kendaraan-angkutan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-truck-arrow-right"></i></span>
        <span class="nxl-mtext">Kendaraan Angkutan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-kota.kendaraan.index', 'active') }}">
    <a href="{{ route('app.dishub-kota.kendaraan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-car-side"></i></span>
        <span class="nxl-mtext">Kendaraan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-kota.perusahaan.index', 'active') }}">
    <a href="{{ route('app.dishub-kota.perusahaan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
        <span class="nxl-mtext">Perusahaan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu(
    ['app.dishub-kota.trayek.*'],
    'nxl-trigger') }}">
    <a href="javascript:void(0);" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-map-location-dot"></i></span>
        <span class="nxl-mtext">Trayek</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
    </a>
    <ul class="nxl-submenu">
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.dishub-kota.trayek.index', 'active') }}" 
                href="{{ route('app.dishub-kota.trayek.index') }}">Trayek Kendaraan</a></li>
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.dishub-kota.rute-trayek.index', 'active') }}" 
                href="{{ route('app.dishub-kota.rute-trayek.index') }}">Rute Trayek</a></li>
    </ul>
</li>