
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"><!--<![endif]-->

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
    <link href="template/assets/css/plugins.css" rel="stylesheet">
    <link href="template/assets/css/style.min.css" rel="stylesheet">
    <link href="#" rel="stylesheet" id="theme-color">
    <!-- END  MANDATORY STYLE -->
    <!-- BEGIN PAGE LEVEL STYLE -->
    <link rel="stylesheet" href="template/assets/plugins/datatables/dataTables.css">
    <!-- END PAGE LEVEL STYLE -->
    <script src="template/assets/plugins/modernizr/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyCR35-UWnQNx_F6uO85_8LjLteDHodNFkE
&libraries=places&region=uk&language=th&sensor=true"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
</head>

<body data-page="dashboard">
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        <?php
        include('sidebar.php');
        ?>
        <!-- END MAIN SIDEBAR -->

        <!-- BEGIN MAIN CONTENT -->
        <div id="main-content">
          <div class="col-xs-12-">
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <div class="row form-group">
                            <div class ="col-sm-1">

                            </div>
                            <div class ="col-sm-2">
                              <label class="control-label">ชื่อสถานที่</label>
                            </div>
                            <div class="col-sm-7">
                            <input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"><ul class="parsley-errors-list" id="parsley-id-5392"></ul>
                            </div>
                            <div class ="col-sm-2">

                            </div>
                          </div>
                          <div class="row form-group">
                            <div class ="col-sm-1">

                            </div>
                            <div class ="col-sm-2">
                              <label class="control-label">เพิ่มภาพ</label>
                            </div>
                            <div class="col-sm-5">
                              <input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"><ul class="parsley-errors-list" id="parsley-id-5392"></ul>
                            </div>
                            <div class="col-sm-2">
                              <button class="btn btn-default ">Choose file</button></input>
                            </div>
                            <div class ="col-sm-2">

                            </div>
                          </div>
                          <div class="row form-group">
                            <div class ="col-sm-1">

                            </div>
                            <div class ="col-sm-2">
                              <label class="control-label">เพิ่มคำอธิบาย</label>
                            </div>
                            <div class="col-sm-7">
                              <textarea rows="5" class="form-control valid" placeholder="" data-parsley-minlength="200" required="" data-parsley-id="6001"></textarea><ul class="parsley-errors-list" id="parsley-id-6001"></ul>
                            </div>
                            <div class ="col-sm-2">

                            </div>
                          </div>
                          <div class="row form-group">
                            <div class ="col-sm-1">

                            </div>
                            <div class ="col-sm-2">
                              <label class="control-label">ที่อยู่</label>
                            </div>
                            <div class ="col-sm-7">
                              <input id="searchTextField" type="text" class="form-control">
                            </div>

                            <div class ="col-sm-2">

                            </div>
                          </div>
                          <div class="row form-group">
                            <div class ="col-sm-1">

                            </div>
                            <div class ="col-sm-9">
                              <div class ="col-sm-6">
                                <div class ="col-sm-4">
                                  <label class="control-label">ละติจูด</label>
                                </div>
                                <div class="col-sm-8">
                                <input name="latitude" type="text" class="form-control MapLat" value="" placeholder="Latitude" required="" disabled>
                                </div>
                              </div>
                              <div class ="col-sm-6">
                                <div class ="col-sm-4">
                                  <label class="control-label">ลองจิจูด</label>
                                </div>
                                <div class="col-sm-8">
                                <input name="longitude" type="text" class="form-control MapLon" value="" placeholder="Longitude" required="" disabled>
                                </div>
                              </div>
                            </div>
                            <div class ="col-sm-2">

                            </div>
                          </div>
                          <div class="row form-group">
                            <div class ="col-sm-1">

                            </div>
                            <div class ="col-sm-9">
                              <div class ="col-sm-12 text-center">
                                <div id="map_canvas" style="height: 600px;width: 800px;margin: 0.6em;"></div>
                              </div>
                            </div>
                            <div class ="col-sm-2">

                            </div>
                          </div>

                          <br>

                      </div>
                  </div>
              </div>
          <div class="col-xs-12-">
                      <div class="panel panel-default">
                          <div class="panel-heading">
                          <div class="row">
                            <div class="col-xs-6">

                            </div>
                            <div class="col-xs-4 text-right">
                              <a href="answer_type.php">
                              <button id="create-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> เพิ่มคำถาม</button>
                              </a>
                            </div>
                            <div class="col-xs-2">

                            </div>
                          </div>
                        </div>
                          <div class="panel-body">
                            <div class="row">
                                <div class=" col-sm-1">

                                </div>
                                <div class="col-sm-9 ">
                                  <div class="col-md-12 col-sm-12 col-xs-12 table-responsive force-table-responsive">
                                    <table class="table table-hover ">
                                        <thead>
                                            <tr>
                                                <th class ="text-center">คำถามที่</th>
                                                <th class ="text-center">การกระทำ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class ="text-center">1</td>
                                                <td class ="text-center">
                                                <a><i class="fa fa-pencil-square-o"></i></a>
                                                <a><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class ="text-center">2</td>
                                                <td class ="text-center">
                                                <a><i class="fa fa-pencil-square-o"></i></a>
                                                <a><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class ="text-center">3</td>
                                                <td class ="text-center">
                                                <a><i class="fa fa-pencil-square-o"></i></a>
                                                <a><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                                <div class=" col-sm-2">

                                </div>
                            </div>
                          </div>

                      </div>
                  </div>
          <div class="col-xs-12 form-group text-center">
            <a href="app_create_page.php"><button type="submit" class="btn btn-success">บันทึก</button></a>
            <a href="app_create_page.php"><button type="reset" class="btn btn-default">ยกเลิก</button></a>
          </div>
        </div>
        <!-- END MAIN CONTENT -->

    </div>
    <!-- END WRAPPER -->

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

    <script src="myjs.js"></script>
    <script src="template/assets/js/icons.js"></script>
    <!-- END  PAGE LEVEL SCRIPTS -->
    <script src="template/assets/js/application.js"></script>
</body>

</html>
