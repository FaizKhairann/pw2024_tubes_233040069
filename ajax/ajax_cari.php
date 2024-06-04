<?php
require '../function/functions.php';
$games = cari($_GET['keyword']);
?>

<section id="card" class="c">
  <div class="container1">
    <div class="container text-center my-5">
      <div class="d-flex justify-content-start mb-4">
        <a href="./admin/Tambah.php" class="btn btn-primary">Tambah Data</a>
      </div>

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
                  <a href="admin/Detail.php?id=<?= $g['id_game']; ?>" type="button" class="btn btn-outline-primary">Detail</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
          </div>
      </div>

    </div>
  </div>
</section>