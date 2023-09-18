<?php
    session_start();
    require_once 'koneksi.php';

    if (empty($_SESSION['username'])) 
    {
        echo "<script>
            alert('Anda Belum Login');
            window.location.href = 'login.php';
        </script>";
    }
    else
    {
        $username = $_SESSION['username'];
        $level = $_SESSION['level'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Arsip</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body id="page-top">
    <div id="wrapper">
    <?php 
    if ($level == "Kepala Desa") 
        {
        echo '

        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=beranda" style="height: 150px;">
                <img src="img/logo.png" style="width: 100px; height: 105px;">
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Home -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=beranda">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Manajemen"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Manajemen Surat</span>
                </a>
                <div id="Manajemen" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?page=s_in">Surat Masuk</a>
                        <a class="collapse-item" href="index.php?page=s_out">Surat Keluar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#agenda"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder-open"></i>
                    <span>Agenda Surat</span>
                </a>
                <div id="agenda" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?page=agenda_sin">Surat Masuk</a>
                        <a class="collapse-item" href="index.php?page=agenda_sout">Surat Keluar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=datauser">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Manajemen User</span>
                </a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=userprofile">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>User Profile</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
             <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    ';
    }
    else
    {
       echo '
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Logo -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php?page=beranda" style="height: 150px;">
                <img src="img/logo.png" style="width: 100px; height: 105px;">
            </a>

            <!-- Pembatas -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Beranda -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=beranda">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <!-- Pembatas -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Menu Agenda Surat -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#agenda"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Agenda Surat</span>
                </a>
                <div id="agenda" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="index.php?page=agenda_sin">Surat Masuk</a>
                        <a class="collapse-item" href="index.php?page=agenda_sout">Surat Keluar</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Menu User Profile -->
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=userprofile">
                    <i class="fas fa-fw fa-id-card"></i>
                    <span>User Profile</span>
                </a>
            </li>

            <!-- Pembatas -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-power-off"></i>
                    <span>Logout</span>
                </a>
            </li>

            <!-- Pembatas -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
             <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
    ';
    }
?>

        <?php  
            $direct = "KONTEN";
            $page = @$_GET['page'];
            if (empty($page)) {
                require_once"$direct/beranda.php";
            }else{
                require_once"$direct/$page.php";
            }
        ?>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="js/sb-admin-2.min.js"></script>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        <script src="js/demo/datatables-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="dist/sweetalert2.all.min.js"></script>
    </div>
</body>
</html>
<?php } ?>