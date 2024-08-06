<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <link rel="icon" type="image/x-icon" href="<?= base_url('assets/img') ?>profile/favico.ico" />

  <style>
    @page {
      size: 3.370in 2.125in;
      margin: none;
      padding: none;
    }

    @page {
      size: A7 landscape;
    }

    .page {
      margin: none;
    }

    .lembar1 {
      background-image: url("<?= base_url('assets/img/') ?>kartu/front.png");
      background-size: cover;
      background-repeat: no-repeat;
      padding: 0;
      margin: none;
    }

    .lembar2 {
      background-image: url("<?= base_url('assets/img/') ?>kartu/front.png");
      background-size: cover;
      background-repeat: no-repeat;
      padding: 0;
      margin: none;
    }

    .text-header {
      padding-top: 10px;
      padding-left: 10px;
    }

    .text-isi {
      padding-left: 10px;
    }

    .text-tengah {
      text-align: center;
      width: 200px;
      padding-left: 100px;
    }

    .kiri {
      width: 180px;
      padding-left: 10px;
    }

    .kiri b {
      color: gray;
    }

    .kanan {
      padding-bottom: 60px;
      padding-left: 110px;
    }

    .bagian_kanan {
      padding-left: 60px;
      padding-right: 10px;
      text-align: right;
      font-size: small;
    }

    .bagian_kiri {
      padding-left: 10px;
      width: 180px;
      font-size: small;
    }

    .bawah {
      padding-left: 35px;
    }
  </style>
  <!-- Load paper.css for happy printing -->
  <!-- <link rel="stylesheet" href="dist/paper.css"> -->

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <!-- <style>@page { size: A4 landscape }</style> -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css"> -->
  <link rel="stylesheet" media="screen" href="main.css" />
  <link rel="stylesheet" media="print" href="print.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Dosis:wght@300&display=swap" rel="stylesheet">
</head>

<!-- Set "A5" , "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A7 landscape">
  <div class="page">
    <div class="lembar1 sheet padding-10mm">

      <!-- kondisi buat dapet jabatan -->
      <?php
      if ($profil['jabatan'] == 1) {
        $jabatan_user = 'Ketua Umum';
      } elseif ($profil['jabatan'] == 2) {
        $jabatan_user = 'Sekertariat Jendral';
      } elseif ($profil['jabatan'] == 3) {
        $jabatan_user = 'Bendahara Umum';
      } elseif ($profil['jabatan'] == 4) {
        $jabatan_user = 'Ketua Provinsi';
      } elseif ($profil['jabatan'] == 5) {
        $jabatan_user = 'Dep. Kelautan dan Perikanan';
      } elseif ($profil['jabatan'] == 6) {
        $jabatan_user = 'Dep. Kemitraan Strategis dan Advokasi';
      } elseif ($profil['jabatan'] == 7) {
        $jabatan_user = 'Dep.LITBANG';
      } elseif ($profil['jabatan'] == 8) {
        $jabatan_user = 'Dep. Media Informasi dan Komunikasi';
      } elseif ($profil['jabatan'] == 9) {
        $jabatan_user = 'Dep. Hukum & HAM';
      } else {
        $jabatan_user = 'Anggota';
      }
      ?>

      <!-- Write HTML just like a web page -->
      <table>
        <tr>
          <td>
            <div class="kiri">
              <h5><?= $title; ?><br><b>Kontak Tani Nelayan Andalan (KTNA)</b><br><?= $profil['full_name'] ?></h5>
            </div>
          </td>
          <td>
            <div class="kanan">
              <img src="<?= base_url('assets/img/profile/') . $gambar_logo ?>" alt="LogoGambar" align="right" height="70px" width="70px">
            </div>
          </td>
        </tr>
      </table>
      <br>
      <table>
        <tr>
          <td class="bagian_kiri">
            <div class="qrcode">
              <img src="<?= base_url('assets/img/kartu/') . $gambar_name ?>" alt="QrCode" height="90px" width="90px"><br>
              <!-- <h6>23-00-000001</h6> -->
              <b><?= $profil['nomor_urut'] ?></b>
            </div>
          </td>
          <td class="bagian_kanan">
            <div class="bawah">
              <img src="<?= base_url('assets/img/profile/') . $profil['image'] ?>" alt="foto_profile" height="90px" width="70px"><br>
            </div>
            <b><?= $jabatan_user ?></b>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <br>
  <div class="lembar2">
    <h6 class="text-header">Ketentuan :</h6>
    <h6 class="text-isi">
      kartu ini adalah Kartu Tanda Anggota (KTA) Kelompok Kontak Tani Nelayan Andalan dan berlaku selama pegang kartu masih berstatus sebagai anggota Kontak Tani Nelayan Andalan <br>
      Pengguna KTA ini diatur melalui petunjuk yang di terbitkan oleh Pengguna kelompok Tani Nelayan Andalan <br>
      Setiap Anggota harus dapat menujukkan KTA pada setiap kegiatan yang berkaitan dengan Kelompok Kontak Tani Nelayan Andalan <br>
      Jika menemukan KTA ini mohon dikembalikan ke sekertariat kelompok Kontak Tani Nelayan Andalan <br>

    </h6>
    <h6 class="text-tengah" align="center">
      Kampus Kementan Gedung D lt.V Jl. harsono R.M No. 3 Ragunan Pasar Minggu - Jakarta selatan 12551 Telp : 021-7826084
    </h6>
    <br><br>
  </div>
  <script type="text/javascript">
    function printContent() {
      window.print()
    }
  </script>
</body>

</html>