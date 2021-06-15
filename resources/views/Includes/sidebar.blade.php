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
				<li> <a href="{{ route('users.wallet') }}" title="wallet"	class="{{ $page == 'wallet' ? 'active' : '' }}"><i class="lni lni-wallet"></i></a>
						</li>
				<li> <a href="{{ route('users.withdrawal') }}" title="withdrawal" class="{{ $page == 'withdrawal' ? 'active' : '' }}"><i class="lni lni-google-wallet"></i></a>
						</li>
			
				@if(Auth::user()->user_type == "admin" || Auth::user()->user_type  == "support")
				<li>
					<a class="has-arrow" href="javascript:;">
						<div class="parent-icon"><i class="bx bx-repeat"></i>
						</div>
						<div class="menu-title">Media</div>
					</a>
					<ul>
						<li> <a href="#"><i class="bx bx-right-arrow-alt"></i>Page</a></li>
						
					</ul>
				</li>
				<li>
					<a href="{{ route('admin.user.management') }}" class="{{ $page == 'user-management' ? 'active' : '' }}"><i class="lni lni-users"></i>&nbsp;&nbsp;User Management</a>
				</li>
				
				@endif
				
				
			</ul>
			<!--end navigation-->
		</div>