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
      size: 3.39in 2.14in;
      margin: none;
      padding: none;
    }

    @page {
      size: A6 landscape;
    }

    .page {
      margin: none;
      /* padding: none; */
    }

    .lembar1 {
      background-image: url("<?= base_url('assets/img/') ?>kartu/front.png");
      /* background-image: url("<?= base_url('assets/img/') ?>kartu/sertifikat_depan.png"); */
      background-size: cover;
      background-repeat: no-repeat;
      /* background-repeat: no-repeat; */
      padding: 0;
      margin: none;
    }

    .kiri {
      text-align: left;
      padding-left: 10px;
      padding-top: 8px;
    }

    .kiri b {
      color: grey;
    }

    .kanan {
      position: relative;
      padding: 10px;
      bottom: 100px;
      float: right;
      object-fit: none;
      object-position: top;
    }

    .qrcode {
      padding-left: 10px;
    }

    .qrcode b {
      color: grey;
    }

    .bawah {
      text-align: right;
      padding-right: 10px;
      padding-bottom: 8px;
    }

    .bawah b {
      color: gray;
    }

    .bagian_kanan {
      padding-left: 220px;
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

<body class="A6 landscape">
  <div class="page">
    <div class="lembar1 sheet padding-10mm">

      <!-- Write HTML just like a web page -->
      <div class="container">

        <div class="kiri">
          <h3><?= $title; ?><br><b>Anggota</b></h3>
          <p><?= $users['tanggal_lahir'] ?></p>
        </div>
        <div class="kanan">
          <img src="<?= base_url('assets/img/profile/') . $gambar_logo ?>" alt="LogoGambar" align="right" height="70px" width="110px">
        </div>
      </div>
      <br>
      <table>
        <tr>
          <td class="bagian_kiri">
            <div class="qrcode">
              <img src="<?= base_url('assets/img/kartu/') . $gambar_name ?>" alt="QrCode" height="100px" width="100px"><br>
              <h4><?= $users['nik'] ?><br><b><?= $users['alamat'] ?></b></h4>
            </div>
          </td>
          <td class="bagian_kanan">
            <div class="bawah">
              <img src="<?= base_url('assets/img/profile/') . $users['foto'] ?>" alt="foto_profile" align="right" height="100px" width="100px"><br><br><br>
              <h3><?= $users['full_name'] ?><br><b><?= $users['kebangsaan'] ?></b></h3>
            </div>
          </td>
        </tr>
      </table>
    </div>
  </div>
  <script type="text/javascript">
    window.print();
  </script>
</body>

</html>