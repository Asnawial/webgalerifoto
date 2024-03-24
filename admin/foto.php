<?php
session_start();
include '../config/koneksi.php';
if ($_SESSION['status'] != 'login'){
    echo "<script>
    alert('Anda belum login!');
    location.href='../index.php';
    </script>";
} 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Galeri Foto</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
  <style>
        body {
          background-color: #7d0014;
          color: #fff;
        }

        .navbar {
            background-color: #000000; 
        }

        .navbar-brand {
            margin-left: auto;
            margin-right: auto;
            display: block;
            text-align: center;
            color: white !important; /* Warna merah */
        }

        .nav-link {
            color: white !important; /* Warna merah */
        }
        .card {
            background-color: #788888;
            color: #ffffff;
        }

        .card-img-top {
            image-rendering: crisp-edges;
            max-width: 100%; 
            height: auto;
        }

        .text-red {
          color: white !important; /* Warna merah */
        }
    </style>
</head>
<nav class="navbar navbar-expand-lg">
  <div class="container">
    <a class="navbar-brand" href="index.php">Choi Art Gallery</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mt-2" id="navbarNavAltMarkup">
      <div class="navbar-nav me-auto">
      <a href="home.php" class="nav-link">Home</a>
       <a href="album.php" class="nav-link">Album</a>
       <a href="foto.php" class="nav-link">Foto</a>
      </div>

      <a href="../config/aksi_logout.php" class="btn btn-danger m-1">Keluar</a>

    </div>
  </div>
</nav>  

<div class="col-md-4 ms-auto">
        <div class="card-body">
            <!-- Tambahkan data-bs-toggle dan data-bs-target untuk membuka modal -->
            <button type="button" class="btn btn-info mt-2" data-bs-toggle="modal" data-bs-target="#tambahFotoModal" style="background-color: white;">
            <i class="fa-solid fa-plus me-2"></i>Tambah Foto</button>
        </div>
    </div>
</div>
                    <!-- Modal untuk menambah foto -->
<div class="modal fade" id="tambahFotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: black;">Tambah Foto Baru</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form untuk menambah foto -->
                <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
                    <label class="form-label" style="color: black;">Judul Foto</label>
                    <input type="text" name="judulfoto" class="form-control" required>
                    <label class="form-label" style="color: black;">Deskripsi</label>
                    <textarea class="form-control" name="deskripsifoto" required></textarea>
                    <label class="form-label" style="color: black;">Album</label>
                    <select class="form-control" name="albumid" required>
                        <?php
                        $sql_album = mysqli_query($koneksi, "SELECT * FROM album");
                        while ($data_album = mysqli_fetch_array($sql_album)) { ?>
                            <option value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum'] ?></option>
                        <?php } ?>
                    </select>
                    <label class="form-label">File</label>
                    <input type="file" class="form-control" name="lokasifile" required>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" name="tambah" class="btn btn-success">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>
        <div class="col-md-8">
            <div class="card mt-2 ml-2">
                <div class="card-header bg-table">Data Galeri Foto</div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Judul Foto</th>
                                <th>Deskripsi</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = "1";
                            $userid = $_SESSION['userid'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM foto WHERE userid='$userid'");
                            while($data = mysqli_fetch_array($sql)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100px"></td>
                                <td><?php echo $data['judulfoto'] ?></td>
                                <td><?php echo $data['deskripsifoto'] ?></td>
                                <td><?php echo $data['tanggalungguh'] ?></td>
                                <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit<?php echo $data['fotoid'] ?>"><i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <div class="modal fade" id="edit<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                         <div class="modal-content">
                                         <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                  <form action="../config/aksi_foto.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                    <label class="form-label">Judul Foto</label>
                                                     <input type="text" name="judulfoto" value="<?php echo $data['judulfoto'] ?>" class="form-control" required>
                                                     <label class="form-label">Deskripsi</label>
                                                     <textarea class="form-control" name="deskripsifoto"  required>
                                                        <?php echo $data['deskripsifoto']; ?> </textarea>
                                                        <label class="form-label">Album</label>
                                                        <select class="form-control" name="albumid">
                                                            <?php 
                                                            $sql_album = mysqli_query($koneksi, "SELECT * FROM album  WHERE userid='$userid'");
                                                            while($data_album = mysqli_fetch_array($sql_album)){ ?>
                                                            <option <?php if($data_album['albumid'] == $data['albumid']) { ?> selected="selected" <?php } ?> value="<?php echo $data_album['albumid'] ?>"><?php echo $data_album['namaalbum'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <label class="form-label">Foto</label>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                            <img src="../assets/img/<?php echo $data['lokasifile'] ?>" width="100px">
                                                            </div>
                                                            <div class="col-md-8">
                                                            <label class="form-label">Ganti File</label>
                                                            <input type="file" class="form-control" name="lokasifile">
                                                            </div>
                                                            </div>
                                                            </div>
                                                 </div>
                                                  <div class="modal-footer">
                                                  <button type="submit" name="edit" class="btn btn-primary">Edit Data</button>
                                                  </form>
                                                </div>
                                             </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus<?php echo $data['fotoid'] ?>"><i class="fa-solid fa-delete-left"></i>
                                </button>

                                <div class="modal fade" id="hapus<?php echo $data['fotoid'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                         <div class="modal-content">
                                         <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus Data</h1>
                                             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                  <form action="../config/aksi_foto.php" method="POST">
                                                    <input type="hidden" name="fotoid" value="<?php echo $data['fotoid'] ?>">
                                                    Apakah Anda Yakin Ingin Menghapus Data Ini <strong> <?php echo $data['judulfoto'] ?></strong> ?
                                                 </div>
                                                  <div class="modal-footer">
                                                  <button type="submit" name="hapus" class="btn btn-primary">Hapus Data</button>
                                                  </form>
                                                </div>
                                             </div>
                                            </div>
                                        </div>
                                          </td>
                                          </tr>
                                          <?php } ?>
                                            </tbody>
                                         </table>
                                          </div>
                                           </div>
                                         </div>
                                          </div>
                                          </div>
                                        </div>
                                        <footer class="d-flex justify-content-center border-top mt-3 fixed-bottom" style="background-color: #000;">
                                             <p class="text-red">&copy; UKK RPL 2024 | Asnawi Al Bukhori Dalimunthe</p>
                                        </footer>

                                            <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
                                        </body>
                                        </html>