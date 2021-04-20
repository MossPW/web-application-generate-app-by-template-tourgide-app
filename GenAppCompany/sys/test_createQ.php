<!-- BEGIN MAIN CONTENT -->
<form id="form_addquestion" action="set_data.php" method ="post">
  <div id="main-content">
    <div class="col-xs-12-">
      <div class="panel-heading">
        <div class="row">
         <div class="col-xs-6">
          <h3 class="panel-title"><strong>คำถามและคำตอบ</strong></h3>
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
            <label class="control-label">คำถาม</label>
          </div>
          <div class="col-sm-7">
            <textarea id="qustiondescription" name="qustion" rows="5" class="form-control valid" placeholder="" data-parsley-minlength="200" required=""></textarea>
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
          <div class="col-xs-7">
            <select id="typeselector" class="form-control" data-style = "btn btn-primary" title="Select an answer type..." style="display: none;">
              <option data-icon ="fa-toggle-right" value="type1">
                <span class="text">สี่ตัวเลือกหนึ่งคำตอบ</span>
              </option>
              <option data-icon ="fa-dot-circle-o" value="type2">
                <span class="text">สองตัวเลือกหนึ่งคำตอบ</span>
              </option>
              <option data-icon ="fa-check-square" value="type3">
                <span class="text">สี่ตัวเลือกหลายคำตอบ</span>
              </option>
              <option data-icon = "fa-filter" value="type4">
                <span class="text">เรียงลำดับ</span>

              </option>
            </select>
          </div>
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
            <div id="type1" class="tables type1">
              <table class="table table-hover ">
                <thead>
                  <tr >
                    <th class ="text-center" >ตัวเลือกที่</th>
                    <th class ="text-center" >ข้อความ</th>
                    <th class ="text-center" >คำตอบที่ถูกต้อง</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class ="text-center">1</td>
                    <td class ="text-center" ><input name = "choice1_type1" type="text" data-parsley-minlength="3" class="form-control"  data-parsley-id="5392"></td>
                    <td><input  type="radio" name="answertype1" value="1" checked></td>

                  </tr>
                  <tr>
                    <td class ="text-center">2</td>
                    <td class ="text-center"><input name = "choice2_type1" type="text" data-parsley-minlength="3" class="form-control"  data-parsley-id="5392"></td>
                    <td><input type="radio" name="answertype1" value="2"></td>
                  </tr>
                  <tr>
                    <td class ="text-center">3</td>
                    <td class ="text-center"><input name = "choice3_type1"  type="text" data-parsley-minlength="3" class="form-control"  data-parsley-id="5392"></td>
                    <td><input type="radio" name="answertype1" value="3"></td>
                  </tr>
                  <tr>
                    <td class ="text-center">4</td>
                    <td class ="text-center"><input name = "choice4_type1" type="text" data-parsley-minlength="3" class="form-control"  data-parsley-id="5392"></td>
                    <td><input type="radio" name="answertype1" value="4"></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div id="type2" class="tables type2">
              <table class="table table-hover ">
                <thead>
                  <tr >
                    <th class ="text-center" >ตัวเลือกที่</th>
                    <th class ="text-center" >ข้อความ</th>
                    <th class ="text-center" >คำตอบที่ถูกต้อง</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class ="text-center">1</td>
                    <td class ="text-center" ><input  name = "choice1_type2" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
                    <td><input  type="radio" name="answertype2" value="1" checked></td>

                  </tr>
                  <tr>
                    <td class ="text-center">2</td>
                    <td class ="text-center"><input  name = "choice2_type2" type="text" data-parsley-minlength="3" class="form-control"  data-parsley-id="5392"></td>
                    <td><input type="radio" name="answertype2" value="2"></td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div id="type3" class="tables type3">
              <table class="table table-hover ">
                <thead>
                  <tr >
                    <th class ="text-center" >ตัวเลือกที่</th>
                    <th class ="text-center" >ข้อความ</th>
                    <th class ="text-center" >คำตอบที่ถูกต้อง</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td class ="text-center">1</td>
                    <td class ="text-center" ><input name = "choice1_type3" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
                    <td><input  type="checkbox" name="answertype3[]" class="checkboxtype3" value="1"></td>
                  </tr>
                  <tr>
                    <td class ="text-center">2</td>
                    <td class ="text-center"><input name = "choice2_type3" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
                    <td><input type="checkbox" name="answertype3[]" class="checkboxtype3" value="2"></td>
                  </tr>
                  <tr>
                    <td class ="text-center">3</td>
                    <td class ="text-center"><input name = "choice3_type3" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
                    <td><input type="checkbox" name="answertype3[]" class="checkboxtype3" value="3"></td>
                  </tr>
                  <td class ="text-center">4</td>
                  <td class ="text-center"><input name = "choice4_type3" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
                  <td><input type="checkbox" name="answertype3[]" class="checkboxtype3" value="4"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div id="type4" class="tables type4">
            <table class="table table-hover ">
              <thead>
                <tr >
                  <th class ="text-center" >ตัวเลือกที่</th>
                  <th class ="text-center" >ข้อความ</th>
                  <th class ="text-center" >ลำดับที่ถูกต้อง</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class ="text-center">1</td>
                  <td class ="text-center" ><input name = "choice1_type4" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
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
                  <td class ="text-center"><input name = "choice2_type4" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
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
                  <td class ="text-center"><input name = "choice3_type4" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
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
                    <td class ="text-center"><input name = "choice4_type4" type="text" data-parsley-minlength="3" class="form-control" data-parsley-id="5392"></td>
                    <td>
                      <select  id="answertype4_4" class="form-control" data-style = "btn btn-default" title="Select an answer type..." style="display: none;">
                        <option value="1"><span class="text">1</span></option>
                        <option value="2"><span class="text">2</span></option>
                        <option value="3"><span class="text">3</span></option>
                        <option value="4"><span class="text">4</span></option>
                      </select>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

          </div>
        </div>
        <div class=" col-sm-2">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-xs-12 form-group text-center">
  <?php
  $app_id = $_GET['app_id'];
  $location_app_id = $_GET['location_app_id'];
  ?>
  <!--<a href="index.php?page=locationcreate"> --> <button type="submit"  id="create-button" class="btn btn-success">บันทึก</button> <!--</a> -->
  <!--<a href="index.php?page=locationcreate"><button type="reset" class="btn btn-default">ยกเลิก</button></a> -->
</div>
</div>
</form>


<!-- END MAIN CONTENT -->';
