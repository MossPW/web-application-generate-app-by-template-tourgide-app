<?php
$app_id = $_GET['app_id'];
$objApp = $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
$location_app_id="";
$location_app_name ="";
$location_app_latitude="";
$location_app_longitude="";
$location_app_detail="";
$location_app_pic="";
$arrLocationMorepic="";
if(isset($_GET['location_app_id'])){
  $location_app_id = $_GET['location_app_id'];
  $objLocation = $functionClass->selectData('*','location_app',"WHERE location_app_id = '$location_app_id'");
  $location_app_name =$objLocation['location_app_name'];
  $location_app_latitude=$objLocation['location_app_latitude'];
  $location_app_longitude=$objLocation['location_app_longitude'];
  $location_app_detail=$objLocation['location_app_detail'];
  $location_app_pic=$objLocation['location_app_pic'];
  $location_app_more_pic = $objLocation['location_app_more_pic'];
  if(!empty($location_app_more_pic)){
    $arrLocationMorepic = explode(",", $location_app_more_pic);

  }

  //url app_
	$location_app_pic = $base_url.'files/file_app/'.$app_id.'/'.'location'.'/'.$location_app_pic;
  $url_location_more_pic = $base_url.'files/file_app/'.$app_id.'/'.'location'.'/';
}
?>
<!-- BEGIN MAIN CONTENT -->
<div id="main-content">
  <div class="col-xs-12-">
    <div class="panel-heading">
     <div class="row">
      <div class="col-xs-6">
       <h3 class="panel-title"><strong>แก้ไขข้อมูลสถานที่ </strong>(<?php echo $objApp['app_name_th'];?>)</h3>
     </div>
     <div class="col-xs-6 ">

     </div>
   </div>
 </div>
 <div class="panel panel-default">
   <form id="form_editlocation" action="set_data.php" method ="post">

    <div class="panel-body">
      <div class="row form-group">
        <div class ="col-sm-1">

        </div>
        <div class ="col-sm-2">
          <label class="control-label"><span class="asterisk">*</span>ชื่อสถานที่</label>
          <span class="text-muted">(สูงสุด 80 ตัวอักษร)</span>
        </div>
        <div class="col-sm-7">
          <input name="locationname" type="text" placeholder="" class="input-field form-control" data-parsley-minlength="3" value="<?php echo $location_app_name; ?>"  maxlength="80" required/>
        </div>
        <div class ="col-sm-2">

        </div>
      </div>

      <!-- selection main location -->
       <div class="row form-group">
          <div class ="col-sm-1">
          </div>
          <div class ="col-sm-2">
             <label class="control-label"><span class="asterisk">*</span>สถานที่หลัก</label>
          </div>
          <div class="col-sm-3">
             <select id="mainlocationappid" class="form-control" data-style="btn-primary"required>
               <?php
               $arrMainLocation = $functionClass->selectDataArr('*','main_location_app',"WHERE app_id = '$app_id'");
               if(!empty($arrMainLocation)){
               foreach ($arrMainLocation as $value) {
                ?>
                <option value="<?php echo $value['main_location_app_id'];?>"><?php echo $value['main_location_app_name']; ?></option>
              <?php }
              }
             ?>
             </select>
             <div class ="col-sm-2">
             </div>
          </div>
       </div>
    <!--end select main location -->

      <div class="row form-group">
        <div class ="col-sm-1">

        </div>
        <div class ="col-sm-2">
          <label class="control-label"><span class="asterisk">*</span>ภาพสถานที่</label>
        </div>
        <div class="col-sm-7">
         <?php //echo $location_app_pic; ?>
         <input id="location_pic" type="file" name="locationapppic"  accept="image/*" onchange="showLocationPic(this);" />
         <span class="text-muted">เฉพาะไฟล์ .jpg, .png</span><br />
          <img id="showpiclocation" src="<?php echo $location_app_pic; ?>" alt="location_app_pic" width="200" height="200" />

       </div>
       <div class ="col-sm-2">

       </div>
     </div>
     <div class="row form-group">
      <div class ="col-sm-1">

      </div>
      <div class ="col-sm-2">
        <label class="control-label"><span class="asterisk">*</span>คำอธิบายสถานที่</label>
      </div>
      <div class="col-sm-7">
        <textarea id="locationdescription" name="locationdescription" rows="5" class="form-control valid" placeholder="" data-parsley-minlength="200" value="" required=""><?php echo $location_app_detail; ?></textarea>
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
            <input name="locationlatitude" type="text" class="form-control MapLat" value="<?php echo $location_app_latitude; ?>" placeholder="Latitude" required >
          </div>
        </div>
        <div class ="col-sm-6">
          <div class ="col-sm-4">
            <label class="control-label"><span class="asterisk">*</span>ลองจิจูด</label>
          </div>
          <div class="col-sm-8">
            <input name="locationlongitude" type="text" class="form-control MapLon" value="<?php echo $location_app_longitude; ?>" placeholder="Longitude" required>
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

    <!--  more pic -->
    <div class="row form-group">
      <div class ="col-sm-1">

      </div>
      <div class ="col-sm-2">
        <label class="control-label">ภาพสถานที่เพิ่มเติม</label><br />

      </div>
      <div class="col-sm-7">
       <?php //echo $location_app_pic; ?>

        <input type="file" name="location_more_pic" id="location_more_pic"  accept="image/*" multiple />
        <span class="text-muted">เฉพาะไฟล์ .jpg, .png (ไม่เกิน3รูป)</span>
        <span id="error_location_more_pic"></span>

        <div class="gallery">
          <?php
          if(!empty($arrLocationMorepic)){
          for($i=0;$i<count($arrLocationMorepic);$i++){
            $namepic = $arrLocationMorepic[$i];
            ?>
            <img id="showMoreLocationPic<?php echo ($i+1); ?>" class="showMoreLocationPic" src="<?php echo $url_location_more_pic.$namepic; ?>" alt="location_more_pic" width="200" height="200" />
            <?php
          }
        }
           ?>

        </div>



     </div>
     <div class ="col-sm-2">

     </div>
    </div>
  <!-- -->

    <br>
    <div class="row">
      <div class="col-xs-6">

      </div>
      <div class="col-xs-4 text-right">
       <button type="submit"  id="save_form_locationcreate" class="btn btn-primary" onclick="return  confirm('คุณต้องการบันทึกการแก้ไข ใช่หรือไม่')">บันทึกการแก้ไข</button>
       <button type="reset"  id="reset_locationcreate" class="btn btn-default" onclick="return  confirm('คุณต้องการยกเลิก ใช่หรือไม่')">ยกเลิก</button>

     </div>
     <div class="col-xs-2">

     </div>
   </div>
 </div>
