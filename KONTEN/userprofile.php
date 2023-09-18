<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">

                    <ul class="navbar-nav mr-auto ml-md-3 my-2 my-md-0">
                        <a class="nav-link disabled" style="font-size: 17px; color: white;">
                            <i class="fas fa-fw fa-bookmark"></i><b>User Profile</b>
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
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-12 col-md-9">
                            <div class="card-body p-0 bg-secondary">
                                <form>
                                    <div class="row">
                                        <div class="col-lg-5 d-none d-lg-block">
                                            <?php
                                            require_once 'koneksi.php';
                                            $sql = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$_SESSION[username]'");
                                            $get = mysqli_fetch_array($sql);
                                            ?>
                                            <img class="img-profile" src="img/<?=$get['foto']?>" style="width: 310px; height: 470px;">
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="p-3 text-light">
                                                <h4 style="letter-spacing: 4px">Nama</h4>
                                                <h4 style="margin-bottom: 22px;"><b><i><?php echo "$get[nama]" ?></i></b></h4>
                                                <h4 style="letter-spacing: 4px">Username</h4>
                                                <h4 style="margin-bottom: 22px;"><b><i><?php echo "$get[username]" ?></i></b></h4>
                                                <h4 style="letter-spacing: 4px">Jabatan</h4>
                                                <h4 style="margin-bottom: 22px;"><b><i><?php echo "$get[level]" ?></i></b></h4>
                                                <h4 style="letter-spacing: 4px">Tanggal Lahir</h4>
                                                <h4 style="margin-bottom: 22px;"><b><i><?php echo "$get[tgl_lhr]" ?></i></b></h4>
                                                <h4 style="letter-spacing: 4px">No. Telepon</h4>
                                                <h4 style="margin-bottom: 22px;"><b><i><?php echo "$get[no_telp]" ?></i></b></h4>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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