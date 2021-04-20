
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
    <!-- BEGIN META SECTION -->
    <meta charset="utf-8">
    <title>Project demo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="" name="description" />
    <meta content="themes-lab" name="author" />
    <link rel="shortcut icon" href="template/assets/img/favicon.png">
    <!-- END META SECTION -->
    <!-- BEGIN MANDATORY STYLE -->
    <link href="template/assets/css/icons/icons.min.css" rel="stylesheet">
    <link href="template/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/assets/css/plugins.min.css" rel="stylesheet">
    <link href="template/assets/css/style.min.css" rel="stylesheet">
    <link href="#" rel="stylesheet" id="theme-color">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link href="template/assets/css/animate-custom.css" rel="stylesheet">
    <!-- END PAGE LEVEL STYLE -->
    <script src="template/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body class="login fade-in" data-page="password">
    <!-- BEGIN PASSWORD BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="template/assets/img/account/login-questionmark-icon.png" alt="Questionmark icon" />
                    </div>
                    <div class="login-logo">
                          <a href="http://localhost:81/genAppCompany/">
                            <img class="img-responsive" src="template/assets/img/account/login-logo.png" alt="Company Logo" />
                        </a>
                    </div>
                    <hr />
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- END ERROR BOX -->
                        <form action="#" method="post">
                            <p>Enter your email address below and we'll send a special reset password link to your inbox.</p>
                            <input name="forgot_email" type="email" placeholder="Email" class="input-field" required/>
                            <button type="submit" class="btn btn-login btn-reset">Reset password</button>
                        </form>
                        <div class="login-links">
                          <a href="login.php"><strong>Sign In</strong></a>
                          <br>
                          <a href="signup.php">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include('config/connect_db.php');
    include('config/function.php');
    include('config/sendMail.php');

    if (!empty($_POST['forgot_email']))
    {
    $functionClass = new FunctionClass();
    $Email = $_POST['forgot_email'];// decare checkEmail = email in form
    $checkEmail=$functionClass->checkEmail($Email);

      if($checkEmail){// check have email in DB?
         $random=$functionClass->random_password(8); //random password 8 หลัก
         $functionClass->updatePasswordForGot($Email,$random);
        if(SentMail($_POST['forgot_email'],'Admin','รหัสผ่านของคุณได้รับการรีเซ็ต','รหัสผ่านใหม่ของคุณคือ : '.$random)){
          echo $random;
          echo '<script type="text/javascript"> window.alert("ระบบได้ทำการส่งรหัสผ่านใหม่ไปยังอีเมล์ของคุณแล้ว !"); window.location.href = "login.php";</script>';

        }
        else{

        }
                  echo '<script type="text/javascript"> window.alert("ไม่สามารถส่งอีเมลล์ กรุณาตรวจสอบอีกครั้ง !"); window.location.href = "#";</script>';
        }
       else{// not have email in DB
         echo '<script type="text/javascript"> window.alert("ไม่พบอีเมลล์ในระบบ กรุณาตรวจสอบอีกครั้ง !"); window.location.href = "#";</script>';
        }


    }
    ?>
    <!-- END PASSWORD BOX -->
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
    <script src="template/assets/js/account.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
</body>

</html>
