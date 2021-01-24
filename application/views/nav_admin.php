<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e7e7e7;">
  <a class="navbar-brand" href="<?php echo site_url('admin');?>">
    <img src="<?php echo base_url('/assets/images/CMEx.png'); ?>" width="25" height="30" alt=""> ระบบประกาศรับสมัครงาน
  </a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" title="เพิ่มประกาศ" href="#" data-toggle="modal" data-target="#createModal"><i class="fa fa-fw fa-user-plus"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" title="ออกจากระบบ" href="<?php echo site_url('login');?>">
       <i class="fa fa-fw fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>