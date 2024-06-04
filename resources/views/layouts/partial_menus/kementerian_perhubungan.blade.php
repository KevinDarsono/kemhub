<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.nasional.dashboard', 'active') }}">
    <a href="{{ route('app.nasional.dashboard') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-gauge-high"></i></span>
        <span class="nxl-mtext">Dashboard</span>
    </a>
</li>

<li class="nxl-item nxl-hasmenu {{ set_active_menu(
    ['app.administrator.master-data.*'],
    'nxl-trigger') }}">
    <a href="javascript:void(0);" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-table"></i></span>
        <span class="nxl-mtext">Monitoring</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
    </a>
    <ul class="nxl-submenu">
        <li class="nxl-item {{ set_active_menu('app.nasional.trayek.list', 'active') }}">
            <a class="nxl-link" href="{{ route('app.nasional.trayek.list') }}">Rute Trayek</a>
        </li>
    </ul>
</li>



{{-- <li class="nxl-item nxl-hasmenu">
    <a href="" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
        <span class="nxl-mtext">Monitoring</span>
    </a>
</li> --}}

<li class="nxl-item nxl-hasmenu {{ set_active_menu('app.nasional.perusahaan.*', 'active') }}">
    <a href="{{ route('app.nasional.perusahaan.index') }}" class="nxl-link">
        <span class="nxl-micon"><i class="fa-solid fa-building"></i></span>
        <span class="nxl-mtext">Perusahaan</span>
    </a>
</li>
