<?php
function koneksi()
{
  return  mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040069');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  // // jika hasil nya satu
  // if (mysqli_num_rows($result) == 1) {
  //   return mysqli_fetch_assoc($result);
  // }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama_game']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $genre = htmlspecialchars($data['genre']);
  $tanggalrilis = htmlspecialchars($data['tanggal_rilis']);
  $developer = htmlspecialchars($data['developer']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO
              games
            VALUES
            (NULL, '$nama', '$deskripsi ', '$genre', '$tanggalrilis', '$developer', '$gambar');
            ";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM games WHERE id_game = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();

  $id = ($data['id']);
  $nama = htmlspecialchars($data['nama_game']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $genre = htmlspecialchars($data['genre']);
  $tanggalrilis = htmlspecialchars($data['tanggal_rilis']);
  $developer = htmlspecialchars($data['developer']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE games SET
                nama_game = '$nama',
                deskripsi = '$deskripsi',
                genre = '$genre',
                tanggal_rilis = '$tanggalrilis',
                developer = '$developer',
                gambar = '$gambar'
               WHERE id_game = $id; 
                ";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM games
              WHERE nama_game LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
