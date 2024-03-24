<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .card-body {
            border-radius: 20px; /* Atur radius border menjadi 15px */
            background-color: black; /* Ubah warna latar belakang card body menjadi hitam */
            color: white; /* Ubah warna teks menjadi putih */
        }

        .card {
            background-color: rgba(255, 255, 255, 0.8); 
            border-radius: 20px; /* Mengatur border radius menjadi 15px */
        }

        /* Gaya untuk mengubah warna teks "Daftar Disini" menjadi merah */
        .register-link {
            color: red;
        }

         /* Mengubah warna daftar menjadi merah */
         .btn-primary {
            background-color: #ff0000; /* Mengubah warna latar belakang */
            border-color: #ff0000; /* Mengubah warna border */
        }

          /* Gaya untuk mengubah warna ikon "Show Password" menjadi merah */
    .eye-icon {
        color: red;
    }

    .navbar {
        background-color: #7d0014; /* Warna latar belakang merah */
    }

    .navbar-brand {
        margin-left: auto;
        margin-right: auto;
        display: block;
        text-align: center;
        color: #fff; /* Warna teks putih */
    }

    /* Ubah warna teks footer menjadi hitam */
    footer {
       color: white;
    }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">Choi Art gallery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
       
      </div>
      <a href="register.php" class="btn btn-dark m-1">Daftar</a>
      <a href="login.php" class="btn btn-light m-1">Masuk</a>

    </div>
  </div>
</nav>  

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <h5>Choi Art gallery</h5>
                    </div>
                    <form action="config/aksi_login.php" method="POST">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required>
                        <label class="form-label">Password</label>
                        <div class="input-group">
                                <input type="password" name="password" class="form-control" required id="password">
                                <button class="btn btn-outline-secondary eye-icon" type="button" id="showPasswordToggle">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        <div class="d-grid mt-2">
                            <button class="btn btn-primary" type="submit" name="kirim">MASUK
                            </button>
                        </div>
                    </form>
                    <hr>
                    <p>Belum Punya Akun? <a href="register.php" class="register-link">Daftar Disini!</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="d-flex justify-content-center border-top mt-3 fixed-bottom" style="background-color: #7d0014;">
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script>
        document.getElementById('showPasswordToggle').addEventListener('click', function() {
            var passwordField = document.getElementById('password');
            var eyeIcon = document.getElementById('showPasswordToggle');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                eyeIcon.classList.remove('open');
            } else {
                passwordField.type = 'password';
                eyeIcon.classList.remove('open');
            }
        });
    </script>
    <p>&copy; UKK RPL 2024 | Asnawi Al Bukhori Dalimunthe</p>
</footer>
</body>
</html>
