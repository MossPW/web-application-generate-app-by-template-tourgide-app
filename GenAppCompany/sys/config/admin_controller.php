<?php

/* เช็คก่อนว่ามีการส่งค่าแบบ GET ผ่านแอตทริบิวต์ชื่อ 'page' มาหรือไม่ถ้ามีถึงจะเข้าไปทำ*/
if(isset($_GET['page'])){

$page = $_GET['page'];
/* เช็คค่าจากตัวแปรที่ได้รับมาจากการส่งค่าแบบ GET ว่าเข้าเคสไหน  */
switch ($page) {

	case 'admindashboard':

	include('admin_dashboard.php');

		break;

  case 'admincomplete':

  include('admin_complete.php');

    break;
  case 'adminupload':

  include('admin_upload_apk_file.php');

    break;

	case 'adminchangepassword':

		include('admin_changepassword.php');

			break;

		case 'delfile_apk':

		include('delfile_apk.php');

			break;

		case 'genCode':

		include('genCode.php');

		break;
		case 'gen':

		include('gen.html');

		break;
		case 'download_file_android':

	  include('download_file_android.php');

	 	break;

	default:
		# code...
		break;
}
}


 ?>
