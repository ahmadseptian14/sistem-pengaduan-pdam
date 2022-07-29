<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <img src="{{asset('/assets/img/logo-telkom.png')}}" alt="">
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('pengaduan.index')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Pengaduan</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('cetak.form')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Export Laporan Pengaduan</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('penilaian.index')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Penilaian</span></a>
    </li>


    <li class="nav-item active">
        <a class="nav-link" href="{{route('petugas.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Petugas</span></a>
    </li>

    <li class="nav-item active">
        <a class="nav-link" href="{{route('customer.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Customer</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>