<?php

require '../function/functions.php';

if (isset($_POST['register'])) {
  if (register($_POST) > 0) {
    echo "<script>
            alert('User Baru Berhasil Ditambahkan, Silahkan Login!');
            document.location.href = './login.php';
          </script>";
  } else {
    echo 'User Gagal Ditambakan!';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    .register-container {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 15px;
    }

    .register-form {
      width: 100%;
      max-width: 400px;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div class="container-fluid register-container">
    <div class="register-form bg-light">
      <h2 class="text-center mb-4">Register</h2>

      <form action="" method="POST">
        <div class="mb-3">
          <label class="form-label">Username</label>
          <input type="text" name="username" class="form-control" autofocus autocomplete="off" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Password</label>
          <input type="password" name="password1" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Confirm Password</label>
          <input type="password" name="password2" class="form-control" required>
        </div>
        <button type="submit" name="register" class="btn btn-primary w-100">Register</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>