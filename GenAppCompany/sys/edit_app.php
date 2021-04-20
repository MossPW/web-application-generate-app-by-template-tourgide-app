<?php
$app_id="";
$app_name_th ="";
$app_name_en="";
$app_icon="";

if(isset($_GET['app_id'])){
	$app_id=$_GET['app_id'];
  $objApp = $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
	$app_name_th =$objApp['app_name_th'];
	$app_name_en=$objApp['app_name_en'];
	$app_icon=$objApp['app_icon'];
	$app_splash=$objApp['app_splash'];
	//url app_icon
	$app_icon = $base_url.'files/file_app/'.$app_id.'/'.'app'.'/'.$app_icon;
	//url app_splash
	$app_splash = $base_url.'files/file_app/'.$app_id.'/'.'app'.'/'.$app_splash;
}

?>
<!-- BEGIN MAIN CONTENT -->
<div id="main-content">
	<div class="col-xs-12-">

		<div class="panel-heading">
			<div class="row">
				<div class="col-xs-6">
					<h3 class="panel-title"><strong>รายละเอียดแอปพลิเคชั่น</strong></h3>
				</div>
				<div class="col-xs-6 ">

				</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row form-group">
					<div class ="col-sm-1">

					</div>
					<form id="form_editapp" action="set_data.php" method ="post">
						<div class ="col-sm-2">
							<label class="control-label"><span class="asterisk">*</span>ชื่อแอป (ภาษาไทย)</label>
							<br /><span class="text-muted">(สูงสุด 50 ตัวอักษร)</span>
						</div>
						<div class="col-sm-7">
							<input name="appname_th" type="text" placeholder="" class="input-field form-control" data-parsley-minlength="3" value="<?php echo $app_name_th; ?>"  maxlength="50" required/>
						</div>
						<div class ="col-sm-2">

						</div>
					</div>
					<div class="row form-group">
						<div class ="col-sm-1">

						</div>
						<div class ="col-sm-2">
							<label class="control-label"><span class="asterisk">*</span>ชื่อแอป (ภาษาอังกฤษ)</label>
						  <br /><span class="text-muted">(สูงสุด 50 ตัวอักษร)</span>
						</div>
						<div class="col-sm-7">
							<input name="appname_en" type="text" placeholder="" class="input-field form-control" data-parsley-minlength="3"  value="<?php echo $app_name_en; ?>"  maxlength="50" required/>
						</div>
						<div class ="col-sm-2">

						</div>
					</div>
					<div class="row form-group">
						<div class ="col-sm-1">

						</div>
						<div class ="col-sm-2">
							<label class="control-label"><span class="asterisk">*</span>Icon app</label>
						</div>
						<div class="col-sm-7">
							<!--  <button class="btn btn-default ">Choose file</button></input> -->
							<input id="icon_app"  type="file" name="iconfile"  accept="image/*" onchange="showIconApp(this);" />
							<span class="text-muted">เฉพาะไฟล์ .jpg, .png</span><br />
							<img id="showicon" src="<?php echo $app_icon; ?>" alt="icon_app" width="150" height="150"  />
						</div>
						<div class ="col-sm-2">

						</div>
					</div>
					<div class="row form-group">
						<div class ="col-sm-1">

						</div>
						<div class ="col-sm-2">
							<label class="control-label"><span class="asterisk">*</span>Splash screen</label>
						</div>
						<div class="col-sm-7">
							<!--  <button type="file" class="btn btn-default btn-transparent">Choose file</button></input> -->
				  	 <input id="splash_app" value="<?php echo $app_splash; ?>" type="file" name="splashfile"  accept="image/*" onchange="showSplashApp(this);"/>
						 <span class="text-muted">เฉพาะไฟล์ .jpg, .png</span><br />
						<img id="showsplash" src="<?php echo $app_splash; ?>" alt="splash_app" width="150" height="150" />
						</div>
						<div class ="col-sm-2">

						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-xs-6">

						</div>
						<div class="col-xs-4 text-right">
							<button type="submit" id="save_form_appcreate" class="btn btn-primary" onclick="return  confirm('คุณต้องการแก้ไข ใช่หรือไม่')">บันทึกการแก้ไข</button>
							<button type="reset"  id="reset_appcreate" class="btn btn-default" onclick="return  confirm('คุณต้องการยกเลิก ใช่หรือไม่')">ยกเลิก</button>

							<!--<input type="submit" value="บันทึก">-->

						</div>
						<div class="col-xs-2">

						</div>
					</div>

				</div>
			</div>
		</div>
	</form>

	<!--Main Location-->
  <div class="listmainlocation panel-heading" >
    <div class="row">
      <div class="col-xs-6">
        <h4 class="panel-title">สถานที่หลัก</h4>
      </div>
      <div class="col-xs-6 ">

      </div>
    </div>
  </div>
  <div id="listmainlocation" class="listmainlocation col-xs-12-" >
    <div class="panel panel-default">
      <div class="panel-heading">
        <div class="row">
          <div class="col-xs-6">

          </div>
          <div class="col-xs-4 text-right">
            <!--<a href="index.php?page=locationcreate"> -->
            <button id="addmainlocation" class="btn btn-primary"><i class="fa fa-plus-circle"></i> เพิ่มสถานที่หลัก</button>
            <!--	</a> -->
          </div>
          <div class="col-xs-2">

          </div>
        </div>
      </div>

      <div class="panel-body">
        <div class="row">
          <div class=" col-sm-1">

          </div>
          <div class="col-sm-9">
            <div class="col-md-12 col-sm-12 col-xs-12 table-responsive force-table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th class ="text-center">ชื่อสถานที่หลัก</th>
                    <th class ="text-center">การกระทำ</th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $arrMainLocation = $functionClass->selectDataArr('*','main_location_app',"WHERE app_id = '$app_id'");
                  if(!empty($arrMainLocation)){
                  foreach ($arrMainLocation as $value) {
                   ?>
                  <tr>
                    <td class ="text-left"><?php echo $value['main_location_app_name']; ?></td>
                    <td class ="text-center">
											<a href="index.php?page=editmainlocation&app_id=<?php echo  $app_id; ?>&main_location_app_id=<?php echo $value['main_location_app_id'];?>" title="แก้ไขสถานที่หลัก"><i class="fa fa-pencil-square-o"></i></a>
											<a href="index.php?page=deletemainlocation&oldpage=<?php echo $_GET['page']; ?>&main_location_app_id=<?php echo  $value['main_location_app_id'];  ?>"title="ลบสถานที่หลัก" onclick="return  confirm('คุณต้องการลบสถานที่หลัก ใช่หรือไม่')"><i class="fa fa-trash-o"></i></a>
                    </td>
                  </tr>
                <?php }
                }
                else{
                  ?>
                  <!-- ว่างงไม่มีรายการ  -->
                  <?php
                }
                ?>


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

