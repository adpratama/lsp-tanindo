<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <!-- edit profile start -->
  <section class="section edit">
    <div class="row">
      <div class="col-xl-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
          </div>
          <div class="card-body">
            <!-- Profile Edit Form -->
            <form action="<?= base_url('user/edit_profile') ?>" method="post" enctype="multipart/form-data" id="form-update-profile">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?= base_url('assets/img/profile/') . $user['foto']; ?>" class="img-thumbnail">
                </div>
                <div class="col-sm-8">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="image" name="image">
                    <label class="custom-file-label" for="image">Choose file</label>
                  </div>
                </div>
              </div>
              <div class="row mb-3">
                <label for="nik" class="col-md-4 col-lg-3 col-form-label">NIK</label>
                <div class="col-md-8 col-lg-9">
                  <input name="nik" type="text" class="form-control" id="nik" value="<?= $user['nik'] ?>" readonly>
                </div>
              </div>

              <div class="row mb-3">
                <label for="username" class="col-md-4 col-lg-3 col-form-label">Username</label>
                <div class="col-md-8 col-lg-9">
                  <input name="username" type="text" class="form-control" id="username" value="<?= $user['username'] ?>">
                  <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>

              <div class="row mb-3">
                <label for="fullname" class="col-md-4 col-lg-3 col-form-label">Nama</label>
                <div class="col-md-8 col-lg-9">
                  <input name="fullname" type="text" class="form-control" id="fullname" value="<?= $user['full_name'] ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label for="phone" class="col-md-4 col-lg-3 col-form-label">No.Handphone</label>
                <div class="col-md-8 col-lg-9">
                  <input name="phone" type="text" class="form-control" id="phone" value="<?= $user['phone_number'] ?>">
                </div>
              </div>
              <div class="row mb-3">
                <label for="phone" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                <div class="col-md-8 col-lg-9">
                  <input name="alamat" type="text" class="form-control" id="alamat" value="<?= $user['alamat'] ?>">
                </div>
              </div>

              <div class="row mb-3">
                <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                <div class="col-md-8 col-lg-9">
                  <input name="email" type="text" class="form-control" id="email" value="<?= $user['email'] ?>" readonly>
                </div>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary" id="btn-update-profile"><i class="bi bi-floppy-fill"></i> Simpan</button>
              </div>
            </form>
            <!-- End Profile Edit Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- edit profile end -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->