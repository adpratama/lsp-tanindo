<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>PolluxUI Admin</title>
  <!-- base:css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/typicons/typicons.css">
  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
        <div class="row flex-grow">
          <div class="col-lg-7 mx-auto text-white">
            <div class="row align-items-center d-flex flex-row">
              <div class="col-lg-6 text-lg-right pe-lg-4">
                <h1 class="display-1 mb-0">404</h1>
              </div>
              <div class="col-lg-6 error-page-divider text-lg-left ps-lg-4">
                <h2>SORRY!</h2>
                <h3 class="fw-light">The page you’re looking for was not found.</h3>
              </div>
            </div>
            <div class="row mt-5">
              <h2>Anda telah gagal login sebanyak 3 kali!</h2>
              <p>Silakan reset percobaan login Anda untuk mencoba lagi.</p>

              <div class="col-12 text-center mt-xl-2">
                <!-- <a class="text-white fw-medium" href="<?= base_url('auth') ?>">Back to Login</a> -->
                <!-- Tombol reset login_attempts -->
                <form action="<?php echo base_url('auth/reset_attempts'); ?>" method="post">
                  <button type="submit">Reset Login Attempts And Back to Login</button>
                </form>
              </div>
            </div>
            <div class="row mt-5">
              <div class="col-12 mt-xl-2">
                <p class="text-white fw-medium text-center">Copyright &copy; 2024 All rights reserved.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- base:js -->
  <script src="<?= base_url('assets/') ?>vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url('assets/') ?>js/off-canvas.js"></script>
  <script src="<?= base_url('assets/') ?>js/hoverable-collapse.js"></script>
  <script src="<?= base_url('assets/') ?>js/template.js"></script>
  <script src="<?= base_url('assets/') ?>js/settings.js"></script>
  <script src="<?= base_url('assets/') ?>js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>