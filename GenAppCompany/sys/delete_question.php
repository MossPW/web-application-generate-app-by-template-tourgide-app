<?php
$page = $_GET['oldpage'];
$question_app_id = $_GET['question_app_id'];
$app_id = $_GET['app_id'];
$location_app_id = $_GET['location_app_id'];

  //delete question form question_app_id
$removeQoestionFormQuestionId = $functionClass->deleteData('question_app',"WHERE question_app_id = '$question_app_id'");



if($removeQoestionFormQuestionId){
  echo '<script type="text/javascript"> window.alert("ลบคำถามสำเร็จ!"); window.location.href="index.php?page='.$page.'&app_id='.$app_id.'&location_app_id='.$location_app_id.'";</script>';

}
else{
    echo '<script type="text/javascript"> window.alert("ไม่สามารถลบคำถามได้!"); window.location.href="index.php?page='.$page.'&app_id='.$app_id.'&location_app_id='.$location_app_id.'";</script>';

}

 ?>