</form>
</div>
</div>

<div id="listquestion" class="col-xs-12-" >
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="row">
        <div class="col-xs-6">

        </div>
        <div class="col-xs-4 text-right">
          <button id="addquestion" class="btn btn-primary"><i class="fa fa-plus-circle"></i> เพิ่มคำถาม</button>
        </div>
        <div class="col-xs-2">

        </div>
      </div>
    </div>
    <div class="panel-body">
      <div class="row">
        <div class=" col-sm-1">

        </div>
        <div class="col-sm-9 ">
          <div class="col-md-12 col-sm-12 col-xs-12 table-responsive force-table-responsive">
            <table class="table table-hover ">
              <thead>
                <tr>
                  <th class ="text-center">คำถาม</th>
                  <th class ="text-center">การกระทำ</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $arrQuestion = $functionClass->selectDataArr('*','question_app',"WHERE location_app_id = '$location_app_id'");
                if(!empty($arrQuestion)){
                foreach ($arrQuestion as $value) {
                 ?>
                <tr>
                  <td class ="text-left"><?php echo $value['question_app_text']; ?></td>
                  <td class ="text-center">
                    <a href="index.php?page=editquestion&app_id=<?php echo  $app_id; ?>&location_app_id=<?php echo $value['location_app_id'];?>&question_app_id=<?php echo  $value['question_app_id']; ?>&questiontype=<?php echo  $value['question_app_type']; ?>" title="แก้ไขคำถาม"><i class="fa fa-pencil-square-o"></i></a>
                    <a href="index.php?page=deletequestion&oldpage=<?php echo $_GET['page']; ?>&app_id=<?php echo $app_id; ?>&location_app_id=<?php echo $location_app_id; ?>&question_app_id=<?php echo  $value['question_app_id']; ?>"><i class="fa fa-trash-o" onclick="return  confirm('คุณต้องการลบคำถาม ใช่หรือไม่')" title="ลบคำถาม"></i></a>
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
<div class="col-xs-12 form-group text-center">
  <button type="submit" id="success_location" class="btn btn-success">ย้อนกลับ</button>
</div>
</div>
<!-- END MAIN CONTENT -->';
