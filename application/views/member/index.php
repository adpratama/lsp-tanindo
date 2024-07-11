<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">List Data Member</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <!--  -->
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No.</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Nomor Hp</th>
              <th>Jenis Kelamin</th>
              <th>Kebangsaaan</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <!-- <?php $no = $this->uri->segment('3') + 1; ?> -->
            <?php $no = 1; ?>
            <?php foreach ($users as $u) : ?>
              <tr>
                <td><?= $no++; ?></td>
                <td><?= $u['nik'] ?></td>
                <td><?= $u['full_name'] ?></td>
                <td><?= $u['email'] ?></td>
                <td><?= $u['phone_number'] ?></td>
                <td><?= $u['jenkel'] ?></td>
                <td><?= $u['kebangsaan'] ?></td>
                <td>
                  <!-- //data-toggle="modal" data-target="#edit<?= $u['uid'] ?>" -->
                  <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?= $u['uid'] ?>"><i class="far fa-eye"></i>Detail</button>
                  <!-- href="<?= base_url('member/deletesubmember/' . $u['uid']) ?>" onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini ?')"-->
                  <!-- <a class="btn btn-success btn-sm"><i class="fas fa-print"></i>Print Id Card</a> -->
                  <a class="btn btn-success btn-sm" href="<?= base_url('member/kartumember/' . $u['nik']) ?>" onclick="printContent()">
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
              <th>NIK</th>
              <th>Nama</th>
              <th>Email</th>
              <th>Nomor Hp</th>
              <th>Jenis Kelamin</th>
              <th>Kebangsaaan</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
        <br>
        <div class="row">
          <div class="col-sm">
            <!-- <?= $this->pagination->create_links(); ?> -->
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Edit Menu -->
<?php foreach ($users as $u) : ?>
  <div class="modal fade" id="edit<?= $u['uid'] ?>" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editLabel">Detail Data Member</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="<?= base_url('menu/editsubmenu/' . $u['uid']) ?>" method="POST">
          <div class="modal-body">
            <h4><b>Biodata</b></h4>
            <div class="form-group">
              <input type="text" class="form-control" id="title" name="title" value="<?= $u['full_name'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="url" name="url" value="<?= $u['email'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="icon" name="icon" value="<?= $u['kebangsaan'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="url" name="url" value="<?= $u['alamat'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="icon" name="icon" value="<?= $u['pendidikan_terakhir'] ?>">
            </div>
            <hr>
            <h4><b>Riwayat Pekerjaan</b></h4>
            <hr>
            <div class="form-group">
              <input type="text" class="form-control" id="icon" name="icon" value="<?= $u['nama_perusahaan'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="url" name="url" value="<?= $u['jabatan'] ?>">
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="icon" name="icon" value="<?= $u['alamat_kantor'] ?>">
            </div>
            <hr>
            <h4><b>Berkas</b></h4>
            <hr>
            <div class="form-group">
              <label for="cname" class='control-label col-sm-2'>Foto </label>
              <Select class="form-control" name="foto">
                <option value='<?= $u['foto'] ?>' <?php if ($u['foto'] != '') echo "selected"; ?>>Sudah Upload</option>
                <option value='' <?php if ($u['foto'] == '') echo "selected"; ?>>Belum Upload</option>
              </Select>
            </div>
            <div class="form-group">
              <label for="cname" class='control-label col-sm-2'>Sertifikat </label>
              <Select class="form-control" name="sertif">
                <option value='<?= $u['sertif'] ?>' <?php if ($u['sertif'] != '') echo "selected"; ?>>Sudah Upload</option>
                <option value='' <?php if ($u['sertif'] == '') echo "selected"; ?>>Belum Upload</option>
              </Select>
            </div>
            <div class="form-group">
              <label for="cname" class='control-label col-sm-4'>Kartu Keluarga </label>
              <Select class="form-control" name="kartu_keluarga">
                <option value='<?= $u['kartu_keluarga'] ?>' <?php if ($u['kartu_keluarga'] != '') echo "selected"; ?>>Sudah Upload</option>
                <option value='' <?php if ($u['kartu_keluarga'] == '') echo "selected"; ?>>Belum Upload</option>
              </Select>
            </div>
            <div class="form-group">
              <label for="cname" class='control-label col-sm-4'>Surat Keterangan </label>
              <Select class="form-control" name="surat_keterangan">
                <option value='<?= $u['surat_keterangan'] ?>' <?php if ($u['surat_keterangan'] != '') echo "selected"; ?>>Sudah Upload</option>
                <option value='' <?php if ($u['surat_keterangan'] == '') echo "selected"; ?>>Belum Upload</option>
              </Select>
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