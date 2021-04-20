<?php $objApp = $functionClass->selectData('*','app',"WHERE customer_id ='$customer_id'");
?>
<div id="main-content">
  <div class="col-md-12">

    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-6">
          <h3 class="panel-title"><strong>แอปพลิเคชั่นทั้งหมด </strong></h3>
        </div>
        <div class="col-xs-6 text-right">
          <a href="index.php?page=appcreate">
            <button id="create-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i> สร้างแอป</button>
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
                  <th class="text-center">ชื่อแอปพลิเคชั่น</th>
                  <th class="text-center">อัพเดตล่าสุด</th>
                  <th class="text-center">สถานะ</th>
                  <th class="text-center">การกระทำ</th>
                </tr>
              </thead>
              <tbody>

                <?php
                foreach ($objApp as $valueApp) {
                 $app_id_encode = md5($valueApp['app_id']);
                 ?>
                 <tr>
                  <td class="text-left"a><?php echo $valueApp['app_name_th']." (".$valueApp['app_name_en'].")"; ?></td>
                  <td><?php echo $valueApp['app_datetime']; ?></td>
                  <td>ฉบับร่าง</td>
                  <td>
                    <a href="index.php?page=appcreate&app_id=<?php echo $app_id_encode ?>"><i class="fa fa-pencil-square-o"></i></a>
                    <a><i class="fa fa-trash-o"></i></a>
                    <a><i class="fa fa-dollar"></i></a>
                  </td>
                </tr>
                <?php } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
