<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}


require '../function/functions.php';


//jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}

// ambil id dari url
$id = $_GET['id'];

// query games berdasrkan id
$g = query("SELECT * FROM games WHERE id_game = $id")[0];


//cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah!');
            document.location.href = './index.php';
        </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Ubah Data Games</title>
  <style>
    .nonphoto {
      margin-top: 10px;
      border-radius: 10px;
    }
  </style>
</head>

<body>
  <div class="container col-8">
    <h1>Ubah Data Games</h1>

    <form action="" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="id" value="<?= $g['id_game']; ?>">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Game</label>
        <input type="text" autofocus class="form-control" id="nama" name="nama_game" required value="<?= $g['nama_game']; ?>">
      </div>


      <div class="mb-3">
        <label for="nim" class="form-label">Deskripsi</label>
        <input type="text" class="form-control" id="deskripsi" name="deskripsi" required value="<?= $g['deskripsi']; ?>">
      </div>

      <div class="mb-3">
        <label for="email" class="form-label">Genre</label>
        <input type="text" class="form-control" id="genre" name="genre" required value="<?= $g['genre']; ?>">
      </div>


      <div class="mb-3">
        <label for="jurusan" class="form-label">Tanggal Rilis</label>
        <input type="date" class="form-control" id="tanggal rilis" name="tanggal_rilis" required value="<?= $g['tanggal_rilis']; ?>">
      </div>

      <div class="mb-3">
        <label for="jurusan" class="form-label">developer</label>
        <input type="text" class="form-control" id="developer" name="developer" required value="<?= $g['developer']; ?>">
      </div>

      <div class="mb-3">
        <input type="hidden" name="gambar_lama" value="<?= $g['gambar']; ?>">
        <label for="jurusan" class="form-label">Gambar</label>
        <input type="file" class="form-control" id="gambar" name="gambar" class="gambar" onchange="previewImage()">
        <img src="../assets/image/<?= $g['gambar']; ?>" width="120px" class="nonphoto img-preview">
      </div>


      <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>

    </form>

  </div>


  <script src="../JS/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>