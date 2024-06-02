<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}

require '../function/functions.php';


//cek apakah tombol tambah sudah ditekan
if (isset($_POST['tambah'])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambakan!');
            document.location.href = '../index.php';
        </script>";
  } else {
    echo "data gagal ditambahakan!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Tambah Data Games</title>
  <style>
    .nonphoto {
      display: block;
      margin-top: 10px;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="container col-8">
    <h1>Tambah Data Games</h1>

    <form action="" method="POST" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Game</label>
        <input type="text" autofocus class="form-control" id="nama" name="nama_game" required>
      </div>


      <div class="mb-3">
        <label for="nim" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" required>
      </div>


      <div class="mb-3">
        <label for="jurusan" class="form-label">Tanggal Rilis</label>
        <input type="date" class="form-control" id="tanggal rilis" name="tanggal_rilis" required>
      </div>

      <div class="mb-3">
        <label for="jurusan" class="form-label">developer</label>
        <input type="text" class="form-control" id="developer" name="developer" required>
      </div>

      <div class="mb-3">
        <label for="jurusan" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar" class="gambar" onchange="previewImage()">
        <img src="../assets/image/nonphoto.jpg" width="120px" class="nonphoto img-preview">
      </div>


      <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>

    </form>

  </div>


  <script src="../JS/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>