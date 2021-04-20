<?php
$page = $_GET['oldpage'];
$main_location_app_id = $_GET['main_location_app_id'];
$removeImg="";
$removeQuestionFormLocation="";
$arrLocation = $functionClass->selectDataArr('*','location_app',"WHERE main_location_app_id = '$main_location_app_id'");
if(!empty($arrLocation)){
foreach ($arrLocation as $value) {
  $location_app_id = $value['location_app_id'];
  $app_id = $value['app_id'];
  //delete question form location app id
  $removeQuestionFormLocation = $functionClass->deleteData('question_app',"WHERE location_app_id = '$location_app_id'");
  //name file pic location
  $namefFileLocation = $value['location_app_pic'];
  //remove img location
  $removeImg = unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namefFileLocation");
  //remove more img location
  $location_app_more_pic = $value['location_app_more_pic'];

  if(!empty($location_app_more_pic)){
  $arrLocationMorepic = explode(",", $location_app_more_pic);
  for($i=0;$i<count($arrLocationMorepic);$i++){
    $namepic = $arrLocationMorepic[$i];
    $removeMoreImg = unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namepic");
  }
  }
}
}
else{
  $removeImg = 1; //defult case don't have arr location
  $removeQuestionFormLocation = 1; //same upper
}
//remove all location of mainlocation
$removeLocation = $functionClass->deleteData('location_app',"WHERE main_location_app_id = '$main_location_app_id'");

$objMainLocation = $functionClass->selectData('*','main_location_app',"WHERE main_location_app_id = '$main_location_app_id'");
$app_id = $objMainLocation['app_id'];
//name file pic Mainlocation
$namefFileMainLocation = $objMainLocation['main_location_app_pic'];
//remove img Mainlocation
$removeImg = unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namefFileMainLocation");
//remove main location
$removeMainLocation = $functionClass->deleteData('main_location_app',"WHERE main_location_app_id = '$main_location_app_id'");




if($removeQuestionFormLocation&&$removeLocation&&$removeImg&&$removeMainLocation){
  echo '<script type="text/javascript"> window.alert("ลบสถานที่หลักสำเร็จ!"); window.location.href="index.php?page='.$page.'&app_id='.$app_id.'";</script>';

}
else{
    echo '<script type="text/javascript"> window.alert("ไม่สามารถลบสถานที่หลักได้!"); window.location.href="index.php?page='.$page.'&app_id='.$app_id.'";</script>';

}

 ?>
