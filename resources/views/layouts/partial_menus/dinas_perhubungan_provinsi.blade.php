<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-prov.dashboard', 'active') }}">
    <a href="{{ route('app.dishub-prov.dashboard') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-gauge-high"></i></span>
        <span class="nxl-mtext">Dashboard</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-prov.kendaraan-angkutan.index', 'active') }}">
    <a href="{{ route('app.dishub-prov.kendaraan-angkutan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-truck-arrow-right"></i></span>
        <span class="nxl-mtext">Kendaraan Angkutan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-prov.kendaraan.index', 'active') }}">
    <a href="{{ route('app.dishub-prov.kendaraan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-car-side"></i></span>
        <span class="nxl-mtext">Kendaraan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.dishub-prov.perusahaan.index', 'active') }}">
    <a href="{{ route('app.dishub-prov.perusahaan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
        <span class="nxl-mtext">Perusahaan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu(
    ['app.dishub-prov.trayek.*'],
    'nxl-trigger') }}">
    <a href="javascript:void(0);" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-map-location-dot"></i></span>
        <span class="nxl-mtext">Trayek</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
    </a>
    <ul class="nxl-submenu">
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.dishub-prov.trayek.index', 'active') }}" 
                href="{{ route('app.dishub-prov.trayek.index') }}">Trayek Kendaraan</a></li>
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.dishub-prov.rute-trayek.index', 'active') }}" 
                href="{{ route('app.dishub-prov.rute-trayek.index') }}">Rute Trayek</a></li>
    </ul>
</li>