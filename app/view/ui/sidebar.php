<?php 
if($_SESSION["role"] == ""){
    echo "<script>document.location.href = '../auth/index.php'</script>";
    die;
    exit(0);
}
?>

<?php 
if($_SESSION["role"] == "admin"){
?>
<!-- ======= Header ======= -->

<header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
            Sekolah Apa saja
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto mx-3">
        <ul>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-controls="dropdown">
                    <i class="fa fa-user-alt"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                        <div class="mb-1"></div>
                        <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- ======= Header ======= -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link" href="?page=beranda" aria-current="page">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Data Master</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="?page=siswa" aria-current="page">
                        <i class="bi bi-circle"></i><span>Siswa</span>
                    </a>
                </li>
                <li>
                    <a href="?page=kelas" aria-current="page">
                        <i class="bi bi-circle"></i><span>Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="?page=keamanan" aria-current="page">
                        <i class="bi bi-circle"></i><span>Keamanan</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pelanggaran" aria-current="page">
                        <i class="bi bi-circle"></i><span>Pelanggaran</span>
                    </a>
                </li>
                <li>
                    <a href="?page=sanksi" aria-current="page">
                        <i class="bi bi-circle"></i><span>Sanksi</span>
                    </a>
                </li>
                <li>
                    <a href="?page=walikelas" aria-current="page">
                        <i class="bi bi-circle"></i><span>Wali Kelas</span>
                    </a>
                </li>
                <li>
                    <a href="?page=pengguna" aria-current="page">
                        <i class="bi bi-circle"></i><span>Pengguna</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Components Nav -->

        <li class="nav-item">
            <a href="?page=lihat-siswa" class="nav-link collapsed" aria-current="page">
                <i class="fa fa-user-graduate"></i>
                <span>Master Siswa</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="?page=lihat-kelas" class="nav-link collapsed" aria-current="page">
                <i class="fa fa-school"></i>
                <span>Master Kelas</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="?page=lihat-keamanan" class="nav-link collapsed" aria-current="page">
                <i class="fa fa-lock"></i>
                <span>Master Keamanan</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="?page=lihat-pelanggaran" class="nav-link collapsed" aria-current="page">
                <i class="fa fa-book"></i>
                <span>Master Pelanggaran</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="?page=lihat-sanksi" class="nav-link collapsed" aria-current="page">
                <i class="fa fa-book"></i>
                <span>Master Sanksi</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="?page=lihat-walikelas" class="nav-link collapsed" aria-current="page">
                <i class="fa fa-users"></i>
                <span>Master Wali Kelas</span>
            </a>
        </li>

        <li class="nav-item">
            <a href="?page=lihat-pengguna" class="nav-link collapsed" aria-current="page">
                <i class="fa fa-users"></i>
                <span>Master Pengguna</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                onclick="return confirm('Apakah anda ingin logout ?')">
                <i class="fa fa-sign-out-alt"></i>
                <span>Logout</span>
            </a>
        </li><!-- End Blank Page Nav -->
    </ul>

</aside><!-- End Sidebar-->
<!-- ======= Sidebar ======= -->

<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                </div>

            </div><!-- End Right side columns -->

        </div>
    </section>
    <?php
}else if($_SESSION["role"] == "wali"){
?>
    <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
        <div class="d-flex align-items-center justify-content-between">
            <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
                Sekolah Apa saja
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <nav class="header-nav ms-auto mx-3">
            <ul>
                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                        data-bs-toggle="dropdown" aria-controls="dropdown">
                        <i class="fa fa-user-alt"></i>
                        <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                    </a><!-- End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                            <div class="mb-1"></div>
                            <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                        </li>
                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

        <!-- ======= Sidebar ======= -->
        <aside class="sidebar" id="sidebar">
            <ul class="sidebar-nav" id="sidebar-nav">
                <li class="nav-item">
                    <a href="?page=lihat-siswa" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-user-graduate"></i>
                        <span>Master Siswa</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=lihat-kelas" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-school"></i>
                        <span>Master Kelas</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=lihat-keamanan" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-lock"></i>
                        <span>Master Keamanan</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=lihat-pelanggaran" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-book"></i>
                        <span>Master Pelanggaran</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=lihat-sanksi" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-book"></i>
                        <span>Master Sanksi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=lihat-walikelas" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-users"></i>
                        <span>Master Wali Kelas</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=lihat-pengguna" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-users"></i>
                        <span>Master Pengguna</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=lihat-diskusi" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-file"></i>
                        <span>Laporan Diskusi</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=lihat-laporan" class="nav-link collapsed" aria-current="page">
                        <i class="fa fa-file"></i>
                        <span>Laporan Pelanggaran</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                        onclick="return confirm('Apakah anda ingin logout ?')">
                        <i class="fa fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li><!-- End Blank Page Nav -->
            </ul>
        </aside>
        <!-- ======= Sidebar ======= -->

    </header>
    <!-- ======= Header ======= -->

    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-lg-8">
                    <div class="row">

                    </div>

                </div><!-- End Right side columns -->

            </div>
        </section>
        <?php
}else if($_SESSION["role"] == "bk"){
?>
        <header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
            <div class="d-flex align-items-center justify-content-between">
                <a href="" role="button" class="logo d-flex align-items-center fs-6 fst-normal fw-semibold">
                    Sekolah Apa saja
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <nav class="header-nav ms-auto mx-3">
                <ul>
                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                            data-bs-toggle="dropdown" aria-controls="dropdown">
                            <i class="fa fa-user-alt"></i>
                            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <div class="text-start">username : <?php echo $_SESSION['username'] ?></div>
                                <div class="mb-1"></div>
                                <div class="text-start">Jabatan : <?php echo $_SESSION['role'] ?></div>
                            </li>
                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

            <!-- ======= Sidebar ======= -->
            <aside class="sidebar" id="sidebar">
                <ul class="sidebar-nav" id="sidebar-nav">
                    <li class="nav-item">
                        <a href="?page=lihat-siswa" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-user-graduate"></i>
                            <span>Master Siswa</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=lihat-kelas" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-school"></i>
                            <span>Master Kelas</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=lihat-keamanan" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-lock"></i>
                            <span>Master Keamanan</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=lihat-pelanggaran" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-book"></i>
                            <span>Master Pelanggaran</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=lihat-sanksi" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-book"></i>
                            <span>Master Sanksi</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=lihat-walikelas" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-users"></i>
                            <span>Master Wali Kelas</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=lihat-pengguna" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-users"></i>
                            <span>Master Pengguna</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=lihat-diskusi" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-file"></i>
                            <span>Laporan Diskusi</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="?page=lihat-laporan" class="nav-link collapsed" aria-current="page">
                            <i class="fa fa-file"></i>
                            <span>Laporan Pelanggaran</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" aria-current="page" href="?page=keluar"
                            onclick="return confirm('Apakah anda ingin logout ?')">
                            <i class="fa fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </a>
                    </li><!-- End Blank Page Nav -->
                </ul>
            </aside>
            <!-- ======= Sidebar ======= -->

        </header>
        <!-- ======= Header ======= -->

        <main id="main" class="main">
            <section class="section dashboard">
                <div class="row">

                    <!-- Left side columns -->
                    <div class="col-lg-8">
                        <div class="row">

                        </div>

                    </div><!-- End Right side columns -->

                </div>
            </section>
            <?php
}else{
    echo "<script>document.location.href = '../auth/index.php'</script>";
    die;
    exit(0);

}
?>

            <a href="" class="back-to-top d-flex align-items-center justify-content-center"><i
                    class="bi bi-arrow-up-short"></i></a>