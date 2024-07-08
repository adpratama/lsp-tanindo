<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

  <!-- icon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('material/') ?>assets/img/gallery/logo-icon-tanindo.png" />

  <title><?= $title ?></title>
  <style>
    .bungkus {
      padding-top: 20px;
      padding-left: ;
    }

    .body-html {
      background-color: #4e73df;
    }
  </style>
</head>

<body class="body-html">
  <!-- <h1>Hello, world!</h1> -->
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <img src="http://localhost/lsp-tanindo/assets/img/profile/logo_untuk_regis-removebg-preview.png " alt="Logo">
                <!-- <?= $title ?> -->
                <br><br>
                <h3 class="h4 text-gray-900 mb-4"><?= $title ?></h3>
              </div>
              <div class="form-group row">
                <label for="staticFUll_name" class="col-sm-3 col-form-label">Foto</label>
                <div class="col-sm-8">
                  <!-- <input type="text" readonly class="form-control-plaintext" id="full_name" value="<?= $user['foto'] ?>"> -->
                  <img src="<?= base_url('assets/img/profile/') . $user['foto'] ?>" alt="Foto" height="200px" width="150px">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticFUll_name" class="col-sm-3 col-form-label">NIK</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" id="full_name" value="<?= $user['nik'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticFUll_name" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" id="full_name" value="<?= $user['full_name'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticFUll_name" class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" id="full_name" value="<?= $user['email'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticFUll_name" class="col-sm-3 col-form-label">No. HP</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" id="full_name" value="<?= $user['phone_number'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticFUll_name" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" id="full_name" value="<?= $user['alamat'] ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticFUll_name" class="col-sm-3 col-form-label">Pendidikan</label>
                <div class="col-sm-8">
                  <input type="text" readonly class="form-control-plaintext" id="full_name" value="<?= $user['pendidikan_terakhir'] ?>">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
</body>

</html>