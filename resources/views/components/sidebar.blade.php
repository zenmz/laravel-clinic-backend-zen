<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">FIC Clinic</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Page</li>
            <li class="nav-item dropdown">
                <a href="#"
                    class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('home') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('home') }}">Dashboard</a>
                    </li>
                    <li class="{{ Request::is('user') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('user') }}">Users</a>
                    </li>
                    <li class="{{ Request::is('doctor') ? 'active' : '' }}">
                        <a class="nav-link"
                            href="{{ url('doctor') }}">Doctors</a>
                    </li>
                </ul>
            </li>

    </aside>
</div>
