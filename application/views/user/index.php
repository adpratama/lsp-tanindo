<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <div class="row">
    <div class="col-lg-6">
      <?= $this->session->flashdata('message'); ?>
    </div>
  </div>

  <!-- Profile User start -->
  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"><?= $user['full_name'] ?></h6>
          </div>
          <div class="card-body">
            <div class="text-center">
              <img class="my-profile" src="<?= base_url('assets/img/profile/') . $user['foto']; ?> " alt="profile">
            </div>
          </div>
        </div>
      </div>

      <div class="col-xl-8">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Overview</h6>
          </div>
          <div class="card-body">
            <h5 class="card-title text-success">Detail Profile</h5>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">Username</div>
              <div class="col-lg-9 col-md-8"><?= $user['username'] ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">NIK</div>
              <div class="col-lg-9 col-md-8"><?= $user['nik'] ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label ">Nama</div>
              <div class="col-lg-9 col-md-8"><?= $user['full_name'] ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">No. Handphone</div>
              <div class="col-lg-9 col-md-8"><?= $user['phone_number'] ?></div>
            </div>
            <div class="row">
              <div class="col-lg-3 col-md-4 label">Alamat</div>
              <div class="col-lg-9 col-md-8"><?= $user['alamat'] ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Email</div>
              <div class="col-lg-9 col-md-8"><?= $user['email'] ?></div>
            </div>

            <div class="row">
              <div class="col-lg-3 col-md-4 label">Create at</div>
              <div class="col-lg-9 col-md-8">
                <?=
                $user['create_add']
                // if ($user->role_id == 1) {
                //   echo "Admin";
                // } else if ($user->role_id == 2) {
                //   echo "Instruktur";
                // } else if ($user->role_id == 3) {
                //   echo "Siswa";
                // } else if ($user->role_id == 4) {
                //   echo "Finance";
                // } else {
                //   echo "PIC " . $user->station;
                // }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- profile user end -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->