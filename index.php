<?php
    require 'function.php';

    $isi_hati = query("SELECT * FROM isi_hati");
?>

<!doctype html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MINI WEBSITE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>
    <h1 class="text-center my-5">ANONIM WEBSET</h1>

    <div class="container">
        <?php foreach($isi_hati as $row) : ?>
        <div class="card mb-3">
            <div class="card-header">
                <?= $row["nama"] ?>
            </div>
            <div class="d-flex align-items-center justify-content-evenly p-3">
                <?php if($row["gambar"] == !"") : ?>
                <div>
                    <img src="img/<?= $row["gambar"] ?>" style="max-width: 200px;" class="img-fluid rounded" alt="...">
                </div>
                <?php endif; ?>
                <div>
                    <div class="card-body text-center">
                        <p class="card-text"><?= $row["isi"] ?></p>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <a href="tambah.php" class="btn position-fixed d-grid" style="place-items:center; background: #ccc; color: black;bottom: 1rem; right: 1rem; width: 3rem; height: 3rem">+</a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>