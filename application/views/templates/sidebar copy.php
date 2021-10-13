<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon">
      <img class="ml-2" src="<?= base_url('assets/img/logome.png'); ?>" width="40px" alt="">
    </div>
    <div class="sidebar-brand-text mx-3">HMTME Database</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- QUERY MENU -->
  <?php
  $role_id = $this->session->userdata('role_id');
  $queryMenus = "SELECT `user_menu`.`id`, `menu`
                  FROM `user_menu` JOIN `user_access_menu`  
                    ON `user_menu`.`id` = `user_access_menu`.`menu_id`
                 WHERE `user_access_menu`.`role_id`=$role_id
                ORDER BY `user_access_menu`.`menu_id` ASC
              ";
  $menus = $this->db->query($queryMenus)->result_array();
  ?>

  <!-- Looping Menu -->
  <?php foreach ($menus as $menu) : ?>
    <div class="sidebar-heading">
      <?= $menu['menu']; ?>
    </div>
    <?php
    $subMenus['user_sub_menu'] = $this->db->get_where('user_sub_menu', ['menu_id' => $menu['id']])->row_array();
    ?>

    <?php foreach ($subMenus as $subMenu) : ?>
      <?php if ($title == $subMenu['title']) : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>
        <a class="nav-link" href="<?= base_url($subMenu['url']); ?>">
          <i class="<?= $subMenu['icon']; ?>"></i>
          <span><?= $subMenu['title']; ?></span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">


      <?php endforeach ?>

    <?php endforeach; ?>
    <!-- Nav Item - Dashboard -->

    <li class="nav-item">
      <a class="nav-link" href="<?= base_url('Auth/logout'); ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
        <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->