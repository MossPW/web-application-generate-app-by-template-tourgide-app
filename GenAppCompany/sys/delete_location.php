<?php
$page = $_GET['oldpage'];
$location_app_id = $_GET['location_app_id'];
  //delete question form location app id
$removeQuestionFormLocation = $functionClass->deleteData('question_app',"WHERE location_app_id = '$location_app_id'");

$objLocation = $functionClass->selectData('*','location_app',"WHERE location_app_id = '$location_app_id'");
$app_id = $objLocation['app_id'];
//remove location more pic
$location_app_more_pic = $objLocation['location_app_more_pic'];

if(!empty($location_app_more_pic)){
$arrLocationMorepic = explode(",", $location_app_more_pic);
for($i=0;$i<count($arrLocationMorepic);$i++){
  $namepic = $arrLocationMorepic[$i];
  $removeMoreImg = unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namepic");
}
}
$namefFileLocation = $objLocation['location_app_pic'];
//delete location form app location_app_id
$removeLocation = $functionClass->deleteData('location_app',"WHERE location_app_id = '$location_app_id'");
//remove img location
$removeImg = unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namefFileLocation");
//remove folder$functionClass->rrmdir('files/file_app/'."$app_id".'/'.'location');


if($removeQuestionFormLocation&&$removeLocation&&$removeImg){
  echo '<script type="text/javascript"> window.alert("ลบสถานที่สำเร็จ!"); window.location.href="index.php?page='.$page.'&app_id='.$app_id.'";</script>';

}
else{
    echo '<script type="text/javascript"> window.alert("ไม่สามารถลบสถานที่ได้!"); window.location.href="index.php?page='.$page.'&app_id='.$app_id.'";</script>';

}

 ?>
