<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?= $title; ?></title>

  <!-- icon -->
  <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('material/') ?>assets/img/gallery/logo-icon-tanindo.png" />

  <!-- CSS untuk paginasi -->
  <style>
    /* Pagination styles */
    .pagination {
      display: flex;
      padding: 1em 0;
    }

    .pagination a,
    .pagination strong {
      border: 1px solid silver;
      border-radius: 8px;
      color: black;
      padding: 0.5em;
      margin-right: 0.5em;
      text-decoration: none;
    }

    .pagination a:hover,
    .pagination strong {
      border: 1px solid #008cba;
      background-color: #008cba;
      color: white;
    }
  </style>

  <!-- data table -->
  <link href="https://cdn.datatables.net/v/bs4/dt-2.0.8/datatables.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css"> -->

  <!-- Custom fonts for this template-->
  <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?= base_url('assets/css/') ?>profile.css">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">