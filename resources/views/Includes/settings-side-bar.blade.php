<div class="sidebar-wrapper" data-simplebar="true">
			<div class="sidebar-header">
				<div>
				<a href="{{ route('user.dashboard') }}">
					<img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
				</a>
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
					<a href="{{ route('users.settings') }}" class="{{ $page == 'settings-dashboard' ? 'active' : '' }}">
						<div class="parent-icon"><i class="fadeIn animated bx bx-tachometer"></i>
						</div>
						<div class="menu-title">Dashboard</div>
					</a>
				</li>
				<li>
					<a href="{{ route('users.settings.security') }}" class="">
						<div class="parent-icon"><i class="lni lni-lock-alt"></i>
						</div>
						<div class="menu-title">Security</div>
					</a>
				</li>
                <li>
					<a href="#" class="">
						<div class="parent-icon">
						<i class="lni lni-user"></i>
						</div>
						<div class="menu-title">Profile</div>
					</a>
				</li>
			</ul>
			<!--end navigation-->
		</div>