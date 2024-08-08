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
                    <img src="<?= base_url('assets/img/profile/') ?>logo_KTNA.png " alt="Logo" class="logo" width="100%" height="100%"><br><br>
                    <h1 class="h4 text-gray-900 mb-4">Register</h1>
                  </div>
                  <?= $this->session->flashdata('message'); ?>
                  <form class="user" method="post" action="<?= base_url('home/insertktna'); ?>" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="form-label">NIK</label>
                      <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Input NIK ......" value="<?= set_value('nik'); ?>">
                      <?= form_error('nik', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="form-label">Username</label>
                      <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Input Username ......" value="<?= set_value('username'); ?>">
                      <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="form-label">Email</label>
                      <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Input email ......" value="<?= set_value('email'); ?>">
                      <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="form-label">Jabatan</label>
                      <Select class="form-control" name="jabatan">
                        <option value=""> -- Pilih Jabatan -- </option>
                        <option value="1">Ketua Umum</option>
                        <option value="2">Sekertariat Jendral</option>
                        <option value="3">Bendahara Umum</option>
                        <option value="4">Ketua Provinsi</option>
                        <option value="5">Dep. Kelautan dan Perikanan</option>
                        <option value="6">Dep. Kemitraan Strategis dan Advokasi</option>
                        <option value="7">Dep.LITBANG</option>
                        <option value="8">Dep. Media Informasi dan Komunikasi</option>
                        <option value="9">Dep. Hukum & HAM</option>
                        <option value="10">Anggota</option>
                      </Select>
                    </div>
                    <div class="form-group">
                      <label for="form-label">Tempat Lahir</label>
                      <input type="text" class="form-control form-control-user" id="tem_lahir" name="tem_lahir" placeholder="Input Tempat Lahir...." value="<?= set_value('tem_lahir'); ?>">
                      <?= form_error('tem_lahir', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="form-label">Tanggal Lahir</label>
                      <input type="text" class="form-control form-control-user" id="tanggal_lahir" name="tanggal_lahir" value="<?= set_value('tanggal_lahir'); ?>" placeholder="Format tgl 1997-09-24">
                    </div>
                    <div class="form-group">
                      <label for="form-label">Alamat</label>
                      <input type="text" class="form-control form-control-user" id="alamat" name="alamat" placeholder="Input Alamat...." value="<?= set_value('alamat'); ?>">
                      <?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <label for="form-label">Provinsi</label>
                      <!-- <input type="text" class="form-control form-control-user" id="provinsi" name="provinsi" placeholder="Input Provinsi...." value="<?= set_value('provinsi'); ?>"> -->
                      <select name="provinsi" id="provinsi" class="form-control">
                        <option value="">-- PILIH PROVINSI --</option>
                        <option value="01">Aceh</option>
                        <option value="02">Sumatera Utara</option>
                        <option value="03">Sumatera Barat</option>
                        <option value="04">Riau</option>
                        <option value="05">Jambi</option>
                        <option value="06">Sumatera Selatan</option>
                        <option value="07">Bengkulu</option>
                        <option value="08">Lampung</option>
                        <option value="09">Kep. Bangka Belitung</option>
                        <option value="10">Kep. Riau</option>
                        <option value="11">Jakarta</option>
                        <option value="12">Jawa Barat</option>
                        <option value="13">Jawa Tengah</option>
                        <option value="14">Banten</option>
                        <option value="15">Jawa Timur</option>
                        <option value="16">Yogyakarta</option>
                        <option value="17">Bali</option>
                        <option value="18">Nusa Tenggara Barat</option>
                        <option value="19">Nusa Tenggara Timur</option>
                        <option value="20">Kalimantan Barat</option>
                        <option value="21">Kalimantan Tengah</option>
                        <option value="22">Kalimantan Selatan</option>
                        <option value="23">Kalimantan Timur</option>
                        <option value="24">Kalimantan Utara</option>
                        <option value="25">Sulawesi Utara</option>
                        <option value="26">Sulawesi Tengah</option>
                        <option value="27">Sulawesi Selatan</option>
                        <option value="28">Sulawesi Tenggara</option>
                        <option value="29">Gorontalo</option>
                        <option value="30">Sulawesi Barat</option>
                        <option value="31">Maluku</option>
                        <option value="32">Maluku Utara</option>
                        <option value="33">Papua</option>
                        <option value="34">Papua Barat</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="form-label">Nomor Hp</label>
                      <input type="text" class="form-control form-control-user" id="nomor_hp" name="nomor_hp" placeholder="Input Nomor HP....." value="<?= set_value('nomor_hp'); ?>">
                      <?= form_error('nomor_hp', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <!-- <div class="form-group">
                      <label class="form-label">Upload Foto 3 x 4</label>
                      <input type="file" name="foto_profil" id="img-profile" class="form-control">
                    </div> -->

                    <!-- <div class="col-md-4"> -->
                    <div class="form-group">
                      <div id="my_camera"></div>
                      <!-- <br /> -->
                      <input type=button value="Take Snapshot" onClick="take_snapshot()">
                      <input type="hidden" name="image" class="image-tag">
                    </div>
                    <!-- <div class="col-md-4"> -->
                    <div class="form-group">
                      <div id="results">Your captured image will appear here...</div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Submit
                    </button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Configure a few settings and attach camera -->
    <script language="JavaScript">
      Webcam.set({
        // width: 260,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 90
      });

      Webcam.attach('#my_camera');

      function take_snapshot() {
        Webcam.snap(function(data_uri) {
          $(".image-tag").val(data_uri);
          document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
        });
      }
    </script>
</body>