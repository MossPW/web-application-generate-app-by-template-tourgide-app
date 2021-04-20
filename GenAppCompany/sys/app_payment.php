<?php
$app_id = $_GET['app_id'];
$objApp = $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
$isUpdate = $functionClass->updateData('app',"app_status='pending'","WHERE app_id='$app_id'");

 if($isUpdate){
   echo '<script type="text/javascript"> window.alert("จ่ายเงินเสร็จสิ้น กรุณารอผู้ดูแลระบบอนุมัติ!"); window.location.href="index.php?page=dashboard";</script>';

 }
?>
