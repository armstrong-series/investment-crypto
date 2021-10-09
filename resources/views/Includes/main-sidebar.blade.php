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
                    @if(Auth::user()->user_type === "admin" || Auth::user()->user_type  === "support")
                        <li class="{{ $page == 'admin' ? 'active' : '' }}"><a href="{{ route('admin.dashboard') }}"><i class="fas fa-user-shield"></i>&nbsp;&nbsp;<span>Administrator</span></a></li>
                    @endif
                    <li class="treeview {{ $page == 'page' ? 'active' : '' }}">
                        <a href="#"><i class="fad fa-browser"></i>&nbsp;&nbsp;<span>Apps</span> <i class="fa fa-angle-right"></i></a>
                        <ul class="treeview-menu"> 
                        <li class="{{ $page == 'wallet' ? 'active' : '' }}"><a href="{{ route('users.wallet') }}"><i class="fas fa-wallet"></i>&nbsp;&nbsp;<span>Wallet</span></a></li>

                        @if(Auth::user()->user_type === "regular")
                            <li  class="{{ $page == 'transaction' ? 'active' : '' }}"><a href="{{ route('users.transaction-history') }}"><i class="zmdi zmdi-card"></i>&nbsp;&nbsp;<span>Transactions</span></a></li>
                        @endif
                         
                        </ul>
                    </li>
                    
				    @if(Auth::user()->user_type === "admin" || Auth::user()->user_type  === "support")
                        <li class="{{ $page == 'user-management' ? 'active' : '' }}"><a href="{{ route('admin.user.management') }}"><i class="fas fa-users"></i>&nbsp;&nbsp;<span>User Management</span></a></li>
                        <li class="{{ $page == 'alltransactions' ? 'active' : '' }}"><a href="{{ route('admin.transactions') }}"><i class="fas fa-tasks"></i>&nbsp;&nbsp;<span>Manage Transactions</span></a></li>
                    @endif
                    <li class="{{ $page === 'settings' ? 'active' : '' }}"><a href="{{ route('users.settings') }}" title="settings"><i class="zmdi zmdi-brightness-7 profile-icon" aria-hidden="true"></i>&nbsp;&nbsp;<span>Settings</span></a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

