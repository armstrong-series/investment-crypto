<div class="ecaps-sidemenu-area">
            <!-- Desktop Logo -->
    <div class="ecaps-logo">
        <a href="#"><img class="desktop-logo" src="{{ asset('clusterwink_logo.png') }}" width="50" height="50" alt="Desktop Logo">
            <img class="small-logo" src="{{ asset('clusterwink_logo.png') }}" width="50" height="50" alt="Mobile Logo">
        </a>
    </div>
    <!-- Side Nav -->
    <div class="ecaps-sidenav" id="ecapsSideNav">
        <!-- Side Menu Area -->
        <div class="side-menu-area">
            <!-- Sidebar Menu -->
            <nav>
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="{{ $page == 'dashboard' ? 'active' : '' }}"><a href="{{ route('user.dashboard') }}"><i class="zmdi zmdi-view-web"></i>&nbsp;&nbsp;<span>Dashboard</span></a></li>
                    <li class="{{ $page == 'dashboard' ? 'active' : '' }}"><a href="#"><i class="zmdi zmdi-view-web"></i>&nbsp;&nbsp;<span>Security</span></a></li>
                    <li class="{{ $page == 'dashboard' ? 'active' : '' }}"><a href="#"><i class="zmdi zmdi-view-web"></i>&nbsp;&nbsp;<span>Tokens</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

