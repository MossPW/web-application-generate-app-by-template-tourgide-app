<?php $objApp = $functionClass->selectDataArr('*','app',"");
?>
  <div id="main-content">
    <div class="col-md-12">

      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">
            <h3 class="panel-title"><strong>แอปพลิเคชั่นที่ดำเนินการเสร็จสิ้น</strong></h3>
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
                    <th>รหัสลูกค้า</th>
                    <th>ชื่อแอปพลิเคชั่น</th>
                    <th>วันที่-เวลา</th>
                    <!--<th>การจ่ายเงิน</th>-->
                    <th>การกระทำ</th>
                    <th>สถานะ</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if(!empty($objApp)){
                  foreach ($objApp as $valueApp) {
                      if ($valueApp['app_status'] == 'success'){  ?>
                   <tr>
                    <td  class="text-left"><?php echo  $valueApp['user_id']; ?></td>
                    <td class="text-left"><?php echo $valueApp['app_name_th']." (".$valueApp['app_name_en'].")"; ?></td>
                    <td><?php echo $valueApp['app_datetime']; ?></td>
                    <!--<td><button type="button" class="btn btn-success">ตรวจสอบ</button></td>-->
                    <td>
                      <a href="admin_index.php?page=download_file_android&app_id=<?php echo  $valueApp['app_id']; ?>" title="ดาวน์โหลดไฟล์ Code (zip)"><i class="fa fa-download c-blue"></i></a>
                      &nbsp&nbsp&nbsp&nbsp
                      <a href="admin_index.php?page=adminupload&app_id=<?php echo  $valueApp['app_id']; ?>" title="อัพโหลดไฟล์ (apk)"><i class="fa fa-upload"></i></a>
                    </td>
                    <td><strong class="c-green">เสร็จสมบูรณ์</strong></td>
                  </tr>
                <?php  }}} ?>

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
