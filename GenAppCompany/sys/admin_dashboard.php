<?php $objApp = $functionClass->selectDataArr('*','app',"");

?>
  <div id="main-content">
    <div class="col-md-12">

      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <h3 class="panel-title"><strong>แอปพลิเคชันทั้งหมด</strong></h3>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive table-blue filter-right">
              <table class="table table-striped table-hover table-dynamic">
                <thead>
                  <tr>
                    <th class="text-center">รหัสลูกค้า</th>
                    <th class="text-center">ชื่อแอปพลิเคชัน</th>
                    <th class="text-center">วันที่-เวลา</th>
                    <th class="text-center">Generate Code</th>
                    <th class="text-center">อัพโหลดไฟล์ APK</th>
                    <th class="text-center">สถานะ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(!empty($objApp)){
                  foreach ($objApp as $valueApp) {
                    $appNameEn = $valueApp['app_name_en'];
                    $app_id = $valueApp['app_id'];
                    $pathFileAn  = 'files/file_app/' . $app_id . '/' . 'file_zip_android' . '/' . $appNameEn . '.zip';
                     if ($valueApp['app_status'] == 'pending'||$valueApp['app_status'] == 'success'){  ?>
                   <tr>
                    <td  class="text-left"><?php echo  $valueApp['customer_id']; ?></td>
                    <td class="text-left"><?php echo $valueApp['app_name_th']." (".$valueApp['app_name_en'].")"; ?></td>
                    <td><?php echo $valueApp['app_datetime']; ?></td>
                    <!-- GenCode -->
                    <td class="text-center">
                    <?php
                    if(!($valueApp['app_status'] == 'success')){
                    if(file_exists($pathFileAn)){ ?>

                      <a href="admin_index.php?page=genCode&app_id=<?php echo  $valueApp['app_id']; ?>" onclick="return  confirm('คุณต้องการ Generate Code ซ้ำอีกครั้งใช่หรือไม่')" title="Generate Code"><button id="gencode" type="button" class="btn btn-primary"><i class="fa fa-code"></i>  GenCode</button></a>

                  <?php }else{ ?>

                    <a href="admin_index.php?page=genCode&app_id=<?php echo  $valueApp['app_id']; ?>" onclick="return  confirm('คุณต้องการ Generate Code ใช่หรือไม่')" title="Generate Code"><button id="gencode" type="button" class="btn btn-primary"><i class="fa fa-code"></i>  GenCode</button></a>

                  <?php }
                    }
                   ?>

                   </td>

                      <!-- Action Upload File -->
                      <td class="text-center">
                      <?php
                      if ($valueApp['app_status'] == 'pending'){ ?>
                        <a href="admin_index.php?page=adminupload&app_id=<?php echo  $valueApp['app_id']; ?>"><button id="uploadfileapk" type="button" class="btn btn-primary"><i class="fa fa-download"></i>  อัพโหลดไฟล์</button></a>

                    <?php if(file_exists($pathFileAn)){?>
                      <!--<a href="admin_index.php?page=download_file_android&app_id=<?php //echo  $valueApp['app_id']; ?>" title="ดาวน์โหลดไฟล์ Code (zip)"><i class="fa fa-download c-blue"></i></a>
                    -->
                    <?php// } ?>
                      <!--&nbsp&nbsp&nbsp&nbsp -->
                    <!--  <a href="admin_index.php?page=adminupload&app_id=<?php //echo  $valueApp['app_id']; ?>" title="อัพโหลดไฟล์ (apk)"><i class="fa fa-upload"></i></a>
                    -->
                          <?php }
                        } ?>
                    </td>

                    <?php if ($valueApp['app_status'] == 'pending'){ ?>
                    <td class="text-center"><strong class="c-red">ระหว่างดำเนินการ</strong></td>
                  <?php }
                        else if($valueApp['app_status'] == 'success'){ ?>
                    <td class="text-center"><strong class="c-green">เสร็จสมบูรณ์</strong></td>
                  <?php }

                } ?>


                  </tr>
                <?php  //}
              }
            }
             ?>


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
