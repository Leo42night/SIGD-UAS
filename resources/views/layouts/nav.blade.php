<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="index.html">
            <span class="align-middle">AdminKit</span>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::routeIs(['home', 'dashboard']) ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('home') }}">
                    <i class="align-middle" data-feather="map"></i> <span class="align-middle">Maps</span>
                </a>
            </li>

            <li class="sidebar-item {{ Request::routeIs(['places.*']) ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('places.index') }}">
                    <i class="align-middle" data-feather="server"></i> <span class="align-middle">Kelola Lokasi</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::routeIs(['simulasi']) ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('simulasi') }}">
                    <i class="align-middle" data-feather="navigation"></i> <span class="align-middle">Simulasi
                        Navigasi</span>
                </a>
            </li>
        </ul>
        <div class="sidebar-cta" style="display:relative;margin-bottom:20vh">
            <div class="sidebar-cta-content">
                <div class="d-grid">
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                </div>
            </div>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </div>
</nav>
