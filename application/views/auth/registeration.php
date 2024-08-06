  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <img src="<?= base_url('assets/img/profile/') ?>lsp_tanindo_baru.jpg " alt="Logo" class="logo" width="100%">
                <br><br>
                <h1 class="h4 text-gray-900 mb-4">Silahkan Lakukan Pendaftaran!</h1>
                <?= $this->session->flashdata('message'); ?>
              </div>
              <form class="user" method="post" enctype="multipart/form-data" action="<?= base_url('auth/insert_data'); ?>">
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Nomor Induk Kependudukan" value="<?= set_value('nik') ?>">
                    <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="fullname" name="fullname" placeholder="Full Name" value="<?= set_value('fullname') ?>">
                    <?= form_error('fullname', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="Username" value="<?= set_value('name') ?>">
                  <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>">
                  <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="no_telp" name="no_telp" placeholder="Nomor Whats App" value="<?= set_value('no_telp') ?>">
                  <?= form_error('no_telp', '<small class="text-danger pl-3">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Alamat Tinggal" value="<?= set_value('alamat') ?>">
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="jenkel" id="jenkel" class="form-control">
                      <option value="">-- PILIH Jenis Kelamin --</option>
                      <option value="pria">Pria</option>
                      <option value="wanita">Wanita</option>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="kebangsaan" name="kebangsaan" placeholder="Kebangsaan" value="<?= set_value('kebangsaan') ?>">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= set_value('tempat_lahir') ?>">
                  </div>
                  <div class="col-sm-6">
                    <input type="date" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir">
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control form-control-user" id="pendidikan" name="pendidikan" placeholder="Pendidikan Terakhir - Jurusan / Gelar" value="<?= set_value('pendidikan') ?>">
                </div>
                <div class="form-group">
                  <label class="form-label">Upload Foto 3 x 4</label>
                  <input type="file" name="foto" id="img-profile" class="form-control">
                  <!-- <canvas id="camera--sensor"></canvas>
                  <video id="camera--view" autoplay playsinline></video>
                  <img src="//:0" alt="" id="camera--output">
                  <button id="camera--trigger">Take a picture</button> -->
                </div>
                <div class="form-group">
                  <label class="form-label">Upload Sertifikat</label>
                  <input type="file" name="sertif" id="img-profile" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-label">Upload Ktp</label>
                  <input type="file" name="kartuk" id="img-profile" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-label">Upload Ijazah</label>
                  <input type="file" name="ijasah" id="img-profile" class="form-control">
                </div>
                <div class="form-group">
                  <label class="form-label">Upload Surat Keterangan</label>
                  <input type="file" name="suratk" id="img-profile" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Daftar
                </button>

              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="<?= base_url('auth'); ?>">Sudah punya akun? Masuk!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>