<?php
    if(!empty($arrMainLocation)){

 ?>
	<!-- location -->
  <div class="panel-heading listlocation" >
    <div class="row">
      <div class="col-xs-6">
        <h4 class="panel-title">สถานที่ย่อย</h4>
      </div>
      <div class="col-xs-6 ">

      </div>
    </div>
  </div>
	<div id="listlocation" class="listlocation col-xs-12-"  > <!--hidden -->
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-xs-6">

					</div>
					<div class="col-xs-4 text-right">
						<!--<a href="index.php?page=locationcreate"> -->
						<button id="addlocation" class="btn btn-primary"><i class="fa fa-plus-circle"></i> เพิ่มสถานที่ย่อย</button>
						<!--	</a> -->
					</div>
					<div class="col-xs-2">

					</div>
				</div>
			</div>

			<div class="panel-body">
				<div class="row">
					<div class=" col-sm-1">

					</div>
					<div class="col-sm-9">
						<div class="col-md-12 col-sm-12 col-xs-12 table-responsive force-table-responsive">
							<table class="table table-hover">
								<thead>
									<tr>
										<th class ="text-center">ชื่อสถานที่ย่อย</th>
										<th class ="text-center">การกระทำ</th>
									</tr>
								</thead>
								<tbody>

									<?php
	                $arrLocation = $functionClass->selectDataArr('*','location_app',"WHERE app_id = '$app_id'");
	                if(!empty($arrLocation)){
	                foreach ($arrLocation as $value) {
	                 ?>
	                <tr>
	                  <td class ="text-left"><?php echo $value['location_app_name']; ?></td>
	                  <td class ="text-center">
											<a href="index.php?page=editlocation&app_id=<?php echo  $app_id; ?>&location_app_id=<?php echo $value['location_app_id'];?>" title="แก้ไขสถานที่ย่อย"><i class="fa fa-pencil-square-o"></i></a>
											<a href="index.php?page=deletelocation&oldpage=<?php echo $_GET['page']; ?>&location_app_id=<?php echo  $value['location_app_id']; ?>" onclick="return  confirm('คุณต้องการลบสถานที่ย่อย ใช่หรือไม่')" title="ลบสถานที่ย่อย"><i class="fa fa-trash-o"></i></a>
	                  </td>
	                </tr>
	              <?php }   }
	              else{
	                ?>
	                <!-- ว่างงไม่มีรายการ  -->
	                <?php
	              }
	              ?>

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

  <?php
}
 ?>

	<div class="col-xs-12 form-group text-center">
		<a href="index.php?page=dashboard"><button type="submit" class="btn btn-success">กลับหน้าหลัก</button></a>
	</div>
</div>

<!-- END MAIN CONTENT -->
