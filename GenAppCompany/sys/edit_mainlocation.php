<?php
$app_id = $_GET['app_id'];
$objApp = $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
$main_location_app_id="";
$main_location_app_name ="";
$main_location_app_latitude="";
$main_location_app_longitude="";
$main_location_app_pic="";
if(isset($_GET['main_location_app_id'])){
  $main_location_app_id = $_GET['main_location_app_id'];
  $objMainLocation = $functionClass->selectData('*','main_location_app',"WHERE main_location_app_id = '$main_location_app_id'");
  $main_location_app_name =$objMainLocation['main_location_app_name'];
  $main_location_app_latitude=$objMainLocation['main_location_app_latitude'];
  $main_location_app_longitude=$objMainLocation['main_location_app_longitude'];
  $main_location_app_pic=$objMainLocation['main_location_app_pic'];
  //url app_splash
	$main_location_app_pic = $base_url.'files/file_app/'.$app_id.'/'.'location'.'/'.$main_location_app_pic;
}
?>
<!-- BEGIN MAIN CONTENT -->
<div id="main-content">
  <div class="col-xs-12-">
    <div class="panel-heading">
     <div class="row">
      <div class="col-xs-12">
       <h3 class="panel-title"><strong>แก้ไขข้อมูลสถานที่หลัก </strong>(<?php echo $objApp['app_name_th'];?>)</h3>
     </div>
     <div class="">

     </div>
   </div>
 </div>
 <div class="panel panel-default">
   <form id="form_editmainlocation" action="set_data.php" method ="post">

    <div class="panel-body">
      <div class="row form-group">
        <div class ="col-sm-1">

        </div>
        <div class ="col-sm-2">
          <label class="control-label"><span class="asterisk">*</span>ชื่อสถานที่หลัก</label>
          <span class="text-muted">(สูงสุด 80 ตัวอักษร)</span>
        </div>
        <div class="col-sm-7">
          <input name="mainlocationname" type="text" placeholder="" class="input-field form-control" data-parsley-minlength="3" value="<?php echo $main_location_app_name; ?>" maxlength="80" required/>
        </div>
        <div class ="col-sm-2">

        </div>
      </div>


      <div class="row form-group">
        <div class ="col-sm-1">

        </div>
        <div class ="col-sm-2">
          <label class="control-label"><span class="asterisk">*</span>ภาพสถานที่หลัก</label>
        </div>
        <div class="col-sm-7">
         <?php //echo $location_app_pic; ?>
         <input id="mainlocation_pic" type="file" name="mainlocationapppic"  accept="image/*" onchange="showLocationPic(this);" />
         <span class="text-muted">เฉพาะไฟล์ .jpg, .png</span><br />
          <img id="showpiclocation" src="<?php echo $main_location_app_pic; ?>" alt="location_app_pic" width="200" height="200" />

       </div>
       <div class ="col-sm-2">

       </div>
     </div>

    <div class="row form-group">
      <div class ="col-sm-1">

      </div>
      <div class ="col-sm-2">
        <label class="control-label">ค้นหาที่อยู่</label>
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
            <label class="control-label"><span class="asterisk">*</span>ละติจูด</label>
          </div>
          <div class="col-sm-8">
            <input name="mainlocationlatitude" type="text" class="form-control MapLat" value="<?php echo $main_location_app_latitude; ?>" placeholder="Latitude" required >
          </div>
        </div>
        <div class ="col-sm-6">
          <div class ="col-sm-4">
            <label class="control-label"><span class="asterisk">*</span>ลองจิจูด</label>
          </div>
          <div class="col-sm-8">
            <input name="mainlocationlongitude" type="text" class="form-control MapLon" value="<?php echo $main_location_app_longitude; ?>" placeholder="Longitude" required>
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
    <div class="row">
      <div class="col-xs-6">

      </div>
      <div class="col-xs-4 text-right">
       <button type="submit"  id="save_form_mainlocationcreate" class="btn btn-primary" onclick="return  confirm('คุณต้องการแก้ไข ใช่หรือไม่')" >บันทึกการแก้ไข</button>
       <button type="reset"  id="reset_mainlocationcreate" class="btn btn-default" onclick="return  confirm('คุณต้องการยกเลิก ใช่หรือไม่')">ยกเลิก</button>
     </div>
     <div class="col-xs-2">

     </div>
   </div>
 </div>
</form>
</div>
</div>


<div class="col-xs-12 form-group text-center">
  <button type="submit" id="success_mainlocation" class="btn btn-success">ย้อนกลับ</button>
</div>
</div>
<!-- END MAIN CONTENT -->';
