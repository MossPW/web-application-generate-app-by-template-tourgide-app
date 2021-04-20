<?php
$app_id = $_GET['app_id'];
 ?>
<div id="main-content">
  <div class="col-md-12">

    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-6">
          <h3 class="panel-title"><strong>การชำระเงิน</strong></h3>
        </div>
        <div class="col-xs-6 text-right">
          <a href="index.php?page=appcreate">
            <!--<button id="create-button" class="btn btn-primary"><i class="fa fa-plus-circle"></i>สร้างแอป</button>-->
          </a>
        </div>
      </div>
    </div>
<div class="row invoice-page">
                <div class="col-md-12 p-t-0">
                    <div class="invoice panel panel-default p-40">
                        <div class="panel-body p-t-0">
                            <div class="row">
                                <div class="col-md-12 align-center">
                                     <h4>รายละเอียดการชำระเงิน</h4>
                                     <br />
                                </div>
                              <!--  <div class="col-md-12">
                                    <div class="pull-left">
                                        <h4 class="w-500 c-gray">FROM</h4>
                                        <img src="assets/img/themeforest.png" class="img-responsive0" alt="themeforest">
                                        <address>
                                            <strong><textarea class="width-300">ThemeForest Web Services, Inc.</textarea></strong><br>
                                            <textarea class="width-300">795 Folsom Ave, Suite 600</textarea><br>
                                            <textarea class="width-300">San Francisco, CA 94107</textarea><br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                    <div class="pull-right">
                                        <h4 class="w-500 c-gray">TO</h4>
                                        <img src="assets/img/logo-light.png" class="img-responsive" alt="themeforest">
                                        <address>
                                            <strong><textarea class="width-300">Pixit Admin Template, Inc.</textarea></strong><br>
                                            <textarea class="width-300">795 Folsom Ave, Suite 600</textarea><br>
                                            <textarea class="width-300">San Francisco, CA 94107</textarea><br>
                                            <abbr title="Phone">P:</abbr> (123) 456-789
                                        </address>
                                    </div>
                                </div> -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                  <!--  <div class="row">
                                        <div class="col-md-12 m-t-20 m-b-20">
                                            <p><strong>Invoice Date:</strong> <textarea>May 4, 2014</textarea></p>
                                            <p><strong>Due Date:</strong> <textarea>Mai 16, 2014</textarea></p>

                                        </div>
                                    </div> -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width:65px" class="unseen text-center">ลำดับ</th>
                                                <th class="text-center">รายละเอียด</th>
                                                <th style="width:145px" class="text-right">ราคา</th>
                                                <th style="width:95px" class="text-right">รวม</th>
                                            </tr>
                                        </thead>
                                        <?php $total = 500;
                                              $i = 2;
                                        ?>
                                        <tbody>
                                            <tr class="item-row">
                                                <td>
                                                    <textarea class="qty text-center">1</textarea>
                                                </td>
                                                <td>
                                                    <div class="text-left">Template Application</div>

                                                </td>
                                                <td>
                                                    <textarea class="text-right cost">500 THB</textarea>
                                                </td>
                                                <td class="text-right price">500 THB</td>
                                            </tr>
                                            <?php
                                            $arrLocation = $functionClass->selectDataArr('*','location_app',"WHERE app_id = '$app_id'");
                          	                if(!empty($arrLocation)){
                          	                foreach ($arrLocation as $value) {
                                              ?>

                                            <tr class="item-row">
                                                <td>
                                                    <textarea class="qty text-center"><?php echo $i; ?></textarea>
                                                </td>
                                                <td>
                                                    <div class="text-left"><?php echo $value['location_app_name']; ?></div>

                                                </td>
                                                <td>
                                                    <textarea class="text-right cost">100 THB</textarea>
                                                </td><?php $total+=100; $i++;  ?>
                                                <td class="text-right price"><?php echo $total; ?> THB</td>
                                            </tr>
                                            <?php
                                          }
                                        } ?>


                                            <tr>
                                                <td colspan="2" rowspan="4"></td>
                                                <td class="text-right"><strong>รวม</strong></td>
                                                <td class="text-right" id="subtotal"><?php echo $total; ?> THB</td>
                                            </tr>

                                            <tr>
                                                <td class="text-right no-border"><strong>ภาษีมูลค่าเพิ่ม</strong></td>
                                                <td class="text-right">0.00 THB</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right no-border"><div><strong>รวมทั้งหมด</strong></div></td>
                                                <td class="text-right" id="total"><?php echo $total; ?> THB</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                      <div class="text-right">
                                      <a href="index.php?page=apppayment&app_id=<?php echo  $app_id; ?>" onclick="return  confirm('คุณต้องการชำระเงิน ใช่หรือไม่')"><button type="button" class="btn btn-warning"><i class="fa fa-dollar"></i> ชำระเงิน</button></a>
                                      <a href="index.php?page=dashboard"><button type="reset" class="btn btn-default">ยกเลิก</button></a>
                                      </div>

                                    <!--<div class="well">
                                        Thank you for your business. Please make sure all cheques payable to <strong>ThemeForest Web Services, Inc.</strong> Account No. 35757745
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
      </div>
