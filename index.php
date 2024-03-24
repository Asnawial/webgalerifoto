<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto </title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mochiy+Pop+P+One&display=swap" rel="stylesheet">
                
                
    
    <style>
    body {
        color: #fff;
        background-color: #000; /* Warna latar belakang hitam */
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
    .card {
        background-color: rgba(255, 255, 255, 0.8); 
    }
    .card-img-top {
        image-rendering: crisp-edges;
        max-width: 100%; 
        height: auto;
        position: relative;
    }
    .text-overlay {
        position: absolute;
        height: 100%;
        width: 100%; 
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        font-family: Arial, sans-serif;
        color: #fefefe;
        font-size: 80px;
        text-align: center;
        display:flex;
        justify-content:center;
        align-items:center;
        background-color: rgba(0,0,0,0.8);
    }
    .text-black {
        color: #000 !important; /* Warna teks hitam */
    }
    /* Tambahkan gaya untuk slideshow */
    .slideshow {
        position: relative;
        width: 100%;
        height: 100vh;
    }
    /* Atur opacity gambar */
    .slideshow img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }
    /* Animasi slideshow */
    .slideshow img.active {
        opacity: 1;
    }
    /* Ubah warna teks footer */
    footer {
        color: white;
    }

    .mochiy-pop {
        font-family: "Mochiy Pop P One", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

                                                
                                                
</style>
</head>
<body>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
        <!-- <a class="navbar-brand" href="index.php">Choi Art Gallery</a> -->
        <div class="text-start">
            <a href="register.php" class="btn btn-dark m-1">Daftar</a>
            <a href="login.php" class="btn btn-light m-1">Masuk</a>
        </div>
        </div>
    </nav>

    <!-- Elemen untuk slideshow -->
    <div class="slideshow">
        <img src="images/gridbotstrap.jpeg" alt="Slideshow Image" class="active">
        <img src="images/grid2.jpeg" alt="Slideshow Image">
        <img src="images/grid3.jpeg" alt="Slideshow Image">
        <img src="images/grid4.jpeg" alt="Slideshow Image">
        <div class="text-overlay mochiy-pop">CHOI ART GALLERY</div> <!-- Penambahan -->
    </div>

    <footer class="d-flex justify-content-center border-top mt-3 fixed-bottom" style="background-color: #7d0014;">
        <p class="text-red">&copy; UKK RPL 2024 | Asnawi Al Bukhori Dalimunthe</p>
    </footer>

    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script>
        // Daftar gambar untuk slideshow
        var images = document.querySelectorAll('.slideshow img');
        var currentIndex = 0;

        // Fungsi untuk mengubah gambar pada slideshow
        function changeImage() {
            // Set opacity gambar saat ini menjadi 0
            images[currentIndex].classList.remove('active');

            // Ganti index gambar
            currentIndex = (currentIndex + 1) % images.length;

            // Set opacity gambar baru menjadi 1
            images[currentIndex].classList.add('active');
        }

        // Panggil fungsi changeImage saat halaman dimuat
        window.onload = function() {
            setInterval(changeImage, 5000); // Ubah gambar setiap 5 detik
        };
    </script>
</body>
</html>
