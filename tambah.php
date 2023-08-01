<?php
require 'function.php';

// cek apakah tombol submit dipencet
if(isset($_POST["submit"])){
    // cek apakah  data berhasil di tambahkan
    if(tambah($_POST) > 0){
        echo "
                <script>
                    alert('Data berhasil ditambahkan');
                    document.location.href = 'index.php';
                </script>
        ";
    } else {
        echo "
                <script>
                    alert('Data GAGAL ditambahkan');
                    document.location.href = 'index.php';
                </script>
        ";
    }
}
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MINI WEBSITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body class="d-grid p-5" style="height:100vh; place-items:center">
    <img src="img/opsional.png" style="width: 200px;" alt="" class="mb-3">
    <div class="container card p-3">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" required>
            </div>
            <div class="mb-3">
                <label for="isi" class="form-label">Kata Kata</label>
                <input type="text" class="form-control" name="isi" id="isi">
            </div>
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar (Opsional)</label>
                <input class="form-control" type="file" name="gambar" id="gambar" accept="image/*">
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Tambahin</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>