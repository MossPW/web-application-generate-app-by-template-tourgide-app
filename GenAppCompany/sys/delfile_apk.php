<?php

$app_id = $_GET['app_id'];
$objApp = $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
$name_file_apk = $objApp['app_apk'];


$isUpdate = $functionClass->updateData('app',"app_apk=''","WHERE app_id='$app_id'");
$deletefile = unlink('files/file_app/'."$app_id".'/'.'file_apk'.'/'. "$name_file_apk");


if($deletefile&&$isUpdate){
  echo '<script type="text/javascript"> window.alert("ลบไฟล์สำเร็จ!"); window.location.href="admin_index.php?page=adminupload&app_id='.$app_id.'";</script>';

}
else{
  echo '<script type="text/javascript"> window.alert("ไม่สามารถลบไฟล์ได้!"); window.location.href="admin_index.php?page=adminupload&app_id='.$app_id.'";</script>';

}


?>
