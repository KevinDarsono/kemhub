<nav class="nxl-navigation">
    <div class="navbar-wrapper">
        <div class="m-header">
            <a href="javascript:void(0)" class="b-brand">
                <img src="{{ asset('logo_with_name.png') }}" class="logo logo-lg" style="width: 100%">
                <img src="{{ asset('logo-kemenhub.png') }}" class="logo logo-sm" style="width: 100%">
            </a>
        </div>
        <div class="navbar-content">
            <ul class="nxl-navbar">
                <li class="nxl-item nxl-caption classRoleHide">
                    <h6 style="font-size: .6375rem;">{{ App\Constants\Roles::getAllRole()[Auth::user()->code_role] }}</h6>
                    @if(Auth::user()->provinsi != null)
                        <p style="margin-bottom:0px;">{{ Auth::user()->provinsi->nama }} - {{ Auth::user()->kota->nama }}</p>
                    @endif
                </li>
                <li class="nxl-item nxl-caption">
                    <label>Navigation</label>
                </li>
                @include('layouts.partial_menus.'.Auth::user()->code_role.'')
            </ul>
        </div>
    </div>
</nav>