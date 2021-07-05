<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
					<img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">allresources</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<!--navigation-->
			<ul class="metismenu" id="menu">
				<li>
					<a href="{{ route('user.dashboard') }}" class="{{ $page == 'dashboard' ? 'active' : '' }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-tachometer"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
					@if(Auth::user()->user_type == "admin" || Auth::user()->user_type  == "support")
						<a href="{{ route('admin.dashboard') }}" class="{{ $page == 'admin' ? 'show-sub active' : '' }}">
							<div class="parent-icon">
								<i class="fadeIn animated bx bx-shield-quarter"></i>
							</div>
							<div class="menu-title">Admin</div>
						</a>
					@endif
				</li>
				<li> <a href="{{ route('users.wallet') }}" title="wallet"	class="{{ $page == 'wallet' ? 'active' : '' }}">
						<div class="parent-icon"><i class="lni lni-wallet"></i></div>
						<div class="menu-title">Wallet</div>
					</a>
				</li>
				@if(Auth::user()->user_type === "regular")
					<li> <a href="{{ route('users.transaction-history') }}" title="transaction" class="{{ $page == 'transaction' ? 'active' : '' }}">
							<div class="parent-icon">
								<i class="lni lni-google-wallet"></i>
							</div>
							<div class="menu-title">Transactions</div>
						</a>
					</li>
				@endif
			
				@if(Auth::user()->user_type === "admin" || Auth::user()->user_type  === "support")
				
				<li> <a href="{{ route('admin.user.management') }}" title="user management" class="{{ $page == 'user-management' ? 'active' : '' }}">
						<div class="parent-icon">
						<i class="lni lni-users"></i>
						</div>
						<div class="menu-title">User Management</div>
					</a>
				</li>

				<li> <a href="{{ route('admin.assets') }}" title="user management" class="{{ $page == 'assets' ? 'active' : '' }}">
						<div class="parent-icon">
	
						<i class="fadeIn animated bx bx-cube-alt"></i>
						</div>
						<div class="menu-title">Assets</div>
					</a>
				</li>
				<li> <a href="{{ route('admin.transactions') }}" title="users transactions" class="{{ $page == 'alltransactions' ? 'active' : '' }}">
						<div class="parent-icon">
						
						<i class="fadeIn animated bx bx-notification"></i>
						</div>
						<div class="menu-title">Manage Transaction</div>
					</a>
				</li>
				@endif
				
				
			</ul>
			<!--end navigation-->
		</div>