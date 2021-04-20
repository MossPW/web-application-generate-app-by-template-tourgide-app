<?php $objApp = $functionClass->selectDataArr('*','app',"WHERE customer_id ='$user_id'");

?>
<div id="main-content">
  <div class="col-md-12">

    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-6">
          <h3 class="panel-title"><strong>จัดการแอปพลิเคชัน</strong></h3>
        </div>
        <div class="col-xs-6 text-right">
          <a href="index.php?page=appcreate">
            <!--<button id="create-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i>สร้างแอป</button>-->
          </a>
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
                  <th class="text-center">ชื่อแอปพลิเคชัน</th>
                  <th class="text-center">อัพเดตล่าสุด</th>
                  <th class="text-center">การชำระเงิน</th>
                  <th class="text-center">ดาวน์โหลดไฟล์ APK</th>
                  <th class="text-center">การจัดการ</th>
                  <th class="text-center">สถานะ</th>
                </tr>
              </thead>
              <tbody>

                <?php
                if(!empty($objApp)){
                foreach ($objApp as $valueApp) {
                  $app_id = $valueApp['app_id'];
                 ?>
                 <tr>
                   <!-- App name -->
                  <td class="text-left"a><?php echo $valueApp['app_name_th']." (".$valueApp['app_name_en'].")"; ?></td>
                  <!-- Date Time -->
                  <td><?php echo $valueApp['app_datetime']; ?></td>
                  <!-- Pay ment -->
                  <td>
                  <?php if(($valueApp['app_status'] == 'draft')) {?>
                      <a href="index.php?page=apppaymentdetail&app_id=<?php echo  $app_id; ?>" ><button type="button" class="btn btn-warning"><i class="fa fa-dollar"></i> ชำระเงิน</button></a>
                  <?php }?>
                  </td>
                  <!-- Download Apk -->
                  <td>
                  <?php if ($valueApp['app_status'] == 'success'){?>
                    <a href ="index.php?page=downloadapk&app_id=<?php echo $app_id; ?>" title="ดาวน์โหลดไฟล์แอปพลิเคชัน (.apk)"><button type="button" class="btn btn-success"><i class="fa fa-download"></i> ดาวน์โหลด</button></a>
                  <?php } ?>
                  </td>
                  <!-- action -->
                  <td>
                   <?php if( !($valueApp['app_status'] == 'success') && !($valueApp['app_status'] == 'pending') ) {?>
                     <a href="index.php?page=editapp&app_id=<?php echo  $app_id; ?>" title="แก้ไขแอปพลิเคชัน" ><i class="fa fa-pencil-square-o"></i></a>
                   <?php }?>
                     <a href="index.php?page=deleteapp&app_id=<?php echo  $app_id; ?>" title="ลบแอปพลิเคชัน" ><i class="fa fa-trash-o text-center" onclick="return  confirm('คุณต้องการลบแอป ใช่หรือไม่')"></i></a>
                  </td>
                  <!-- status -->
                <?php if( $valueApp['app_status'] == 'draft') {?>
                  <td><strong class="c-gray">ฉบับร่าง</strong></td>
                <?php  } else if ($valueApp['app_status'] == 'pending'){?>
                  <td><strong class="c-red">ระหว่างดำเนินการ</strong></td>
                <?php  } else if ($valueApp['app_status'] == 'success'){?>
                  <td><strong class="c-green">เสร็จสมบูรณ์</strong></td>
                <?php }?>



                </tr>
              <?php } }?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
