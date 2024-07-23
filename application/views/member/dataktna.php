<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <!-- Button trigger modal -->
  <!-- <a type="button" class="btn btn-primary" href="<?= base_url('member/print_ktna') ?>"> -->
  <a type="button" class="btn btn-primary" href="<?= base_url('member/report_excel') ?>">
    Print Excel
  </a>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Berita</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIA</th>
              <th>Nama</th>
              <th>Jabatan</th>
              <th>Alamat</th>
              <th>Nomor Hp</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($profil as $p) : ?>
              <?php
              if ($p['jabatan'] == 1) {
                $jabatan_user = 'Ketua Umum';
              } elseif ($p['jabatan'] == 2) {
                $jabatan_user = 'Sekertariat Jendral';
              } elseif ($p['jabatan'] == 3) {
                $jabatan_user = 'Bendahara Umum';
              } elseif ($p['jabatan'] == 4) {
                $jabatan_user = 'Ketua Provinsi';
              } elseif ($p['jabatan'] == 5) {
                $jabatan_user = 'Dep. Kelautan dan Perikanan';
              } elseif ($p['jabatan'] == 6) {
                $jabatan_user = 'Dep. Kemitraan Strategis dan Advokasi';
              } elseif ($p['jabatan'] == 7) {
                $jabatan_user = 'Dep.LITBANG';
              } elseif ($p['jabatan'] == 8) {
                $jabatan_user = 'Dep. Media Informasi dan Komunikasi';
              } elseif ($p['jabatan'] == 9) {
                $jabatan_user = 'Dep. Hukum & HAM';
              } else {
                $jabatan_user = 'Anggota';
              }
              ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $p['nomor_urut'] ?></td>
                <td><?= $p['full_name'] ?></td>
                <td>
                  <?= $jabatan_user; ?>
                </td>
                <td><?= $p['alamat'] ?></td>
                <td><?= $p['phone_number'] ?></td>
                <td>
                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $p['uid'] ?>"><i class="far fa-eye"></i>Detail</button>
                  <a class="btn btn-success btn-sm" href="<?= base_url('member/kartuktna/' . $p['nik']) ?>" onclick="printContent()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-down-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z" />
                    </svg>&nbsp;
                    Print Id Card
                  </a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
          <tfoot>
            <tr>
              <th>No.</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Nomor Hp</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
        <br>
      </div>
    </div>
  </div>
  <!-- DataTales Example End -->

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Edit Menu -->
<?php foreach ($profil as $pr) : ?>
  <div class="modal fade" id="edit<?= $pr['uid'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Detail Data Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu/editsubmenu/' . $pr['uid']) ?>" method="POST">
          <div class="modal-body">
            <h4><b>Biodata</b></h4>
            <div class="form-group">
              <input type="text" class="form-control" id="icon" name="icon" value="<?= $pr['nomor_urut'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="title" name="title" value="<?= $pr['full_name'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="url" name="url" value="<?= $pr['email'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="url" name="url" value="<?= $pr['alamat'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="icon" name="icon" value="<?= $pr['phone_number'] ?>">
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <!-- <button type="submit" class="btn btn-primary">Update</button> -->
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>