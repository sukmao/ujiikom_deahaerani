<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <span class="brand-text font-weight-light">NGADU</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user8-128x128.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Admin</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="/dashboard" class="nav-link {{ Route::is('/dashboard*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/masyarakat" class="nav-link {{ Route::is('/masyarakat*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Masyarakat
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/pegawai" class="nav-link{{ Route::is('/pegawai*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Pegawai
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/kategori" class="nav-link {{ Route::is('/kategori*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Kategori Pengaduan
                        </p>
                    </a>
                </li>
                <li class="nav-header">LAPORAN</li>
                <li class="nav-item">
                    <a href="/laporanmasuk" class="nav-link {{ Route::is('/laporsanmasuk*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Laporan Masuk
                        </p>
                    </a>
                </li>
                <li class="nav-header">Report</li>
                <li class="nav-item">
                    <a href="/generatereport" class="nav-link {{ Route::is('/generatereport*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-print"></i>
                        <p>
                            Generate Report
                        </p>
                    </a>
                </li>
                <button class="btn btn-secondary btn-md">
                    <li class="fa fa-sign-out-alt"></li> Logout
                </button>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>