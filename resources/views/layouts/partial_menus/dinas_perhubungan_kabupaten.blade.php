<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-kab.dashboard', 'active') }}">
    <a href="{{ route('app.dishub-kab.dashboard') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-gauge-high"></i></span>
        <span class="nxl-mtext">Dashboard</span>
    </a>
</li>


<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-kab.kendaraan-angkutan.index', 'active') }}">
    <a href="{{ route('app.dishub-kab.kendaraan-angkutan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-truck-arrow-right"></i></span>
        <span class="nxl-mtext">Kendaraan Angkutan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-kab.kendaraan.index', 'active') }}">
    <a href="{{ route('app.dishub-kab.kendaraan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-car-side"></i></span>
        <span class="nxl-mtext">Kendaraan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-kab.perusahaan.index', 'active') }}">
    <a href="{{ route('app.dishub-kab.perusahaan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
        <span class="nxl-mtext">Perusahaan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu(
    ['app.dishub-kab.trayek.*','app.dishub-kab.rute-trayek.*'],
    'nxl-trigger') }}">
    <a href="javascript:void(0);" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-map-location-dot"></i></span>
        <span class="nxl-mtext">Trayek</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
    </a>
    <ul class="nxl-submenu">
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.dishub-kab.trayek.index', 'active') }}" 
                href="{{ route('app.dishub-kab.trayek.index') }}">Trayek Kendaraan</a></li>
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.dishub-kab.rute-trayek.index', 'active') }}" 
                href="{{ route('app.dishub-kab.rute-trayek.index') }}">Rute Trayek</a></li>
    </ul>
</li>