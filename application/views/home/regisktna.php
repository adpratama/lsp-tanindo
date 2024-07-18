<body>
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
                    <img src="<?= base_url('assets/img/profile/') ?>logo_untuk_regis-removebg-preview.png " alt="Logo" class="logo" sizes="auto"><br><br>
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                      <label for="form-label">Username</label>
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Input Username ......">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="form-label">Email</label>
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                      <!-- <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>
                    <div class="form-group">
                      <label for="form-label">Provinsi</label>
                      <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" placeholder="Input Provinsi" value="<?= set_value('email'); ?>">
                      <!-- <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?> -->
                    </div>
                    <div class="form-group">
                      <label for="form-label">Nomor Hp</label>
                      <input type="text" class="form-control form-control-user" id="nomor_hp" name="nomor_hp" placeholder="Input Nomor HP">
                      <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>