<?php
include('config/connect_db.php');
include('config/sessionAdmin.php');
include('config/function.php');
$functionClass = new FunctionClass();
$user_id = $_SESSION['user_id'];
$objAdmin = $functionClass->selectData('*','admin',"WHERE admin_id ='$user_id'");
?>

<nav id="sidebar">
  <div id="main-menu">
    <ul class="sidebar-nav">
      <br>
      <li>
        <a><i class="glyph-icon flaticon-account"></i>
          <span class="sidebar-text">ผู้ดูแลระบบ<br>(<?php echo $objAdmin['admin_firstname'].' '.$objAdmin['admin_lastname']?>)</span>
        </a>
      </li>
      <li class=""> <!-- current-->
        <a href="admin_index.php?page=admindashboard"><i class="fa fa-pencil-square-o"></i><span class="sidebar-text">จัดการแอปพลิเคชัน</span></a>
      </li>
    <!--
        <a href="admin_index.php?page=admincomplete"><i class="fa fa-folder-open"></i><span class="sidebar-text">ประวัติการอัพโหลด</span></a>
      </li> -->
      <li class=""> <!-- current-->
        <a href="admin_index.php?page=adminchangepassword"><i class="fa fa-key"></i><span class="sidebar-text">จัดการรหัสผ่าน</span></a>
      </li>
      <li class=""> <!-- current-->
        <a href="logout.php"><i class="fa fa-power-off"></i><span class="sidebar-text">ออกจากระบบ</span></a>
      </li>


    </ul>
  </div>
</nav>
