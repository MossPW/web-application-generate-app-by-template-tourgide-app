<?php
$app_id = $_GET['app_id'];
$objApp = $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
?>
<!-- BEGIN MAIN CONTENT -->
<div id="main-content">
  <div class="col-xs-12-">
    <div class="panel-heading">
     <div class="row">
      <div class="col-xs-12">
       <h3 class="panel-title"><strong>ข้อมูลสถานที่หลัก </strong>(<?php echo $objApp['app_name_th'];?>)</h3>
     </div>
     <div class="">

     </div>
   </div>
 </div>
 <div class="panel panel-default">
   <form id="form_addmainlocation" action="set_data.php" method ="post">

    <div class="panel-body">
      <div class="row form-group">
        <div class ="col-sm-1">

        </div>
        <div class ="col-sm-2">
          <label class="control-label"><span class="asterisk">*</span>ชื่อสถานที่หลัก</label>
          <span class="text-muted">(สูงสุด 80 ตัวอักษร)</span>
        </div>
        <div class="col-sm-7">
          <input name="mainlocationname" type="text" placeholder="" class="input-field form-control" data-parsley-minlength="3" value=""  maxlength="80" required/>
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
         <input id="mainlocation_pic" type="file" name="mainlocationapppic"  accept="image/*" onchange="showLocationPic(this);" required />
         <span class="text-muted">เฉพาะไฟล์ .jpg, .png</span><br />
          <img id="showpiclocation" src="" alt="location_app_pic" width="200" height="200" hidden/>

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
            <input name="mainlocationlatitude" type="text" class="form-control MapLat" value="" placeholder="Latitude" required >
          </div>
        </div>
        <div class ="col-sm-6">
          <div class ="col-sm-4">
            <label class="control-label"><span class="asterisk">*</span>ลองจิจูด</label>
          </div>
          <div class="col-sm-8">
            <input name="mainlocationlongitude" type="text" class="form-control MapLon" value="" placeholder="Longitude" required>
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
       <button type="submit"  id="save_form_mainlocationcreate" class="btn btn-primary">บันทึก</button>
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
