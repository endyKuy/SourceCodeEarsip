<?php
    if ($level == 'Staf') {
        echo "
        <script>
            alert('Error!');
            window.location.href = 'index.php?page=beranda';
        </script>";
    }
?>
<div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">

                    <ul class="navbar-nav mr-auto ml-md-3 my-2 my-md-0">
                        <a class="nav-link disabled" style="font-size: 17px; color: white;">
                            <i class="fas fa-fw fa-bookmark"></i><b>Manajemen User</b>
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

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                             <button type="button" class="btn btn-primary mt-auto " data-toggle="modal" data-target="#exampleModal">
                                Tambah Data
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table">
                                <table class="table table-striped table-hover text-center table-secondary table-bordered text-dark" id="dataTable" width="100%" cellspacing="3">
                                    <thead>
                                        <tr>
                                            <th style="width: 70px;">No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Jabatan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                     <?php
                                          require_once 'koneksi.php';
                                          $sql = mysqli_query($koneksi, "SELECT * FROM login");
                                          $no = 0;
                                          while ($b = mysqli_fetch_array($sql))
                                          { 
                                          $no++?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= $b['nama'] ?></td>
                                            <td><?= $b['username'] ?></td>
                                            <td><?= $b['level'] ?></td>
                                            <td>
                                                <a class="btn-sm btn-warning p-1" data-toggle="modal" data-target="#editModal<?=$no?>"><i class="fas fa-wrench p-1"></i></a>
                                                <a href="index.php?page=deluser&id=<?=$b['id']?>" class="btn-sm btn-danger p-1" style="cursor: pointer; text-decoration: none;" onclick="return confirm('Hapus Data?')"><i class="fas fa-trash p-1"></i>
                                                </a>
                                            </td>
                                        </tr>

<div class="modal fade" id="editModal<?=$no?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
                 <div class="modal-header">
                    <h2>Edit User</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                     </button>
                </div>
            <div class="modal-body">
                <form action="index.php?page=edituser" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="formGroupExampleInput2">Nama</label>
                            <input type="text" class="form-control" name="nama" value="<?=$b['nama']?>">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="formGroupExampleInput2">Username</label>
                            <input type="text" class="form-control" name="username" value="<?=$b['username']?>" readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="text" class="form-control" name="password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="formGroupExampleInput2">Level</label>
                            <select name="level" class="form-control">
                                <option value="<?=$b['level']?>"><?=$b['level']?></option>
                                <option>Staf</option>
                                <option>Kepala Desa</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lhr" value="<?=$b['tgl_lhr']?>">
                    </div>
                    </div>
                    <div class="form-group">
                            <label for="formGroupExampleInput2">No. Telp</label>
                            <input type="text" class="form-control" name="no_telp" value="<?=$b['no_telp']?>">
                    </div>
                     <div class="form-row">
                        <div class="col-md-8 mb-3">
                            <label for="formGroupExampleInput2">Foto</label>
                            <input type="file" class="form-control" name="foto">
                        </div>
                        <div class="col-md-4 mb-3">
                            <br>
                            <img class="img-profile rounded-circle" src="img/<?=$b['foto']?>" style="width: 90px; height: 88px; margin-left: 27px; border: 2px solid grey;">
                            <h5 style="margin-left: 24px;"><?=$b['foto']?></h5>
                        </div>
                     </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                    </div>            
                    </form>
            </div>
        </div>
    </div>
</div>
                                    <?php } ?> 
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container mb-2">
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-header">
                    <h2>Input User</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                     </button>
                </div>
                <div class="modal-body">
                    <form action="index.php?page=saveuser" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-12 mb-3">
                            <label for="formGroupExampleInput2">Nama</label>
                            <input type="text" class="form-control" name="nama" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="formGroupExampleInput2">Username</label>
                            <input type="text" class="form-control" name="username" required="">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formGroupExampleInput2">Password</label>
                            <input type="text" class="form-control" name="password" required="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label for="formGroupExampleInput2">Level</label>
                            <select name="level" class="form-control" required="">
                                <option>Staf</option>
                                <option>Kepala Desa</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="formGroupExampleInput2">Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tgl_lhr" required="">
                    </div>
                    </div>
                    <div class="form-group">
                            <label for="formGroupExampleInput2">No. Telp</label>
                            <input type="text" class="form-control" name="no_telp" required="">
                    </div>
                     <div class="form-group">
                            <label for="formGroupExampleInput2">Foto</label>
                            <input type="file" class="form-control" name="foto" required="">
                     </div>
                    <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>            
                    </form>
                </div>
            </div>
        </div>
    </div>