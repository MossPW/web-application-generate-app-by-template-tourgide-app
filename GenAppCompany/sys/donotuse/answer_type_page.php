
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"><!--<![endif]-->

<head>
  <link href="mycenter.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
                              <label class="control-label">สร้างทำถาม</label>
                            </div>
                            <div class="col-sm-7">
                              <textarea rows="5" class="form-control valid" placeholder="" data-parsley-minlength="200" required="" data-parsley-id="6001"></textarea><ul class="parsley-errors-list" id="parsley-id-6001"></ul>
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
                            <div class ="col-sm-1">

                            </div>
                            <div class="col-xs-2">
                                <label class="control-label">สร้างคำตอบ</label>
                            </div>
                            <div class="col-xs-7 text-right">
                              <div class="col-xs-5">

                              </div>
                              <div class="col-xs-7">
                                <select id="typeselector" class="form-control" data-style = "btn btn-primary" title="Select an answer type..." style="display: none;">
                                    <option data-icon ="fa-toggle-right" value="type1">
                                      <span class="text">สี่ตัวเลือกหนึ่งคำตอบ</span>
                                    </option>
                                    <option data-icon ="fa-dot-circle-o" value="type2">
                                      <span class="text">สองตัวเลือกหนึ่งคำตอบ</span>
                                    </option>
                                    <option data-icon ="fa-check-square" value="type3">
                                      <span class="text">สี่ตัวเลือกหลายคำตอบ</span>
                                    </option>
                                    <option data-icon = "fa-filter" value="type4">
                                      <span class="text">เรียงลำดับ</span>
                                    </option>
                                </select>
                              </div>
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
                                    <div id="type1" class="tables type1">
                                      <table class="table table-hover ">
                                          <thead>
                                              <tr >
                                                  <th class ="text-center" >คำตอบที่</th>
                                                  <th class ="text-center" >ข้อความ</th>
                                                  <th class ="text-center" >คำตอบที่ถูกต้อง</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td class ="text-center">1</td>
                                                  <td class ="text-center" ><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input  type="radio" name="answertype1" value=""></td>

                                              </tr>
                                              <tr>
                                                  <td class ="text-center">2</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input type="radio" name="answertype1" value=""></td>
                                              </tr>
                                              <tr>
                                                  <td class ="text-center">3</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input type="radio" name="answertype1" value=""></td>
                                              </tr>
                                              <tr>
                                                  <td class ="text-center">4</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input type="radio" name="answertype1" value=""></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                    </div>
                                    <div id="type2" class="tables type2">
                                      <table class="table table-hover ">
                                          <thead>
                                              <tr >
                                                <th class ="text-center" >คำตอบที่</th>
                                                <th class ="text-center" >ข้อความ</th>
                                                <th class ="text-center" >คำตอบที่ถูกต้อง</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td class ="text-center">1</td>
                                                  <td class ="text-center" ><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input  type="radio" name="answertype2" value=""></td>

                                              </tr>
                                              <tr>
                                                  <td class ="text-center">2</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input type="radio" name="answertype2" value=""></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                    </div>
                                    <div id="type3" class="tables type3">
                                      <table class="table table-hover ">
                                          <thead>
                                              <tr >
                                                <th class ="text-center" >คำตอบที่</th>
                                                <th class ="text-center" >ข้อความ</th>
                                                <th class ="text-center" >คำตอบที่ถูกต้อง</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td class ="text-center">1</td>
                                                  <td class ="text-center" ><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input  type="checkbox" name="" value=""></td>
                                              </tr>
                                              <tr>
                                                  <td class ="text-center">2</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input type="checkbox" name="" value=""></td>
                                              </tr>
                                              <tr>
                                                  <td class ="text-center">3</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input type="checkbox" name="" value=""></td>
                                              </tr>
                                                  <td class ="text-center">4</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td><input type="checkbox" name="" value=""></td>
                                              </tr>
                                          </tbody>
                                      </table>
                                    </div>
                                    <div id="type4" class="tables type4">
                                      <table class="table table-hover ">
                                          <thead>
                                              <tr >
                                                <th class ="text-center" >คำตอบที่</th>
                                                <th class ="text-center" >ข้อความ</th>
                                                <th class ="text-center" >คำตอบที่ถูกต้อง</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              <tr>
                                                  <td class ="text-center">1</td>
                                                  <td class ="text-center" ><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td>
                                                    <select class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                                                      <option><span class="text">1</span></option>
                                                      <option><span class="text">2</span></option>
                                                      <option><span class="text">3</span></option>
                                                      <option><span class="text">4</span></option>
                                                    </select>
                                                  </td>

                                              </tr>
                                              <tr>
                                                  <td class ="text-center">2</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td>
                                                    <select class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                                                      <option><span class="text">1</span></option>
                                                      <option><span class="text">2</span></option>
                                                      <option><span class="text">3</span></option>
                                                      <option><span class="text">4</span></option>
                                                    </select>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class ="text-center">3</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td>
                                                    <select class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                                                      <option><span class="text">1</span></option>
                                                      <option><span class="text">2</span></option>
                                                      <option><span class="text">3</span></option>
                                                      <option><span class="text">4</span></option>
                                                    </select>
                                                  </td>
                                              </tr>
                                              <tr>
                                                  <td class ="text-center">4</td>
                                                  <td class ="text-center"><input type="text" data-parsley-minlength="3" class="form-control" required="" data-parsley-id="5392"></td>
                                                  <td>
                                                    <select class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                                                      <option><span class="text">1</span></option>
                                                      <option><span class="text">2</span></option>
                                                      <option><span class="text">3</span></option>
                                                      <option><span class="text">4</span></option>
                                                    </select>
                                                  </td>
                                              </tr>
                                          </tbody>
                                      </table>
                                    </div>
                                  </div>
                                </div>
                                <div class=" col-sm-2">

                                </div>
                            </div>
                          </div>

                      </div>
                  </div>
          <div class="col-xs-12 form-group text-center">
            <a href="location_create_page.php"><button type="submit" class="btn btn-success">บันทึก</button></a>
            <a href="location_create_page.php"><button type="reset" class="btn btn-default">ยกเลิก</button></a>
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
    <script src="mydropdown_ans.js"></script>
    <script src="template/assets/js/icons.js"></script>
    <!-- END  PAGE LEVEL SCRIPTS -->
    <script src="template/assets/js/application.js"></script>
</body>

</html>
s
