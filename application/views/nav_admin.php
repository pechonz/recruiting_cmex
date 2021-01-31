<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e7e7e7;">
  <a class="navbar-brand" href="<?php echo site_url('admin');?>">
    <img src="<?php echo base_url('/assets/images/CMEx.png'); ?>" width="25" height="30" alt=""> ระบบประกาศรับสมัครงาน
  </a>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" title="เพิ่มประกาศ" data-toggle="modal" data-target="#createModal"><i class="fa fa-fw fa-plus-square"></i></a>
    </li>
        <li class="nav-item">
      <a class="nav-link" title="<?php $session_id = $this->session->userdata('username'); echo 'Login as '; echo $session_id;?>"><i class="fa fa-fw fa-user-plus"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" title="ออกจากระบบ" href="<?php echo site_url('login/logout');?>">
       <i class="fa fa-fw fa-sign-out-alt"></i>
      </a>
    </li>
  </ul>
</nav>