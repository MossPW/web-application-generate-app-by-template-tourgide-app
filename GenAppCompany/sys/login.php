
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<head>
  <?php
  ?>
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
  <link href="template/assets/css/plugins.min.css" rel="stylesheet">
  <link href="template/assets/plugins/bootstrap-loading/lada.min.css" rel="stylesheet">
  <link href="template/assets/css/style.css" rel="stylesheet">
  <link href="#" rel="stylesheet" id="theme-color">
  <!-- END  MANDATORY STYLE -->
  <!-- BEGIN PAGE LEVEL STYLE -->
  <link href="template/assets/css/animate-custom.css" rel="stylesheet">
  <!-- END PAGE LEVEL STYLE -->
  <script src="template/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body class="login fade-in" data-page="login">
    <!-- BEGIN LOGIN BOX -->
    <div class="container" id="login-block">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
                <div class="login-box clearfix animated flipInY">
                    <div class="page-icon animated bounceInDown">
                        <img src="template/assets/img/account/user-icon.png" alt="Key icon">
                    </div>
                    <div class="login-logo">
                        <a href="http://localhost:81/genAppCompany/">
                            <img src="template/assets/img/account/login-logo.png" alt="GEN APP COMPANY">
                        </a>
                    </div>
                    <hr>
                    <div class="login-form">
                        <!-- BEGIN ERROR BOX -->
                        <div class="alert alert-danger hide">
                            <button type="button" class="close" data-dismiss="alert">×</button>
                            <h4>Error!</h4>
                            Your Error Message goes here
                        </div>
                        <!-- END ERROR BOX -->
                        <form action="#" method="post">
                            <input type="text" name="username" placeholder="Username" class="input-field form-control user" />
                            <input type="password" name="password" placeholder="Password" class="input-field form-control password" />
                            <div class="div-login" style="margin:auto;text-align:center">
                                <button type="submit" name="login" style="display: inline;"  class="btn btn-login ladda-button" data-style="expand-left"><span class="ladda-label">login</span></button>
                            </div>
                        </form>
                        <div class="login-links">
                          <a href="signup.php"><strong>Sign Up</strong></a>
                          <br>
                            <a href="password_forgot.php">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include('config/connect_db.php');
    include('config/function.php');
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $functionClass = new FunctionClass();
        $username = $_POST['username'];
        $password = $_POST['password'];
        $functionClass->doLogin($username,$password);
    }
    ?>
    <!-- END LOCKSCREEN BOX -->
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

    <script>
  /*  $(function() {
    $('#submit-form').click(function(e){
        e.preventDefault();
        var l = Ladda.create(this);
        l.start();
        setTimeout(function () {
            window.location.href = "index.php";
        }, 2000);

    });
});*/
</script>
</body>

</html>
