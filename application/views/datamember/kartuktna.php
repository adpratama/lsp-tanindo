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
      size: 5.5in 8.5in;
    }

    @page {
      size: A7 landscape;
    }

    .page {
      margin: none;
    }

    .lembar1 {
      background-image: url("<?= base_url('assets/img/') ?>kartu/front.png");
      background-size: 100% 95%;
      background-repeat: no-repeat;
      /* background-repeat: no-repeat; */
      padding: 0;
      margin: none;
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
</head>

<!-- Set "A5" , "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->

<body class="A7 landscape">
  <div class="page">
    <div class="lembar1 sheet padding-10mm">

      <!-- Write HTML just like a web page -->
      <h3><?= $title; ?></h3>

    </div>
  </div>
</body>

</html>