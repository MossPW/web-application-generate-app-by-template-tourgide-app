<?php
$app_id = $_GET['app_id'];
$location_app_id = $_GET['location_app_id'];
$question_app_id =  $_GET['question_app_id'];
$typeQuestion = 1;
$questionText="";
$questionChoice="";

$objQuestion = $functionClass->selectData('*','question_app',"WHERE question_app_id = '$question_app_id'");
  if (!empty($objQuestion)) {
$typeQuestion = $objQuestion['question_app_type'];
$questionText = $objQuestion['question_app_text'];
$questionChoice = $objQuestion['question_app_choice'];
}
//echo $typeQuestion;
?>
<!-- BEGIN MAIN CONTENT -->
<form id="form_addquestion" action="set_data.php" method ="post">
  <div id="main-content">
    <div class="col-xs-12-">
      <div class="panel-heading">
        <div class="row">
         <div class="col-xs-6">
          <h3 class="panel-title"><strong>แก้ไขคำถามและคำตอบ</strong></h3>
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
          <div class ="col-sm-2">
            <label class="control-label"><span class="asterisk">*</span>คำถาม </label>
            <span class="text-muted">(สูงสุด 200 ตัวอักษร)</span>
          </div>
          <div class="col-sm-7">
            <textarea id="qustiondescription" name="qustion" rows="5" value="" class="form-control valid" data-parsley-minlength="200"  maxlength="200" required ><?php echo $questionText ?></textarea>
          </div>
          <div class ="col-sm-2">

          </div>
        </div>
        <br>

      </div>
    </div>
  </div>
   <!--           <form id="form_addquestion" action="set_data.php" method ="post">
 -->
 <div class="col-xs-12-">
  <div class="panel panel-default">
    <div class="panel-heading">
      <div class="row">
        <div class ="col-sm-1">

        </div>
        <div class="col-xs-2">
          <label class="control-label">คำตอบ</label>
        </div>
        <div class="col-xs-7 text-right">
          <div class="col-xs-5">

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
            <?php
            if($typeQuestion==1){
                ?>
            <div id="type1" class="tables type1">
              <table class="table table-hover ">
                <thead>
                  <tr >
                    <th class ="text-center" >ตัวเลือกที่</th>
                    <th class ="text-center" ><span class="asterisk">*</span>ข้อความ <span class="text-muted">(สูงสุด 60 ตัวอักษร)</span></th>
                    <th class ="text-center" ><span class="asterisk">*</span>คำตอบที่ถูกต้อง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($questionChoice)) {
                    $arrChoice  = explode("_", $questionChoice);

                   ?>
                  <tr>
                    <td class ="text-center">1</td>
                    <td class ="text-center" ><input name = "choice1_type1" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[0]; ?>" data-parsley-id="5392" maxlength="60" required></td>
                    <td><input  type="radio" name="answertype1" value="1" required></td>
                  </tr>
                  <tr>
                    <td class ="text-center">2</td>
                    <td class ="text-center"><input name = "choice2_type1" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[1]; ?>" data-parsley-id="5392" maxlength="60" required></td>
                    <td><input type="radio" name="answertype1" value="2"></td>
                  </tr>
                  <tr>
                    <td class ="text-center">3</td>
                    <td class ="text-center"><input name = "choice3_type1"  type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[2]; ?>"  data-parsley-id="5392" maxlength="60" required></td>
                    <td><input type="radio" name="answertype1" value="3"></td>
                  </tr>
                  <tr>
                    <td class ="text-center">4</td>
                    <td class ="text-center"><input name = "choice4_type1" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[3]; ?>" data-parsley-id="5392" maxlength="60" required></td>
                    <td><input type="radio" name="answertype1" value="4"></td>
                  </tr>
                <?php
                  }
                ?>
                </tbody>
              </table>
            </div>
            <?php
              }

        if($typeQuestion==2){

             ?>

            <div id="type2" class="tables type2">
              <table class="table table-hover ">
                <thead>
                  <tr >
                    <th class ="text-center" >ตัวเลือกที่</th>
                    <th class ="text-center" >ข้อความ</th>
                    <th class ="text-center" ><span class="asterisk">*</span>คำตอบที่ถูกต้อง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($questionChoice)) {
                    $arrChoice  = explode("_", $questionChoice);

                   ?>
                  <tr>
                    <td class ="text-center">1</td>
                    <td class ="text-center" ><input  name = "choice1_type2" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[0]; ?>" data-parsley-id="5392" maxlength="60" disabled required></td>
                    <td><input  type="radio" name="answertype2" value="1" required></td>

                  </tr>
                  <tr>
                    <td class ="text-center">2</td>
                    <td class ="text-center"><input  name = "choice2_type2" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[1]; ?>" data-parsley-id="5392" maxlength="60" disabled required></td>
                    <td><input type="radio" name="answertype2" value="2"></td>
                  </tr>

                <?php } ?>

                </tbody>
              </table>
            </div>
            <?php
          }
          if($typeQuestion==3){

             ?>
            <div id="type3" class="tables type3">
              <table class="table table-hover ">
                <thead>
                  <tr >
                    <th class ="text-center" >ตัวเลือกที่</th>
                    <th class ="text-center" ><span class="asterisk">*</span>ข้อความ <span class="text-muted">(สูงสุด 60 ตัวอักษร)</span></th>
                    <th class ="text-center" ><span class="asterisk">*</span>คำตอบที่ถูกต้อง</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (!empty($questionChoice)) {
                    $arrChoice  = explode("_", $questionChoice);
                   ?>
                  <tr>
                    <td class ="text-center">1</td>
                    <td class ="text-center" ><input name = "choice1_type3" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[0]; ?>" data-parsley-id="5392" maxlength="60" required></td>
                    <td><input  type="checkbox" name="answertype3[]" class="checkboxtype3" value="1"></td>
                  </tr>
                  <tr>
                    <td class ="text-center">2</td>
                    <td class ="text-center"><input name = "choice2_type3" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[1]; ?>" data-parsley-id="5392" maxlength="60" required></td>
                    <td><input type="checkbox" name="answertype3[]" class="checkboxtype3" value="2"></td>
                  </tr>
                  <tr>
                    <td class ="text-center">3</td>
                    <td class ="text-center"><input name = "choice3_type3" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[2]; ?>"  data-parsley-id="5392" maxlength="60" required></td>
                    <td><input type="checkbox" name="answertype3[]" class="checkboxtype3" value="3"></td>
                  </tr>
                  <td class ="text-center">4</td>
                  <td class ="text-center"><input name = "choice4_type3" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[3]; ?>" data-parsley-id="5392" maxlength="60" required></td>
                  <td><input type="checkbox" name="answertype3[]" class="checkboxtype3" value="4"></td>
                </tr>
              <?php } ?>
              </tbody>
            </table>
          </div>
          <?php
          }
        if($typeQuestion==4){
            ?>
          <div id="type4" class="tables type4">
            <table class="table table-hover ">
              <thead>
                <tr >
                  <th class ="text-center" >ตัวเลือกที่</th>
                  <th class ="text-center" ><span class="asterisk">*</span>ข้อความ <span class="text-muted">(สูงสุด 40 ตัวอักษร)</span></th>
                  <th class ="text-center" ><span class="asterisk">*</span>ลำดับที่ถูกต้อง</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($questionChoice)) {
                  $arrChoice  = explode("_", $questionChoice);
                 ?>
                <tr>
                  <td class ="text-center">1</td>
                  <td class ="text-center" ><input name = "choice1_type4" type="text" data-parsley-minlength="3" class="form-control"value="<?php echo $arrChoice[0]; ?>" data-parsley-id="5392"  maxlength="40" required></td>
                  <td>
                    <select id="answertype4_1" class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                      <option value="1"><span class="text">1</span></option>
                      <option value="2"><span class="text">2</span></option>
                      <option value="3"><span class="text">3</span></option>
                      <option value="4"><span class="text">4</span></option>
                    </select>
                  </td>

                </tr>
                <tr>
                  <td class ="text-center">2</td>
                  <td class ="text-center"><input name = "choice2_type4" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[1]; ?>" data-parsley-id="5392" maxlength="40" required></td>
                  <td>
                    <select  id="answertype4_2" class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                      <option value="1"><span class="text">1</span></option>
                      <option value="2"><span class="text">2</span></option>
                      <option value="3"><span class="text">3</span></option>
                      <option value="4"><span class="text">4</span></option>
                    </select>
                  </td>
                </tr>
                <tr>
                  <td class ="text-center">3</td>
                  <td class ="text-center"><input name = "choice3_type4" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[2]; ?>" data-parsley-id="5392" maxlength="40" required></td>
                  <td>
                    <select  id="answertype4_3" class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                      <option value="1"><span class="text">1</span></option>
                      <option value="2"><span class="text">2</span></option>
                      <option value="3"><span class="text">3</span></option>
                      <option value="4"><span class="text">4</span></option>

                    </td>
                  </tr>
                  <tr>
                    <td class ="text-center">4</td>
                    <td class ="text-center"><input name = "choice4_type4" type="text" data-parsley-minlength="3" class="form-control" value="<?php echo $arrChoice[3]; ?>" data-parsley-id="5392" maxlength="40" required></td>
                    <td>
                      <select  id="answertype4_4" class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                        <option value="1"><span class="text">1</span></option>
                        <option value="2"><span class="text">2</span></option>
                        <option value="3"><span class="text">3</span></option>
                        <option value="4"><span class="text">4</span></option>
                      </select>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>

          <?php }?>

          </div>
        </div>
        <div class=" col-sm-2">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xs-12 form-group text-center">

 <button type="submit"  id="create-button" class="btn btn-success" onclick="return  confirm('คุณต้องการบันทึกการแก้ไข ใช่หรือไม่')">บันทึก</button>
 <button type="reset"  id="reset_question" class="btn btn-default" onclick="return  confirm('คุณต้องการยกเลิก ใช่หรือไม่')">ยกเลิก</button>

</div>
</div>
</form>


<!-- END MAIN CONTENT -->';
