@if(Auth::check())
<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
	<ul class="nav">
		<li class="nav-item">
			<a class="nav-link" href="/admins">
				<i class="menu-icon mdi mdi-television"></i>
				<span class="menu-title">Dashboard</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/admins/order">
				<i class="menu-icon mdi mdi-backup-restore"></i>
				<span class="menu-title">Notifikasi</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/admins/item">
				<i class="menu-icon mdi mdi-chart-line"></i>
				<span class="menu-title">Item</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/admins/akun">
				<i class="menu-icon mdi mdi-table"></i>
				<span class="menu-title">Akun</span>
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="/admins/contoh">
				<i class="menu-icon mdi mdi-sticker"></i>
				<span class="menu-title">Portofolio</span>
			</a>
		</li>
	</ul>
</nav>
<!-- partial -->
@endif
