<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


  <!-- Change Password start -->
  <section class="section edit">
    <div class="row">
      <?= $this->session->flashdata('message'); ?>
      <div class="col-xl-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
          </div>

          <div class="card-body">
            <!-- Change Password Form -->
            <form action="<?= base_url('user/changepassword') ?>" method="post" id="form-change-password">
              <div class="row mb-3">
                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="current_password" type="password" class="form-control" id="current_password">
                  <?= form_error('current_password', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="row mb-3">
                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="new_password1" type="password" class="form-control" id="new_password1">
                  <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="row mb-3">
                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="new_password2" type="password" class="form-control" id="new_password2">
                  <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
              </div>
              <div class="text-end">
                <button type="submit" class="btn btn-primary" id="btn-change-password"><i class="bi bi-floppy-fill"></i> Simpan</button>
              </div>
            </form>
            <!-- End Change Password Form -->
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Change Password end -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->