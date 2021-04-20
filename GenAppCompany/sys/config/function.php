<?php
class FunctionClass{

  public function doSignup($firstname,$lastname,$tel,$email,$username,$password){
    $conn = getDB();
    //encode password md5
    $password = md5($password);
    $sql = "INSERT INTO customer (customer_firstname, customer_lastname,username,customer_email,customer_phone)
    VALUES ('$firstname', '$lastname','$username','$email', '$tel')";
    $sql2 = "INSERT INTO user(username,password) VALUES ('$username','$password') ";

     if (($conn->query($sql) === TRUE)&&($conn->query($sql2) === TRUE)) {
	   $last_id = $conn->insert_id;
	   //return $last_id;
     echo '<script language="JavaScript">
         alert("ลงทะเบียนสำเร็จ!");
         window.location.href = "login.php";
        </script>';
       }

    else {
     echo "Error: " . $sql . "<br>" . $conn->error;
	   //return null;
}
$conn->close();

  }
  public function doLogin($username,$password){
      $conn = getDB();
      //encode password md5
      $password = md5($password);
      $sql = "SELECT * FROM user WHERE username ='$username' AND password='$password'";
      $sqlCustomer = "SELECT * FROM customer WHERE username ='$username'";
      $sqlAdmin = "SELECT * FROM admin WHERE username ='$username'";

      $result = $conn->query($sql);
      $resultAdmin = $conn->query($sqlAdmin);
      $resultCustomer = $conn->query($sqlCustomer);
    if ($result->num_rows > 0){//has username
    //  $row = mysqli_fetch_assoc($result);
    if($resultAdmin->num_rows > 0){//correct username admin
      $row = mysqli_fetch_assoc($resultAdmin);
      $_SESSION['user_id']=$row['admin_id'];
      $_SESSION['user_level']="admin";
      header('location:admin_index.php?page=admindashboard');
      }
    else if($resultCustomer->num_rows > 0){//correct username customer
      $row = mysqli_fetch_assoc($resultCustomer);
      $_SESSION['user_id']=$row['customer_id'];
      $_SESSION['user_level']="customer";
      header('location:index.php?page=dashboard');
    }
    }
  else{
    echo '<script language="JavaScript">
        alert("ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง");
        window.location.href = "login.php";
       </script>';
      }
    $conn->close();
  }

  public function checkEmail($email){
    $conn = getDB();
    $sql = "SELECT user_email FROM user  WHERE user_email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0 ){
      return true;
    }
    else {
      return false;
        }
  }
  public function checkUsername($username){
    $conn = getDB();
    $sql = "SELECT user_username FROM user  WHERE user_username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0 ){
      return true;
    }
    else {
      return false;
        }
  }

  function random_password($len)////****Random Password
  {
      srand((double)microtime()*10000000);
      $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
      $ret_str = "";
      $num = strlen($chars);
      for($i = 0; $i < $len; $i++)
      {
          $ret_str.= $chars[rand()%$num];
          $ret_str.="";
      }
      return $ret_str;
  }

public function updatePassword($newpassword){
  $user_id=$_SESSION['user_id'];
  $newpassword = md5($newpassword);
  return $isUpdatePasssword=$this->updateData('user',"user_password='$newpassword'","WHERE user_id='$user_id'");
}

public function updatePasswordForGot($email,$newpassword){
  $newpassword = md5($newpassword);//UPDATE users SET password=:new_password WHERE email=:email
  return $isUpdatePasssword=$this->updateData('user',"user_password='$newpassword'","WHERE user_email='$email'");
}

public function insertData($table , $attri , $data){
  $conn = getDB();
  $sql = "INSERT INTO $table ($attri) VALUES ($data)";

  if ($conn->query($sql) === TRUE) {  //echo "New record created successfully";
  	  $last_id = $conn->insert_id;
  	  return $last_id;

  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  	return null;
  }

  $conn->close();

  }

  public function updateData($table,$set,$where){

    $conn = getDB();
    $sql = "UPDATE $table SET $set $where";
    //echo $sql ;
    if ($conn->query($sql) === TRUE) {
    return true;
  } else {
    return false;
    }

$conn->close();
}

public function selectData($attriSelect,$table,$whereData){
  $conn = getDB();
  $sql = "SELECT $attriSelect FROM $table  $whereData";
  $result = $conn->query($sql);

  if ($result->num_rows > 0 && $result->num_rows <2 ) {
      // output data of each row
   //$result->fetch_assoc();
  $row = mysqli_fetch_assoc($result);
   return $row;
  }

  else if ($result->num_rows >=2 ) {
  	$result->fetch_assoc();
    return $result;
  }
  else {
  	return null;
    //  echo "0 results";
  }

  $conn->close();
  }

  public function selectDataArr($attriSelect,$table,$whereData){
    $conn = getDB();
    $sql = "SELECT $attriSelect FROM $table  $whereData";
    $result = $conn->query($sql);

     if ($result->num_rows > 0 ) {
    	$result->fetch_assoc();
      return $result;
    }
    else {
    	return null;
      //  echo "0 results";
    }

    $conn->close();
    }

    public function deleteData($table,$where){
      $conn = getDB();
      // sql to delete a record
      $sql = "DELETE FROM $table  $where";

      if ($conn->query($sql) === TRUE) {
	       return true;
         // echo "Record deleted successfully";
       } else {
         return false;
  }

$conn->close();
	}

  //delete folder/*
  function rrmdir($dir) {
     if (is_dir($dir)) {
       $objects = scandir($dir);
       foreach ($objects as $object) {
         if ($object != "." && $object != "..") {
           if (filetype($dir."/".$object) == "dir"){
              rrmdir($dir."/".$object);
           }else{
              unlink($dir."/".$object);
           }
         }
       }
       reset($objects);
       rmdir($dir);
    }
}
}
?>
