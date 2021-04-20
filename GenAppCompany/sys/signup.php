<?php
include('config/connect_db.php');
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>GEN APP COMPANY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="template/assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="template/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="template/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/assets/css/plugins.css" rel="stylesheet">
    <link href="template/assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
    <link href="template/assets/css/style.min.css" rel="stylesheet">
    <!-- END  MANDATORY STYLE -->
    <script src="template/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body class="login fade-in" data-page="signup">
    <!-- START SIGNUP BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix">
                    <div class="page-icon">
                        <img src="template/assets/img/account/register-icon.png" alt="Register icon" />
                    </div>
                    <div class="login-logo">
                          <a href="http://localhost:81/genAppCompany/">
                            <img src="template/assets/img/account/login-logo.png" alt="GEN APP COMPANY" />
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- Start Error box -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- End Error box -->
                        <form action="#" method="post">
                            <input name="firstname" type="text" placeholder="Firstname" class="input-field"  maxlength="50" required/>
                            <input name="lastname" type="text" placeholder="Lastname" class="input-field" maxlength="50"  required/>
                            <input name="tel" type="tel" placeholder="Tel.No" class="input-field" data-parsley-type="digits"  required/>
                            <input name="email" type="email" placeholder="E-mail" class="input-field"  maxlength="50" required/>
                            <input name="username" type="text" placeholder="Username" class="input-field"  maxlength="50" required/>
                            <input name="password" type="password" placeholder="Password" class="input-field" required/>
                            <input  name="confirmpassword" type="password" placeholder="Confirm Password" class="input-field" required/>
                            <button type="submit" name="signup" id="" class="btn btn-login ladda-button" data-style="expand-left"><span class="ladda-label">Sign Up</span></button>
                        </form>
                        <div class="login-links">
                          <a href="login.php"><strong>Sign in</strong></a>
                          <br>
                            <a href="password_forgot.php">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SIGNUP BOX -->
    <?php
    include('config/function.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $functionClass = new FunctionClass();
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $tel = $_POST['tel'];
      $email = $_POST['email'];
      $username = $_POST['username'];
      $password = $_POST['password'];
      $confirmPassword = $_POST['confirmpassword'];

      if($password != $confirmPassword){
        echo '<script type="text/javascript"> window.alert("รหัสผ่านไม่ตรงกัน !"); window.location.href = "#";</script>';
        exit();
    }
      if($functionClass->checkEmail($email)){
        echo '<script type="text/javascript"> window.alert("อีเมลล์ถูกใช้ไปแล้ว !"); window.location.href = "#";</script>';
          exit();
    }
    if($functionClass->checkUsername($username)){
      echo '<script type="text/javascript"> window.alert("มีชื่อผู้ใช้นี้ในระบบแล้ว !"); window.location.href = "#";</script>';
        exit();
    }
    else{
     $functionClass->doSignup($firstname,$lastname,$tel,$email,$username,$password);
  }
}

 ?>
 <!-- BEGIN MANDATORY SCRIPTS -->
 <script src="template/assets/plugins/jquery-1.11.1.min.js"></script>
 <script src="template/assets/plugins/jquery-migrate-1.2.1.min.js"></script>
 <script src="template/assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
 <script src="template/assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
 <script src="template/assets/plugins/bootstrap/bootstrap.min.js"></script>
 <script src="template/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
 <!-- END MANDATORY SCRIPTS -->
 <!-- BEGIN PAGE LEVEL SCRIPTS -->
 <script src="template/assets/plugins/backstretch/backstretch.min.js"></script>
 <script src="template/assets/plugins/bootstrap-loading/lada.min.js"></script>
 <script src="template/assets/js/account.js"></script>
 <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>
