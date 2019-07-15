<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center"
   href="{{Auth::user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard')}}">
    <div class="sidebar-brand-icon ml-0 mr-0 " style="width:100%">
        <img src="{{asset('img/logoBI2.png')}}" style="width: 30%">
    </div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item {{\Illuminate\Support\Facades\Request::is('user_dashboard*','admin/dashboard*') ? 'active' : ''}}">
    <a class="nav-link" href="{{Auth::user()->isAdmin() ? route('admin.dashboard') : route('user.dashboard')}}">
        <i class="fas fa-fw fa-home"></i>
        <span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
@if(Auth::user()->isAdmin())
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('admin/ruang*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.ruang')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Manage Peminjaman Ruang</span></a>
    </li>
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('admin/rumah*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.rumah')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Manage Peminjaman Rumah</span></a>
    </li>
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('admin/mobil*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.mobil')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>Manage Peminjaman Mobil</span></a>
    </li>
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('admin/komplain*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('admin.komplain')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Manage Complaints</span></a>
    </li>
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('admin/barang*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('barang')}}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Manage Barang</span></a>
    </li>
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('user*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('user')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Manage User</span></a>
    </li>
@else
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('listpinjam*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('listpinjam')}}">
            <i class="fas fa-fw fa-table"></i>
            <span>List Peminjaman</span></a>
    </li>
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('ajukanpinjam*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('ajukanpinjam')}}">
            <i class="fas fa-fw fa-folder"></i>
            <span>Ajukan Peminjaman</span></a>
    </li>
    <li class="nav-item {{\Illuminate\Support\Facades\Request::is('komplain*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('info.komplain')}}">
            <i class="fas fa-fw fa-warehouse"></i>
            <span>Ajukan Komplain</span></a>
    </li>
@endif

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>