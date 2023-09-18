<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">

                    <ul class="navbar-nav mr-auto ml-md-3 my-2 my-md-0">
                        <a class="nav-link disabled" style="font-size: 17px; color: white;">
                            <i class="fas fa-fw fa-bookmark"></i><b>File Surat Keluar</b>
                        </a>
                    </ul>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <li class="nav-item">
                            <a class="nav-link disabled" style="width: 300px;">
                                <marquee>
                                    Aplikasi Pengarsipan Surat | Kantor Pemerintah Negeri Suli | E-Arsip
                                </marquee>
                            </a>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-light-600 text-right" style="font-size: 17px;"><b><?= $username ?></b><br><i><h5 style="font-size: 11px;"><?= $level ?></i></h5></span>
                                <?php
                                require_once 'koneksi.php';
                                $sql = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$_SESSION[username]'");
                                $get = mysqli_fetch_array($sql);
                                ?>
                                <img class="img-profile rounded-circle" src="img/<?=$get['foto']?>" style="width: 50px; height: 48px;">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <?php
                        require_once 'koneksi.php';
                        $Kode_file = $_GET['file'];
                        $data = mysqli_query($koneksi, "SELECT * FROM s_out WHERE file = '$Kode_file'");
                        foreach ($data as $b) {
                    ?>
                        <object data="../Pengarsipan/pdf/<?php  echo $b['file'];?>" width="100%" height="700px" style="border: 1px solid; box-shadow: 2px 2px 8px #000000;"></object>

                    <?php
                        }
                    ?>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Pemerintah Kab.Maluku Tengah Kec.Salahutu Kantor Pemerintah Negeri Suli 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 250px; margin-left: 130px; margin-top: 200px">
                <div class="modal-header p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Info</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-3">Yakin ingin Logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tidak</button>
                    <a class="btn btn-primary" href="logout.php">Ya</a>
                </div>
            </div>
        </div>
    </div>