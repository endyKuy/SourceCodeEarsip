<?php
    session_start();
    require_once 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>E-Arsip | Login</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-dark">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="img/logo.png" style="width: 250px; height: 255px; margin-top: 133px; margin-left: 120px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4" style="margin-top: 50px; font-size: 40px;">Login | <b>E-Arsip</b></h1>
                                    </div>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <label for="user" style="margin-top: 20px;">Username</label>
                                            <input type="text" class="form-control form-control-user"
                                                name="username" autocomplete="off" placeholder="Masukan username...">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-user"
                                                name="password" autocomplete="off" placeholder="Masukan Password...">
                                        </div>
                                        <button type="submit" name="login" class="btn btn-primary btn-user btn-block" type="button" style="margin-top: 60px;">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    <?php  
            if (isset($_POST['login'])) 
            {
                $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
                $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

                if (empty($username) || empty($password)) 
                {
                    echo "<script>
                            alert('Data Tidak Boleh Kosong');
                            window.location.href = 'login.php';
                        </script>";
                }
                else
                {
                    
                    $cek = mysqli_query($koneksi, "SELECT * FROM login WHERE username = '$username'");
                    $data = mysqli_fetch_array($cek);
                    $jml = mysqli_num_rows($cek);
        
                    if ($jml > 0) 
                    {
                        if (password_verify($password, $data['password']))
                        {
                            $_SESSION['username'] = $data['username'];
                            $_SESSION['level'] = $data['level'];

                            echo "<script>
                                alert('Login Berhasil!');
                                window.location.href = 'index.php';
                            </script>";
                        }
                        else
                        {
                            echo "<script>
                                alert('Username/Password Anda Salah');
                                window.location.href = 'login.php';
                            </script>";

                        }
                    }
                    else
                    {
                        echo "<script>
                            alert('Username/Password Anda Salah');
                            window.location.href = 'login.php';
                        </script>";
                    }

                }
            }
        ?>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>
</html>