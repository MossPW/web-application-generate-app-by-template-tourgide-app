
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"><!--<![endif]-->

<head>

  <style>
    
    .upload-box .btn-file {
      background-color: #1b8af3;
    }
    .upload-box .hold {
      float: left;
      width: 100%;
      position: relative;
      border: 1px solid #ccc;
      border-radius: 3px;
      padding: 4px;
    }
    .upload-box .hold a {
      font: 400 14px/36px 'Roboto',sans-serif;
      color: #666;
      text-decoration: none;
    }

    .upload-box .btn-file {
      position: relative;
      overflow: hidden;
      float: left;
      padding: 12px 20px;
      font: 900 14px/14px 'Roboto',sans-serif;
      color: #fff;
      margin: 0 10px 0 0;
      text-transform: uppercase;
      border-radius: 3px;
      cursor: pointer;
    }
    .upload-box .btn-file input[type=file] {
      position: absolute;
      top: 0;
      right: 0;
      min-width: 100%;
      min-height: 100%;
      font-size: 100px;
      text-align: right;
      opacity: 0;
      outline: none;
      background: #fd0707;
      cursor: inherit;
      display: block;
    }
  </style>


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
  <link href="template/assets/css/plugins.css" rel="stylesheet">
  <link href="template/assets/css/style.min.css" rel="stylesheet">
  <link href="#" rel="stylesheet" id="theme-color">
  <!-- END  MANDATORY STYLE -->
  <!-- BEGIN PAGE LEVEL STYLE -->
  <link rel="stylesheet" href="template/assets/plugins/datatables/dataTables.css">
  <link rel="stylesheet" href="template/assets/plugins/wizard/wizard.css">
  <link rel="stylesheet" href="template/assets/plugins/jquery-steps/jquery.steps.css">
  <!-- END PAGE LEVEL STYLE -->
  <script src="template/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body data-page="dashboard">
  <!-- BEGIN WRAPPER -->
  <div id="wrapper">
    <!-- BEGIN MAIN SIDEBAR -->
    <nav id="sidebar">
      <div id="main-menu">
        <ul class="sidebar-nav">
          <br>
          <li>
            <a><i class="glyph-icon flaticon-account"></i>
              <span class="sidebar-text">Admin<br>(Patipan watjanapron)</span>
            </a>
          </li>
          <li class=""> <!-- current-->
            <a href="admin_home.php"><i class="fa fa-home"></i><span class="sidebar-text">Home</span></a>
          </li>
          <li class=""> <!-- current-->
            <a href="admin_complete.php"><i class="fa fa-folder-open"></i><span class="sidebar-text">Complete</span></a>
          </li>
          <li class=""> <!-- current-->
            <a href="login.php"><i class="fa fa-power-off"></i><span class="sidebar-text">Logout</span></a>
          </li>


        </ul>
      </div>
    </nav>
    <!-- END MAIN SIDEBAR -->

    <!-- BEGIN MAIN CONTENT -->
    <div id="main-content">

      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="row">
              <div class=" col-sm-1">

              </div>
              <div class="col-sm-9 ">
                <div class="col-sm-12">
                  <table class="table table-hover ">
                    <thead>
                      <tr>
                        <th>File name</th>
                        <th>Time-Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>1</td>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
              <div class=" col-sm-2">

              </div>
            </div>
            <div class="row">
              <div class=" col-sm-1">

              </div>
              <div class="col-sm-9 ">
                <div class="content clearfix">
                  <form action="testupload.php" method="post" enctype="multipart/form-data">
                    <div class="upload-box">
                      <div class="hold"><a href="#">Maximum file size 20 MB</a> <span class="btn-file"> Browse File
                        <input type="file">
                      </span> </div>
                    </div>



                    <div class="col-xs-12 form-group text-center">
                      <input type="submit" value="Upload" name="submit" class="btn btn-success">
                    </div>


                  </form>
                </div>
              </div>
              <div class=" col-sm-2">

              </div>
            </div>

          </div>

        </div>
      </div>

    </div>
    <!-- END MAIN CONTENT -->

  </div>
  <!-- END WRAPPER -->
  <script>
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.fileeee');
      file.trigger('click');
    });
    $(document).on('change', '.fileeee', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  </script>
  <!-- BEGIN MANDATORY SCRIPTS -->
  <script src="template/assets/plugins/jquery-1.11.1.min.js"></script>
  <script src="template/assets/plugins/jquery-migrate-1.2.1.min.js"></script>
  <script src="template/assets/plugins/jquery-ui/jquery-ui-1.11.2.min.js"></script>
  <script src="template/assets/plugins/jquery-mobile/jquery.mobile-1.4.2.js"></script>
  <script src="template/assets/plugins/bootstrap/bootstrap.min.js"></script>
  <script src="template/assets/plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js"></script>
  <script src="template/assets/plugins/bootstrap-select/bootstrap-select.js"></script>
  <script src="template/assets/plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
  <script src="template/assets/plugins/mmenu/js/jquery.mmenu.min.all.js"></script>
  <script src="template/assets/plugins/nprogress/nprogress.js"></script>
  <script src="template/assets/plugins/charts-sparkline/sparkline.min.js"></script>
  <script src="template/assets/plugins/breakpoints/breakpoints.js"></script>
  <script src="template/assets/plugins/numerator/jquery-numerator.js"></script>
  <script src="template/assets/plugins/jquery.cookie.min.js" type="text/javascript"></script>
  <!-- END MANDATORY SCRIPTS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="template/assets/plugins/wizard/wizard.js"></script>
  <script src="template/assets/plugins/jquery-steps/jquery.steps.js"></script>
  <script src="template/assets/js/icons.js"></script>
  <!-- END  PAGE LEVEL SCRIPTS -->
  <script src="template/assets/js/application.js"></script>
</body>

</html>
