<?php
function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'pw2024_tubes_233040069');
  if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
  }
  return $conn;
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

function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    // echo "<script>
    //        alert('pilih gambar terlebih dahulu') 
    //     </script>";
    return 'nonphoto.jpg';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
      alert('yang anda pilih bukan gambar!') 
   </script>";
    return false;
  }

  // Cek tipe file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
       alert('yang anda pilih bukan gambar!') 
    </script>";
    return false;
  }

  // cek ukuran file
  // maksikmal 5mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script> 
       alert('ukuran terlalu besar!') 
    </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;

  move_uploaded_file($tmp_file, '../assets/image/' . $nama_file_baru);

  return $nama_file_baru;
}

// Fungsi Tambah
function tambah($data)
{
  $conn = koneksi();

  $nama = htmlspecialchars($data['nama_game']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $genre = htmlspecialchars($data['genre']);
  $tanggalrilis = htmlspecialchars($data['tanggal_rilis']);
  $developer = htmlspecialchars($data['developer']);

  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }


  $query = "INSERT INTO
              games
            VALUES
            (NULL, '$nama', '$deskripsi ', '$genre', '$tanggalrilis', '$developer', '$gambar');
            ";
  mysqli_query($conn, $query);
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

// Fungsi Hapus
function hapus($id)
{
  $conn = koneksi();

  // menghapus gambar di folder assets/image
  $g = query("SELECT * FROM games WHERE id_game = $id");
  if ($g['gambar'] != 'nonphoto.jpg') {
    unlink('image/' . $g['gambar']);
  }

  mysqli_query($conn, "DELETE FROM games WHERE id_game = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// Fungsi Ubah
function ubah($data)
{
  $conn = koneksi();

  $id = ($data['id']);
  $nama = htmlspecialchars($data['nama_game']);
  $deskripsi = htmlspecialchars($data['deskripsi']);
  $genre = htmlspecialchars($data['genre']);
  $tanggalrilis = htmlspecialchars($data['tanggal_rilis']);
  $developer = htmlspecialchars($data['developer']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nonphoto.jpg') {
    $gambar = $gambar_lama;
  }

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

// Fungsi Cari
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM games
              WHERE 
              nama_game LIKE '%$keyword%' OR
              genre LIKE '%$keyword%' OR
              developer LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// Fungsi login
function login($data)
{
  $conn = koneksi();

  $username = htmlspecialchars($data["username"]);
  $password = htmlspecialchars($data["password"]);

  // cek dulu username nya
  if ($user = query("SELECT * FROM users WHERE username = '$username'")[0]) {
    if (password_verify($password, $user['password'])) {

      $_SESSION['login'] = true;
      $_SESSION['role'] = $user['role'];
      $_SESSION['id'] = $user['user'];

      // cek kondisi admin atau user
      if ($user['role'] == 'admin') {
        header('Location: ./index.php');
      } else {
        header('Location: ./user.php');
      }
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password Salah!'
  ];
}

// Fungsi register
function register($data)
{
  $conn = koneksi();

  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);

  // jika username /  password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
            alert('Username / Password Tidak Boleh Kosong!');
            document.location.href = '../register.php';
          </script>";

    return false;
  }

  // jika username sudah ada 
  if (query("SELECT * FROM users WHERE username = '$username'  ")) {
    echo "<script>
            alert('Username Sudah Terdaftar!');
            document.location.href = './register.php';
          </script>";

    return false;
  }

  // jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
            alert('Konfirmasi Tidak Sesuai!');
            document.location.href = './register.php';
          </script>";

    return false;
  }

  // jika password < 5 digit
  if (strlen($password1) < 5) {
    echo "<script>
            alert('Password Terlalu Pendek!');
            document.location.href = './register.php';
          </script>";

    return false;
  }

  // Get role from user
  $role = 'user';

  // jika username & password sudah sesuai 
  // enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel users

  // jika username & password sudah sesuai
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  // insert ke tabel user
  $query = "INSERT INTO users (username, password, role)
                  VALUES
            ('$username', '$password_baru', '$role')";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
