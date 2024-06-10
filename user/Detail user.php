<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}

require '../function/functions.php';

// Ambil id dari url
$id = $_GET['id'];

// Query games berdasarkan id
$games = query("SELECT * FROM games WHERE id_game = $id");
?>

<!doctype html>
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

      height: 100px;

    }

    #card {
      font-family: "Poppins", sans-serif;
      font-weight: 400;
      font-style: normal;
    }

    .c {
      background-color: #232e35;
      display: flex;
      align-items: center;
      justify-content: center;

    }

    .card {
      height: 100%;
      width: 100%;
    }
  </style>
</head>


<body>

  <section class="halaman1">

  </section>
  <!-- Daftar Game Start -->
  <section class="c" id="card">

    <?php
    foreach ($games as $g) : ?>
      <div class="col-md-4 mb-4 d-flex align-items-stretch">
        <div class="card" style="width: 32rem;">
          <img src="../assets/image/<?= $g['gambar']; ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"> <?= $g['nama_game']; ?></h5>
            <p class="card-text"><?= $g['deskripsi']; ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item"><?= $g['genre']; ?></li>
            <li class="list-group-item"><?= $g['tanggal_rilis']; ?></li>
            <li class="list-group-item"><?= $g['developer']; ?></li>
          </ul>
          <div class="card-body d-flex justify-content-between align-items-center">
            <a href="../user/user.php" type="button" class="btn btn-outline-danger ms-auto">Kembali</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>

  </section>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>