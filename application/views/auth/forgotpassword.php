<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-lg-7">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg">
              <div class="p-5">
                <div class="text-center">
                  <img src="<?= base_url('assets/img/profile/') ?>lsp_tanindo_baru.jpg " alt="Logo" class="logo" width="100%"><br><br>
                  <h1 class="h4 text-gray-900 mb-4">Reset Password !</h1>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="post" action="<?= base_url('auth/forgotpassword'); ?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input name="new_password1" type="password" class="form-control form-control-user" id="new_password1" placeholder="New Password...">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="form-group">
                    <input name="new_password2" type="password" class="form-control form-control-user" id="new_password2" placeholder="Re-enter New Password...">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <button type="submit" onclick="alert('Yakin Akan Merubah Password Anda !!')" class="btn btn-primary btn-user btn-block">
                    Update Password
                  </button>
                </form>
                <hr>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Masuk!</a>
                </div>
                <div class="text-center">
                  <a class="small" href="<?= base_url('auth/registeration') ?>">Create an Account!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>