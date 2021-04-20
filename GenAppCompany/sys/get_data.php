<?php
include('config/connect_db.php');
include('config/session.php');
include('config/function.php');

switch ($_POST['case']) {
  case 'get_mainloation':
  $functionClass = new FunctionClass();
  $location_app_id = $_POST['location_app_id'];
  $resultMainLocation =  $functionClass->selectData('*','location_app',"WHERE location_app_id = '$location_app_id'");
  echo $resultMainLocation['main_location_app_id'];
    //var_dump("2");

    break;

  default:
    # code...
    break;
}


 ?>
