 <?php
include('config/connect_db.php');
include('config/session.php');
include('config/function.php');
$functionClass = new FunctionClass();
$user_id = $_SESSION['user_id'];
$objCustomer = $functionClass->selectData('*','customer',"WHERE customer_id ='$user_id'");
?>

<nav id="sidebar">
  <div id="main-menu">
    <ul class="sidebar-nav">
      <br>
      <li>
        <a><i class="glyph-icon flaticon-account"></i>
          <span class="sidebar-text">ผู้ใช้<br>(<?php echo $objCustomer['customer_firstname'].' '.$objCustomer['customer_lastname']?>)</span>
        </a>
      </li>
      <li class="">
          <a href="index.php?page=appcreate"><i class="fa fa-plus-circle"></i><span class="sidebar-text"> สร้างแอปพลิเคชัน</span></a>
      </li>
      <li class=""> <!--<button id="create-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i>สร้างแอป</button>-->
        <a href="index.php?page=dashboard"><i class="fa fa-pencil-square-o"></i><span class="sidebar-text">จัดการแอปพลิเคชัน</span></a>
      </li>
      <li class=""> <!-- current-->
        <a href="index.php?page=changepassword"><i class="fa fa-key"></i><span class="sidebar-text">จัดการรหัสผ่าน</span></a>
      </li>
      <li class=""> <!-- current-->
        <a href="logout.php"><i class="fa fa-power-off"></i><span class="sidebar-text">ออกจากระบบ</span></a>
      </li>

    </ul>
  </div>
</nav>
