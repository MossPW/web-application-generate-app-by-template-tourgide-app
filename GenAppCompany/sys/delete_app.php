<?php
$app_id = $_GET['app_id'];
$objApp = $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
$arrLocation = $functionClass->selectDataArr('*','location_app',"WHERE app_id = '$app_id'");
if(!empty($arrLocation)){

  foreach ($arrLocation as $value) {
    //delete question form location app id
    $location_app_id = $value['location_app_id'];
    $functionClass->deleteData('question_app',"WHERE location_app_id = '$location_app_id'");
}
}
//delete location form app id
$functionClass->deleteData('location_app',"WHERE app_id = '$app_id'");
//delete main location
$functionClass->deleteData('main_location_app',"WHERE app_id = '$app_id'");
//delete app form app id
$functionClass->deleteData('app',"WHERE app_id = '$app_id'");
//remove folder
$functionClass->rrmdir('files/file_app/'."$app_id".'/'.'location');
$functionClass->rrmdir('files/file_app/'."$app_id".'/'.'file_android');
$functionClass->rrmdir('files/file_app/'."$app_id".'/'.'file_zip_android');
$functionClass->rrmdir('files/file_app/'."$app_id".'/'.'file_apk');
$functionClass->rrmdir('files/file_app/'."$app_id".'/'.'app');
$functionClass->rrmdir('files/file_app/'."$app_id");


//if($deletefile&&$isUpdate){
  echo '<script type="text/javascript"> window.alert("ลบแอปพลิเคชันสำเร็จ!"); window.location.href="index.php?page=dashboard";</script>';
/*
}
else{
  echo '<script type="text/javascript"> window.alert("ไม่สามารถลบแอปพลิเคชันได้!"); window.location.href="index.php?page=dashboard";</script>';

}
*/
 ?>
