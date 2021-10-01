<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>P.T Saputra Tirtha Amertha &mdash; Dashboard</title>
    <link rel="icon" href="{{ asset('img/icon.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('stisla/modules/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/modules/fontawesome/css/all.min.css')}}">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables/datatables.min.css')}}">
    <link rel="stylesheet"
        href="{{asset('stisla/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('stisla/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css')}}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('stisla/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('stisla/css/components.css')}}">

    <style>

    </style>

    @yield('additional-css')

</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
                                    class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ asset('stisla/img/avatar/avatar-1.png')}}"
                                class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display:none;">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/">Saputra</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="/">
                            <img src="{{ asset('img/icon.png') }}" alt="primakara-logo" title="sibook">
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="{{ Request::route()->getName() == 'home' ? ' active' : '' }}">
                            <a class="nav-link" href="{{route('home')}}">
                                <i class="fas fa-tachometer-alt"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        @if (auth()->user()->jabatan == 'admin')

                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="fas fa-folder-open"></i>
                                <span>Master Data</span>
                            </a>
                            <ul class="dropdown-menu" style="display: block;">
                                <li class="{{ Request::route()->getName() == 'data-akun.index' ? ' active' : '' }}"><a
                                        class="nav-link" href="{{ route('data-akun.index') }}">Data Akun</a></li>
                                <li class="{{ Request::route()->getName() == 'data-customer.index' ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('data-customer.index') }}">Data Customer</a>
                                </li>
                                <li class="{{ Request::route()->getName() == 'data-kategori.index' ? ' active' : '' }}">
                                    <a class="nav-link" href="{{ route('data-kategori.index') }}">Data Kategori</a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a class="nav-link" href="#">
                                <i class="far fa-building"></i>
                                <span>Data Proyek</span>
                            </a>
                        </li>

                        <li class="{{ Request::route()->getName() == 'pemasukan-kas.index' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('pemasukan-kas.index') }}">
                                <i class="fas fa-plus"></i>
                                <span>Pemasukan Kas</span>
                            </a>
                        </li>

                        <li class="{{ Request::route()->getName() == 'pengeluaran-kas.index' ? ' active' : '' }}">
                            <a class="nav-link" href="{{ route('pengeluaran-kas.index') }}">
                                <i class="fas fa-minus"></i>
                                <span>Pengeluaran Kas</span>
                            </a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                                <i class="fas fa-car"></i>
                                <span>Aset</span>
                            </a>
                            <ul class="dropdown-menu" style="display: block;">
                                <li><a class="nav-link" href="#">Aset Aktif</a></li>
                                <li><a class="nav-link" href="#">Penyusutan</a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="nav-link" href="#">
                                <i class="fas fa-paste"></i>
                                <span>Data Jurnal Umum</span>
                            </a>
                        </li>

                        <li>
                            <a class="nav-link" href="#">
                                <i class="fas fa-book"></i>
                                <span>Tutup Buku</span>
                            </a>
                        </li>
                        @endif

                        {{-- <li>
                            <a class="nav-link" href="#">
                                <i class="fas fa-file-contract"></i>
                                <span>List Peminjaman</span>
                            </a>
                        </li> --}}
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    @yield('content')
                </section>
            </div>
            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; {{ date('Y') }}
                    <div class="bullet"></div> P.T Saputra Tirtha Amertha | By <a href="#">Dharma Prabawa
                        Sista</a>
                </div>
                <div class="footer-right">

                </div>
            </footer>
        </div>
    </div>

    @yield('modals')

    <!-- General JS Scripts -->
    <script src="{{ asset('stisla/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('stisla/modules/popper.js')}}"></script>
    <script src="{{ asset('stisla/modules/tooltip.js')}}"></script>
    <script src="{{ asset('stisla/modules/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('stisla/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
    <script src="{{ asset('stisla/modules/moment.min.js')}}"></script>
    <script src="{{ asset('stisla/js/stisla.js')}}"></script>

    <!-- JS Libraies -->
    <script src="{{asset('stisla/modules/datatables/datatables.min.js')}}"></script>
    <script src="{{asset('stisla/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('stisla/modules/datatables/Select-1.2.4/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('stisla/modules/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Page Specific JS File -->
    <script src="{{asset('stisla/js/page/modules-datatables.js')}}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('stisla/js/scripts.js')}}"></script>
    <script src="{{ asset('stisla/js/custom.js')}}"></script>
</body>

</html>