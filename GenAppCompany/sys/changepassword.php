<?php
?>
<!-- BEGIN MAIN CONTENT -->
        <div id="main-content">
            <div class="row">
                <div class="col-md-12">

                    <form action="#"  class="form-horizontal" role="form" method="post">
                            <!-- BEGIN TABS -->
                            <div class="tabbable tabbable-custom form">
                                <div class="tab-content">
                                    <div class="space20"></div>
                                    <div class="tab-pane active" id="general_settings">
                                        <div class="row profile">
                                            <div class="col-md-12">
                                                <div class="row profile-classic">
                                                    <div class="col-md-12">
                                                        <div class="panel">

                                                            <div class="panel-title line">
                                                                <div class="caption"><i class="fa fa-key c-gray m-r-10"></i> เปลี่ยนรหัสผ่าน</div>
                                                            </div>
                                                            <div class="panel-body">

                                                                <div class="row">
                                                                    <div class="control-label col-md-3">รหัสผ่านใหม่</div>
                                                                    <div class="col-md-6">
                                                                        <input name="newpass" type="password" class="form-control" id="field-1" required>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="control-label col-md-3">ยืนยันรหัสผ่านใหม่</div>
                                                                    <div class="col-md-6">
                                                                        <input name="confirmnewpass" type="password" class="form-control" id="field-1" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="align-center">
                                                        <button type="submit" class="btn btn-primary m-r-20">เปลี่ยนรหัสผ่าน</button>
                                                          <a href="index.php?page=dashboard"><button type="reset" class="btn btn-default" onclick="return  confirm('คุณต้องการยกเลิก ใช่หรือไม่')">ยกเลิก</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!--END TABS-->
                        </form>
                </div>
            </div>


        </div>
        <!-- END MAIN CONTENT -->

        <?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
          $newpass = $_POST['newpass'];//test_input($_POST['newpass']);
          $confirmNewpass = $_POST['confirmnewpass'];//test_input($_POST['newpass2']);
          if($newpass != $confirmNewpass){
            echo '<script type="text/javascript"> window.alert("รหัสผ่านไม่ตรงกัน !"); window.location.href = "index.php?page=changepassword";</script>';
            exit();
        }
        else{
            $isUpdatePasssword = $functionClass->updatePassword($newpass);
            if($isUpdatePasssword){
              echo '<script type="text/javascript"> window.alert("เปลี่ยนรหัสผ่านสำเร็จ !"); window.location.href = "index.php?page=dashboard";</script>';
            }else{
              echo '<script type="text/javascript"> window.alert("ไม่สามารถเปลี่ยนรหัสผ่านได้ !"); window.location.href = "index.php?page=changepassword";</script>';
            }
        }
     }

     ?>
