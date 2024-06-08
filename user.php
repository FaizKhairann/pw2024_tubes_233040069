<!-- Koneksi ke DB & Pilih Database -->
<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ./login.php");
  exit;
}


require './function/functions.php';

$games = query("SELECT * FROM games");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
  $games = cari($_POST['keyword']);
}

if (isset($_POST['sort_option'])) {
  $sort_option = $_POST['sort_option'];
  switch ($sort_option) {
    case 'nama_game_a-z':
      $games = query("SELECT * FROM games ORDER BY nama_game ASC");
      break;
  }
} else {
  $games = query("SELECT * FROM games");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RaccoonG.</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      text-decoration: none;
      list-style: none;
      scroll-behavior: smooth;
    }

    body {
      background-color: #232e35;
    }

    /* Navbar */

    .navbar-brand {
      color: #EAC50D;
      font-family: "Poppins", sans-serif;
      font-weight: 700;
      font-style: normal;
    }

    .nav-link {
      font-family: "Poppins", sans-serif;
      font-weight: 600;
      font-style: normal;
    }

    .halaman1 {
      height: 20px;
    }

    #card {
      font-family: "Poppins", sans-serif;
      font-weight: 500;
      font-style: normal;
    }

    .c {
      background-color: #232e35;
    }

    .card {
      height: 100%;
    }

    /* Gaya untuk kotak urutan */
    .sort-container select,
    .sort-container button {
      border-radius: 7px;
    }
  </style>
</head>


<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">RaccoonG.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#card">Home</a>
          </li>

        </ul>
        <form action="" method="POST" class="d-flex" role="search">
          <input class="form-control me-2 keyword" type="text" name="keyword" placeholder="Search" aria-label="Search" autocomplete="off">
          <button type="submit" name="cari" class="btn btn-outline-warning tombol-cari" autocomplete="off">Search</button>
          <a href="logout.php" class="btn btn-outline-danger ms-2">Logout</a>
        </form>
      </div>
    </div>
  </nav>
  <!-- navbar end -->

  <section class="halaman1">

  </section>


  <!-- Daftar Game Start -->
  <section id="card" class="c">
    <div class="container1">
      <div class="container text-center my-5">
        <form action="" method="post">
          <div class="d-flex mt-2 mb-4 sort-container" style="width:40%;">
            <select name="sort_option" style="margin-right: 5px;">
              <option value="" class="text-center ">------urutkan------</option>
              <option value="nama_game_a-z">Nama A-Z</option>
            </select>
            <button class="btn btn-outline-light tombol-cari" type="submit" name="urutkan">urutkan</button>
          </div>
        </form>

        <?php

        ?>

        <div class="row">

          <?php if (empty($games)) : ?>
            <div class="card border-danger mb-3" style="max-width: 24rem;">
              <div class="card-body text-danger">
                <h5 class="card-title">Data tidak ditemukan!</h5>
              </div>
            <?php endif ?>

            <?php $i = 1;
            foreach ($games as $g) : ?>
              <div class="col-md-3 mb-4 d-flex align-items-stretch">
                <div class="card" style="width: 18rem;">
                  <img src="./assets/image/<?= $g['gambar']; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"><?= $i++ ?>. <?= $g['nama_game']; ?></h5>
                    <p class="card-text"><?= $g['deskripsi']; ?></p>
                  </div>

                  <div class="card-body">
                    <a href="admin/Detail user.php?id=<?= $g['id_game']; ?>" type="button" class="btn btn-outline-primary">Detail</a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
            </div>
        </div>

      </div>
    </div>
  </section>

  <script src="./JS/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>