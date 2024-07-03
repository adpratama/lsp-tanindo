<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-info sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon ">
      <img src="<?= base_url('material/assets/'); ?>/img/gallery/logo-tanindo.png" alt="icon" width="100" height="80" class="img-fluid">
      <!-- <i class="fas fa-vihara"></i>http://localhost/pertanian/material/assets/img/gallery/logo-tanindo.png -->
    </div>
    <!-- <div class="sidebar-brand-text mx-3">LSP Tanindo</div> -->
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Query menu -->
  <?php
  $role_id = $this->session->userdata('status_member');
  $queryMenu = "SELECT `user_menu`.`uid`,`user_menu`.`menu` FROM `user_menu` JOIN `user_access_menu` ON `user_menu`.`uid` = `user_access_menu`.`menu_id` WHERE `user_access_menu`.`role_id` =$role_id ORDER BY `user_access_menu`.`menu_id` ASC
  ";

  $menu = $this->db->query($queryMenu)->result_array();
  // var_dump($menu);
  // die;
  ?>

  <!-- Looping mEnu -->
  <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
      <b class="text-dark" style="font-size: medium;"><?= $m['menu']; ?></b>
    </div>
    <!-- siapkan sub menu  -->
    <?php
    $menuid = $m['uid'];
    $querysubmenu = "SELECT * FROM `user_sub_menu` WHERE`menu_id` =$menuid AND `is_active` =1";
    $submenu = $this->db->query($querysubmenu)->result_array();
    // var_dump($submenu);
    // die;
    ?>

    <?php foreach ($submenu as $sm) : ?>
      <!-- Nav Item - Dashboard -->
      <?php if ($title == $sm['title']) : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link pb-0" href="<?= base_url($sm['url']) ?>">
          <i class="<?= $sm['icon'] ?>"></i>
          <span><?= $sm['title'] ?></span>
        </a>
        </li>
      <?php endforeach; ?>
      <!-- Divider -->
      <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>

    <!-- Nav Item - Dashboard -->
    <!-- <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
    Data
  </div> -->

    <!-- Nav Item - data -->
    <!-- <li class="nav-item">
    <a class="nav-link" href="<?= base_url('datamember') ?>">
      <i class="fas fa-folder-open"></i>
      <span>Data Member</span>
    </a>
  </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Heading -->
    <!-- <div class="sidebar-heading">
    User
  </div> -->

    <!-- Nav Item - User -->
    <!-- <li class="nav-item">
    <a class="nav-link" href="<?= base_url('user') ?>">
      <i class="fas fa-user-tie"></i>
      <span>My Profile</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('user/edit_profile') ?>">
      <i class="fas fa-user-shield"></i>
      <span>Edit Profile</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('user/change_password') ?>">
      <i class="fas fa-user-lock"></i>
      <span>Change Password</span>
    </a>
  </li> -->

    <!-- Nav Item - biodata -->
    <!-- <li class="nav-item">
    <a class="nav-link" href="<?= base_url('biodata') ?>">
      <i class="fas fa-users-cog"></i>
      <span>Biodata</span>
    </a>
  </li> -->

    <!-- Divider -->
    <!-- <hr class="sidebar-divider"> -->

    <!-- Nav Item - profile -->
    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
        <i class="fas fa-sign-out-alt"></i>
        <span>Logout</span>
      </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->