<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.bptd.dashboard', 'active') }}">
    <a href="{{ route('app.bptd.dashboard') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-gauge-high"></i></span>
        <span class="nxl-mtext">Dashboard</span>
    </a>
</li>


<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.bptd.kendaraan-angkutan', 'active') }}">
    <a href="{{ route('app.bptd.kendaraan-angkutan') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-truck-arrow-right"></i></span>
        <span class="nxl-mtext">Kendaraan Angkutan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.bptd.kendaraan', 'active') }}">
    <a href="{{ route('app.bptd.kendaraan') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-car-side"></i></span>
        <span class="nxl-mtext">Kendaraan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.bptd.perusahaan', 'active') }}">
    <a href="{{ route('app.bptd.perusahaan') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
        <span class="nxl-mtext">Perusahaan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu(
    ['app.bptd.trayek.*'],
    'nxl-trigger') }}">
    <a href="javascript:void(0);" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-map-location-dot"></i></span>
        <span class="nxl-mtext">Trayek</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
    </a>
    <ul class="nxl-submenu">
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.bptd.trayek.kendaraan', 'active') }}" 
                href="{{ route('app.bptd.trayek.kendaraan') }}">Trayek Kendaraan</a></li>
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.bptd.trayek.rute', 'active') }}" 
                href="{{ route('app.bptd.trayek.rute') }}">Rute Trayek</a></li>
    </ul>
</li>