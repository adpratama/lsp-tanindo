<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <!-- Change Password start -->
  <section class="section edit">
    <div class="row">

      <div class="col-xl-6">
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
          </div>
          <div class="card-body">
            <!-- Change Password Form -->
            <form action="<?= base_url('auth/changepassword') ?>" id="form-change-password">
              <div class="row mb-3">
                <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="current" type="password" class="form-control" id="current">
                </div>
              </div>

              <div class="row mb-3">
                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="new_pass" type="password" class="form-control" id="new_pass">
                </div>
              </div>

              <div class="row mb-3">
                <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                <div class="col-md-8 col-lg-9">
                  <input name="repeat_pass" type="password" class="form-control" id="repeat_pass">
                </div>
              </div>
              <!-- <input type="hidden" id="my_data" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none"> -->
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