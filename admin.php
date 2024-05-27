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

    .card {
      background-color: #232e35;
    }
  </style>
</head>


<body>
  <!-- navbar start -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="navbar">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">RaccooonG.</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button type="button" class="btn btn-outline-warning">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!-- navbar end -->
  <section class="halaman1">

  </section>
  <!-- Daftar Game Start -->
  <section class="card" id="">
    <div class="container text-center">
      <div class="row">
        <div class="col-4">
          <div class="card" style="width: 18rem;">
            <img src="./assets/image/counter-strike2.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <button type="button" class="btn btn-outline-warning">Ubah</button>
              <button type="button" class="btn btn-outline-danger">Hapus</button>
            </div>
          </div>
        </div>

      </div>
    </div>

  </section>

  <section>

  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>