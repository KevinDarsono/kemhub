<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.administrator.dashboard', 'active') }}">
    <a href="{{ route('app.administrator.dashboard') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-gauge-high"></i></span>
        <span class="nxl-mtext">Dashboard</span>
    </a>
</li>



<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.administrator.kendaraan-angkutan', 'active') }}">
    <a href="{{ route('app.administrator.kendaraan-angkutan') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-truck-arrow-right"></i></span>
        <span class="nxl-mtext">Kendaraan Angkutan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.administrator.kendaraan', 'active') }}">
    <a href="{{ route('app.administrator.kendaraan') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-car-side"></i></span>
        <span class="nxl-mtext">Kendaraan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.administrator.perusahaan', 'active') }}">
    <a href="{{ route('app.administrator.perusahaan') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
        <span class="nxl-mtext">Perusahaan</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu(
    ['app.administrator.trayek.*'],
    'nxl-trigger') }}">
    <a href="javascript:void(0);" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-map-location-dot"></i></span>
        <span class="nxl-mtext">Trayek</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
    </a>
    <ul class="nxl-submenu">
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.administrator.trayek.kendaraan', 'active') }}"
                href="{{ route('app.administrator.trayek.kendaraan') }}">Trayek Kendaraan</a></li>
        <li class="nxl-item">
            <a class="nxl-link {{ set_active_menu('app.administrator.trayek.rute', 'active') }}"
                href="{{ route('app.administrator.trayek.rute') }}">Rute Trayek</a></li>
    </ul>
</li>


<li class="nxl-item nxl-hasmenu {{ set_active_menu(
    ['app.administrator.master-data.*'],
    'nxl-trigger') }}">
    <a href="javascript:void(0);" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-table"></i></span>
        <span class="nxl-mtext">Master Data</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
    </a>
    <ul class="nxl-submenu">
        <li class="nxl-item {{ set_active_menu('app.administrator.master-data.provinsi', 'active') }}">
            <a class="nxl-link" href="{{ route('app.administrator.master-data.provinsi') }}">Provinsi</a>
        </li>
        <li class="nxl-item {{ set_active_menu('app.administrator.master-data.kota', 'active') }}">
            <a class="nxl-link" href="{{ route('app.administrator.master-data.kota') }}">Kota</a>
        </li>
        <li class="nxl-item {{ set_active_menu('app.administrator.master-data.kabupaten', 'active') }}">
            <a class="nxl-link" href="{{ route('app.administrator.master-data.kabupaten') }}">Kabupaten</a>
        </li>
        <li class="nxl-item {{ set_active_menu('app.administrator.master-data.jenis-angkutan', 'active') }}">
            <a class="nxl-link" href="{{ route('app.administrator.master-data.jenis-angkutan') }}">Jenis Angkutan</a>
        </li>
        <li class="nxl-item {{ set_active_menu('app.administrator.master-data.jenis-layanan', 'active') }}">
            <a class="nxl-link" href="{{ route('app.administrator.master-data.jenis-layanan') }}">Jenis Layanan</a>
        </li>
        <li class="nxl-item {{ set_active_menu('app.administrator.master-data.unit-kerja', 'active') }}">
            <a class="nxl-link" href="{{ route('app.administrator.master-data.unit-kerja') }}">Unit Kerja</a>
        </li>
    </ul>
</li>
<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.administrator.pengelola-group-pengguna', 'active') }}">
    <a href="{{ route('app.administrator.pengelola-group-pengguna') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-truck-arrow-right"></i></span>
        <span class="nxl-mtext">Pengelola Grup</span>
    </a>
</li>
