<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <img src="{{asset('/assets/img/LOGO-PDAM.png')}}" alt="">
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    @if (Auth::user()->roles == 'PELANGGAN')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('pengaduan.pelanggan')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Lihat Data Pengaduan</span></a>
    </li>
    @endif

    {{-- <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> --}}
 

    @if (Auth::user()->roles == 'ADMIN')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('pengaduan.index')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Lihat Data Pengaduan</span></a>
    </li>
    @endif

    @if (Auth::user()->roles == 'TEKNISI')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('pengaduan.index')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Lihat Data Pengaduan</span></a>
    </li>
    @endif
  
    @if (Auth::user()->roles == 'ADMIN')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('petugas.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Data Jabatan</span></a>
    </li>
    @endif

    @if (Auth::user()->roles == 'ADMIN')
    <li class="nav-item active">
        <a class="nav-link" href="{{route('grafik.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Lihat Grafik Penilaian</span></a>
    </li>
    @endif

    @if (Auth::user()->roles == 'PIMPINAN') 
    <li class="nav-item active">
        <a class="nav-link" href="{{route('grafik.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>Lihat Grafik Penilaian</span></a>
    </li>
    @endif
  
    
   

    
   

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>