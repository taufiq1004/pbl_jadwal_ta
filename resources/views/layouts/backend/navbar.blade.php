<!-- Sidebar -->
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4" id="sidenav-main">
    <!-- Sidebar Header -->
    <div class="sidenav-header">
        <!-- Close Sidebar Icon -->
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <!-- Brand Logo and Title -->
        <a class="navbar-brand m-0" href="#">
            <img src="{{ asset('images/garuda2.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold">SIPSITA</span>
        </a>
    </div>
    <!-- Sidebar Menu -->
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <!-- Dashboard Menu Item -->
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <!-- User Menu Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('users.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <!-- Admin Only Menu Items -->
            @hasrole('admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('prodi.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-graduation-cap text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Program Studi</span>
                </a>
            </li>
            @endhasrole
            <!-- Student Menu Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('students.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-graduate text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Student</span>
                </a>
            </li>
            <!-- Lecturer Menu Item -->
          @hasrole('admin')
            <li class="nav-item">
                <a class="nav-link" href="{{ route('lecturers.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-chalkboard-teacher text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Lecturer</span>
                </a>
            </li>
            @endhasrole
            <!-- Session Menu Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('session.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Jadwal Sidang TA</span>
                </a>
            </li>
            <!-- Penilaian Menu Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('penilaian.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Penilaian Sidang TA</span>
                </a>
            </li>
            <!-- Thesis Menu Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('thesis.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-book text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Thesis</span>
                </a>
            </li>
            <!-- Validasi TA Menu Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('validasiTa.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Validasi TA</span>
                </a>
            </li>
            <!-- Room Menu Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('room.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-door-open text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Rooms</span>
                </a>
            </li>
            <!-- Sesi Menu Item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('sesi.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-clock text-warning text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Sesi</span>
                </a>
            </li>
        </ul>
    </div>
  </aside>
  <!-- Main Content Area -->
  <main class="main-content position-relative border-radius-lg">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="false">
        <!-- Breadcrumb Navigation -->
        <div class="container-fluid py-1 px-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="#">Halaman</a></li>
                    <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                </ol>
                <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
            </nav>
            <!-- Search Input and Logout Button -->
            <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Cari disini...">
                    </div>
                </div>
                <!-- Notification and Logout Button -->
                <ul class="navbar-nav justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <a href="#" class="nav-link font-weight-bold px-3">
                            <i class="fa fa-bell me-1 text-primary"></i>
                            <span class="d-sm-inline d-none text-dark">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-item d-flex align-items-center">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                           class="nav-link font-weight-bold px-3">
                            <i class="fas fa-sign-out-alt me-1 text-danger"></i>
                            <span class="d-sm-inline d-none text-dark">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
  </main>
