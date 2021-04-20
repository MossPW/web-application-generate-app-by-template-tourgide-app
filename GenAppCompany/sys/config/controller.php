<?php

/* เช็คก่อนว่ามีการส่งค่าแบบ GET ผ่านแอตทริบิวต์ชื่อ 'page' มาหรือไม่ถ้ามีถึงจะเข้าไปทำ*/
if(isset($_GET['page'])){

$page = $_GET['page'];
/* เช็คค่าจากตัวแปรที่ได้รับมาจากการส่งค่าแบบ GET ว่าเข้าเคสไหน  */
switch ($page) {
	case 'dashboard':
	include('dashboard.php');

		break;

case 'changepassword':

		include('changepassword.php');
			break;

  case 'appcreate':

    include('app_create.php');
      break;

	case 'deleteapp':

		include('delete_app.php');

					break;

	 case 'editapp':

 	   include('edit_app.php');

 	       break;

	case 'mainlocationcreate':
			   	include('main_location_create.php');

	 break;

  case 'locationcreate':
  	include('location_create.php');
  break;

	case 'deletemainlocation':
		include('delete_mainlocation.php');
	break;

	case 'deletelocation':
		include('delete_location.php');
	break;

	case 'editmainlocation':

	 include('edit_mainlocation.php');

			  break;

	case 'editlocation':

	 include('edit_location.php');

			  break;

  case 'questioncreate':
    include('questioncreate.php');
  break;

	case 'editquestion':
		include('edit_question.php');
	break;

	case 'deletequestion':
		include('delete_question.php');
	break;

	case 'apppayment':

	include('app_payment.php');

	 break;

	 case 'apppaymentdetail':

	 include('app_payment_detail.php');

		break;

 	case 'downloadapk':

 include('download_file_apk.php');

	break;


	default:
		echo "55";
		break;
}
}


 ?>
