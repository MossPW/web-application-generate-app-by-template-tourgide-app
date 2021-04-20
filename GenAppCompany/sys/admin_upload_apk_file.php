<?php
$app_id = $_GET['app_id'];
$objApp = $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
$name_file_apk = $objApp['app_apk'];

if($_SERVER['REQUEST_METHOD']=='POST'){
  $newnamefile = $_FILES['file_apk']['name'];
  $file_ext_splash = substr($newnamefile, strripos($newnamefile, '.')); // get file name
  $newnamefile =  $objApp['app_name_en'] . $file_ext_splash;

if(!empty($name_file_apk)){  //remove old file apk
  unlink('files/file_app/'."$app_id".'/'.'file_apk'.'/'. "$name_file_apk");
}
//move new file to file_apk
$movefile  = move_uploaded_file($_FILES['file_apk']['tmp_name'], 'files/file_app/'."$app_id".'/'.'file_apk'.'/' . $newnamefile);
//update data and update status
$isUpdate = $functionClass->updateData('app',"app_apk='$newnamefile',app_status='success'","WHERE app_id='$app_id'");
// echo $isUpdate;

  if($movefile&&$isUpdate)
  echo '<script type="text/javascript"> window.alert("อัพโหลดไฟล์สำเร็จ!"); </script>';
  header("Refresh:0");

  }

?>

    <!-- BEGIN MAIN CONTENT -->
    <div id="main-content">

      <div class="col-md-12">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <h3 class="panel-title"><strong>อัพโหลดไฟล์แอปพลิเคชั่น</strong></h3>
            </div>
          </div>
        </div>
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
                        <th>ชื่อไฟล์</th>
                        <!-- <th>เวลา-วันที่</th>-->
                        <th  class="text-center">การกระทำ</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if(!empty($name_file_apk)){  ?>
                      <tr>
                        <td><?php echo $name_file_apk;  ?></td>
                        <!--<td>12/12/12</td> -->
                        <td class="text-center"><a href="admin_index.php?page=delfile_apk&app_id=<?php echo  $_GET['app_id']; ?>"><i class="fa fa-trash-o text-center"></i></a></td>

                      </tr>
                    <?php } ?>
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
                  <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <input type="file" name="file_apk" class="fileeee">
                      <div class="input-group col-xs-12">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
                        <input type="text"  class="form-control input-lg" disabled placeholder="อัพโหลดไฟล์">
                        <span class="input-group-btn">
                          <button class="browses btn btn-primary input-lg" type="button">เลือกไฟล์</button>
                        </span>
                      </div>
                    </div>


                    <div class="col-xs-12 form-group text-center">
                      <input type="submit" value="อัพโหลด" name="submit" class="btn btn-success">
                    <!--  <a href="admin_index.php?page=admindashboard"><button id="reset_question" class="btn btn-default" onclick="return  confirm('คุณต้องการยกเลิก ใช่หรือไม่')">ยกเลิก</button></a>-->

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
  $( document ).ready(function() {
  $( ".browses" ).click(function() {
      var file = $(this).parent().parent().parent().find('.fileeee');
      file.trigger('click');
    });
    $( ".fileeee" ).change(function() {
       $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  });
  </script>
