<ul class="navbar-nav ml-auto">
    
    
    <h3 style="margin-right: 300px; margin-top: 20px">Layanan Pengaduan Pelanggan Perusahaan Daerah Air Minum</h3>
    <!-- Nav Item - User Information -->
    <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::user()->name}}</span>
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{route('password.edit')}}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Ubah Password
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
        </div>
    </li>

</ul>