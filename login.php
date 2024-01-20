<?php
ob_start(); // Menyimpan output di dalam buffer
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include("conf/app.php");

// Check apakah tombol login ditekan 
if (isset($_POST["login"])) {
    // Ambil input username dan password dari form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // Buat prepared statement
    $stmt = $db->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check apakah username ditemukan
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Check password
        if (password_verify($password, $row['password'])) {
            // Set session
            $_SESSION['login']    = true;
            $_SESSION['id_user']  = $row['id_user'];
            $_SESSION['nama']     = $row['nama'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['level']    = $row['level'];

            // Debugging: Tampilkan nilai session
            error_log(print_r($_SESSION, true));
            
            // Akhiri output buffering dan kirimkan ke browser
            ob_end_flush();
            
            // Mengarahkan pengguna ke halaman index.php
            header("location: index.php");
            exit;
        }
    }

    // Jika login tidak berhasil, tampilkan SweetAlert2
    echo "<script>
            $(document).ready(function() {
                swal.fire({
                    title: 'Username atau Password Salah!',
                    text: 'Silakan coba lagi.',
                    icon: 'error',
                    button: 'OK',
                });
            });
          </script>";
    $error = true;
}
ob_end_flush(); // Akhiri output buffering dan kirimkan ke browser
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My_Bkm | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Sweetalert 2 -->
    <link rel="stylesheet" href="assets_template/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets_template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="assets_template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <style>
        body {
            width: 100%;
            margin: 0 auto;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            transition: background-image 1s ease-in-out;
            position: relative;
        }

        .login-logo a {
            color: whitesmoke !important;
            font-size: 70px;
            text-shadow: 6px 6px 12px rgba(0, 0, 0, 0.5);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .indicator {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
        }

        .indicator-dot {
            width: 10px;
            height: 10px;
            background-color: black;
            border-radius: 50%;
            margin: 0 5px;
            cursor: pointer;
        }

        .login-box {
            max-width: 100%;
        }

        .card {
            max-width: 100%;
        }

        .login-card-body {
            max-width: 100%;
        }

        .form-signin {
            max-width: 100%;
        }

        .btn-block {
            max-width: 100%;
        }
    </style>

    <link rel="stylesheet" href="assets_template/dist/css/adminlte.min.css">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>
<body class="hold-transition login-page">
    <img class="mb-3" src="assets/img/logo.png" alt="" width="200" height="195">
    <div class="login-box">
        <!-- /.login-logo -->
        <main class="form-signin">
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Masuk untuk memulai apps ini</p>
                    <form action="login.php" method="post">
                        <div class="input-group mb-3">
                            <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-success btn-block" name="login">Masuk</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.login-card-body -->
            </div>
        </main>
    </div>

    <!-- jQuery -->
    <script src="assets_template/plugins/jquery/jquery.min.js"></script>

    <!-- Sweetalert 2 -->
    <script src="assets_template/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets_template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="assets_template/dist/js/adminlte.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var backgrounds = [
                'url("assets/img/CONTAINER.jpg")',
                'url("assets/img/BG-TRUCK.jpg")',
                'url("assets/img/KAPAL.jpg")'
            ];

            var index = 0;

            function preloadImage(url) {
                var img = new Image();
                img.src = url;
            }

            function changeBackground() {
                document.body.style.backgroundImage = backgrounds[index];
                updateIndicator(index);
                index = (index + 1) % backgrounds.length;
            }

            function updateIndicator(index) {
                var dots = document.querySelectorAll('.indicator-dot');
                dots.forEach(function(dot, dotIndex) {
                    dot.style.backgroundColor = dotIndex === index ? '#ffffff' : '#777';
                });
            }

            // Preload all images
            backgrounds.forEach(preloadImage);

            // Change background every 8 seconds
            setInterval(changeBackground, 8000);

            // Create and append indicator dots
            var indicatorContainer = document.createElement('div');
            indicatorContainer.className = 'indicator';
            backgrounds.forEach(function(_, i) {
                var dot = document.createElement('div');
                dot.className = 'indicator-dot';
                dot.addEventListener('click', function() {
                    index = i;
                    changeBackground();
                });
                indicatorContainer.appendChild(dot);
            });

            document.body.appendChild(indicatorContainer);
        });
    </script>

    <?php if(isset($error)) :?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Username atau Password Salah!',
                    text: 'Silakan coba lagi.',
                    icon: 'error',
                    confirmButtonText: 'Masuk Ulang'
                });
            });
        </script>
    <?php endif; ?>

</body>
</html>