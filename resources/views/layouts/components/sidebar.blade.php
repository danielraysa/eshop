<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="#">
            <span class="align-middle">{{ env('APP_NAME') }}</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>

            <li class="sidebar-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('dashboard') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            {{-- <li class="sidebar-item {{ Route::currentRouteName() == 'barang' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('barang.index') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Data Barang</span>
                </a>
            </li> --}}
            <li class="sidebar-item {{ Request::is('kategori*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('kategori.index') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Data Kategori</span>
                </a>
            </li>
            <li class="sidebar-item {{ Request::is('barang*') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('barang.index') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Data Barang</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href="#auth" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Data User</span>
                </a>
                <ul id="auth" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-in.html">Sign In</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="pages-sign-up.html">Sign Up</a></li>
                </ul>
            </li>

            <li class="sidebar-item {{ Route::currentRouteName() == 'penjualan' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('penjualan') }}">
                    <i class="align-middle" data-feather="edit-3"></i> <span class="align-middle">Penjualan</span>
                </a>
            </li>

            <li class="sidebar-item {{ Route::currentRouteName() == 'report' ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ route('report') }}">
                    <i class="align-middle" data-feather="book"></i> <span class="align-middle">Report</span>
                </a>
            </li>

            {{-- <li class="sidebar-header">
                Tools & Components
            </li>
            <li class="sidebar-item">
                <a data-bs-target="#ui" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="briefcase"></i> <span class="align-middle">UI
                        Elements</span>
                </a>
                <ul id="ui" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-alerts.html">Alerts</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-buttons.html">Buttons</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-cards.html">Cards</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-general.html">General</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-grid.html">Grid</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="ui-typography.html">Typography</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="icons-feather.html">
                    <i class="align-middle" data-feather="coffee"></i> <span class="align-middle">Icons</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="forms-basic-inputs.html">
                    <i class="align-middle" data-feather="check-circle"></i> <span class="align-middle">Forms</span>
                </a>
            </li> --}}

            
        </ul>

    </div>
</nav>
