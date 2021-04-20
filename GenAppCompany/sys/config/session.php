<?php
if(empty($_SESSION['user_id'])&&empty($_SESSION['level']))
{
  header('location:login.php');

}
if(!($_SESSION['user_level']=='customer')){
    header('location:logout.php');
    exit();
}
 ?>
