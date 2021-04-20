function get_data(tmp_data){
  var foo ="";
  $.ajax({
    async:false,
    type:"POST",
    url:"get_data.php",
    cache:false,
    data:tmp_data,
    success: function(data){
      foo = data;
    }
  });
  return foo;
}
function set_data(tmp_data){
  var foo ="";
  $.ajax({
    async:false,
    type:"POST",
    url:"set_data.php",
    cache:false,
    data:tmp_data,
    success: function(data){
      foo = data;
    }
  });
  return foo;
}
function set_data_file(tmp_data){
  var foo ="";
  $.ajax({
    async:false,
    type:"POST",
    url:"set_data.php",
    cache:false,
   contentType: false,
    processData: false,
    data:tmp_data,
    success: function(data){
      foo = data;
    }
  });
  return foo;
}

function showIconApp(input) {
  $('#showicon').show();
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#showicon')
                   .attr('src', e.target.result)
                   .width(150)
                   .height(150);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }
   function showSplashApp(input) {
  $('#showsplash').show();
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#showsplash')
                   .attr('src', e.target.result)
                   .width(150)
                   .height(200);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }
   function showLocationPic(input) {
  $('#showpiclocation').show();
       if (input.files && input.files[0]) {
           var reader = new FileReader();

           reader.onload = function (e) {
               $('#showpiclocation')
                   .attr('src', e.target.result)
                   .width(200)
                   .height(200);
           };

           reader.readAsDataURL(input.files[0]);
       }
   }

$(document).ready(function(){
  var last_app_id;
  var last_location_app_id;
  var page = getDataUrl('page');

switch (page) {
  case 'appcreate': ////**case page****/////
  var app_id = getDataUrl('app_id');
   if(app_id==null){
      $('#form_createapp').submit(function(e) {
        var icon_app = $('#icon_app').prop('files')[0];
        var splash_app = $('#splash_app').prop('files')[0];
        var form_data = new FormData();
        form_data.append('case', 'form_createapp');
        form_data.append('appname_th', $('input[name=appname_th]').val());
        form_data.append('appname_en', $('input[name=appname_en]').val());
        form_data.append('icon_app', icon_app);
        form_data.append('splash_app', splash_app);
        //alert(set_data_file(form_data));
        /*
        var form = {
        'case'  : "form_createapp",
        'appname_th'              : $('input[name=appname_th]').val(),
        'appname_en'          : $('input[name=appname_en]').val(),
      };*/
      var msg=set_data_file(form_data);
      if(msg=="failure"){ //insert fail
          alert("ชื่อแอปพลิเคชั่นภาษาอังกฤษถูกใช้ไปแล้ว กรุณาระบุใหม!");
      }
      else {
          $('#listlocation').show();
            $('.listmainlocation').show();
          app_id=msg;
        }
      $("input").prop('disabled', true);
      $("#save_form_appcreate").hide();
      e.preventDefault();
      e.unbind();
      });
    }
   else{
       $('.listmainlocation').show();
      $('.listlocation').show();
      $("input").prop('disabled', true);
      $("#save_form_appcreate").hide();
      $('#showicon').show();
      $('#showsplash').show();
    }
    $('#addmainlocation').click(function() {
      window.location = "index.php?page=mainlocationcreate&app_id=" + app_id;
    });
    $('#addlocation').click(function() {
      window.location = "index.php?page=locationcreate&app_id=" + app_id;
    });
  break;
  case 'editapp'   :
  var app_id = getDataUrl('app_id');
  $('#form_editapp').submit(function(e) {
    if (confirm('คุณต้องการแก้ไข ใช่หรือไม่')) {
    var icon_app = $('#icon_app').prop('files')[0];
    var splash_app = $('#splash_app').prop('files')[0];
    var form_data = new FormData();
    form_data.append('case', 'form_editapp');
    form_data.append('app_id', app_id);
    form_data.append('appname_th', $('input[name=appname_th]').val());
    form_data.append('appname_en', $('input[name=appname_en]').val());
    form_data.append('icon_app', icon_app);
    form_data.append('splash_app', splash_app);
    var msg=set_data_file(form_data);
    if(msg=="failure"){ //insert fail
      alert("ชื่อแอปพลิเคชั่นภาษาอังกฤษถูกใช้ไปแล้ว กรุณาระบุใหม!");
    }
    else if(msg=="1"){
      //alert(msg);
      alert('แก้ไขสำเร็จ!');
      app_id=msg;
    }
    else {
      alert('--ไม่มีการแก้ไขเพิ่มเติม--');
    }
  }
    e.preventDefault();
    e.unbind();
  });
  $('#addmainlocation').click(function() {
    window.location = "index.php?page=mainlocationcreate&app_id=" + app_id;
  });
  $('#addlocation').click(function() {
    window.location = "index.php?page=locationcreate&app_id=" + app_id;
  });
  break;
// new  case main location
case  'mainlocationcreate' :////**case page****/////
      var app_id = getDataUrl('app_id');
    //lock enter button on submit
  $('#form_addmainlocation').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
    }
  });
  $('#form_addmainlocation').submit(function(a) {

    var mainlocation_pic = $('#mainlocation_pic').prop('files')[0];
    var form_data2 = new FormData();
    form_data2.append('case', 'form_addmainlocation');
    form_data2.append('app_id', app_id);
    form_data2.append('mainlocationname', $('input[name=mainlocationname]').val());
    form_data2.append('mainlocationlatitude', $('input[name=mainlocationlatitude]').val());
    form_data2.append('mainlocationlongitude', $('input[name=mainlocationlongitude]').val());
    form_data2.append('mainlocation_pic', mainlocation_pic);
    var msg=set_data_file(form_data2);

    alert(msg);
    window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
          a.preventDefault();
          a.unbind();
    });

   $('#reset_mainlocationcreate').click(function() {
     if(confirm('คุณต้องการยกเลิก ใช่หรือไม่')){
          window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
        }
    });
   $('#success_mainlocation').click(function() {
          window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
    });
    break;

//
  case  'locationcreate' :////**case page****/////
        var isLocation_app_id = getDataUrl('location_app_id');
        var app_id = getDataUrl('app_id');
   if (isLocation_app_id==null) {
      alert("don't have location_app_id");
      //lock enter button on submit
    $('#form_addlocation').on('keyup keypress', function(e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
      e.preventDefault();
      return false;
      }
    });
    $('#form_addlocation').submit(function(a) {
      var location_pic = $('#location_pic').prop('files')[0];
      var form_data2 = new FormData();
      form_data2.append('case', 'form_addlocation');
      form_data2.append('app_id', app_id);
      form_data2.append('mainlocationapp_id', $( "#mainlocationappid" ).val());
      form_data2.append('locationname', $('input[name=locationname]').val());
      form_data2.append('locationdescription',  $('textarea#locationdescription').val());
      form_data2.append('locationlatitude', $('input[name=locationlatitude]').val());
      form_data2.append('locationlongitude', $('input[name=locationlongitude]').val());
      form_data2.append('location_pic', location_pic);

            var msg=set_data_file(form_data2);
            alert(msg);
            isLocation_app_id = msg;
            $('#listquestion').show();
            $("input").prop('disabled', true);
            $("select").prop('disabled', true);
            $("textarea").prop('disabled', true);
            $("#map_canvas").hide();
            $("#save_form_locationcreate").hide();
            a.preventDefault();
            a.unbind();
      });

    }
     else {
      alert("has location_app_id");
      $('#showpiclocation').show();
      $('#listquestion').show();
      $("input").prop('disabled', true);
      $("textarea").prop('disabled', true);
      $("select").prop('disabled', true);
      $("#map_canvas").hide();
      $("#save_form_locationcreate").hide();

    }

    $('#addquestion').click(function() {
           window.location = "index.php?page=questioncreate&app_id=" + getDataUrl('app_id')  + "&location_app_id=" + isLocation_app_id;
     });
     $('#success_location').click(function() {
            window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
      });
  break;
// new case edit main location
case 'editmainlocation':
  var isMainLocation_app_id = getDataUrl('main_location_app_id');
  var app_id = getDataUrl('app_id');
  $('#form_editmainlocation').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
    }
  });
  $('#form_editmainlocation').submit(function(a) {
  if (confirm('คุณต้องการแก้ไข ใช่หรือไม่')) {
    var mainlocation_pic = $('#mainlocation_pic').prop('files')[0];
    var form_data2 = new FormData();
    form_data2.append('case', 'form_editmainlocation');
    form_data2.append('app_id', app_id);
    form_data2.append('mainlocation_app_id', isMainLocation_app_id);
    form_data2.append('mainlocationname', $('input[name=mainlocationname]').val());
    form_data2.append('mainlocationlatitude', $('input[name=mainlocationlatitude]').val());
    form_data2.append('mainlocationlongitude', $('input[name=mainlocationlongitude]').val());
    form_data2.append('mainlocation_pic', mainlocation_pic);
          var msg=set_data_file(form_data2);
          alert(msg);
         if(msg=="1"){
            alert('แก้ไขสำเร็จ!');
            window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
          }
          else {
            alert('--ไม่มีการแก้ไขเพิ่มเติม--');
            window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
          }
      }
      a.preventDefault();
      a.unbind();
    });
    $('#reset_mainlocationcreate').click(function() {
      if(confirm('คุณต้องการยกเลิก ใช่หรือไม่')){
           window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
         }
     });
     $('#success_location').click(function() {
            window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
      });
  break;

//


case 'editlocation':
  var isLocation_app_id = getDataUrl('location_app_id');
  var app_id = getDataUrl('app_id');
//set select mainlocation
 var get_mainloation = {
  "case": "get_mainloation",
  "location_app_id": isLocation_app_id,
}
 var mainLocation = get_data(get_mainloation);
 console.log(mainLocation);
  $("#mainlocationappid").val(mainLocation);
//
  $('#form_editlocation').on('keyup keypress', function(e) {
  var keyCode = e.keyCode || e.which;
  if (keyCode === 13) {
    e.preventDefault();
    return false;
    }
  });
  $('#form_editlocation').submit(function(a) {
  if (confirm('คุณต้องการแก้ไข ใช่หรือไม่')) {
    var location_pic = $('#location_pic').prop('files')[0];
    var form_data2 = new FormData();
    form_data2.append('case', 'form_editlocation');
    form_data2.append('app_id', app_id);
    form_data2.append('location_app_id', isLocation_app_id);
    form_data2.append('mainlocationapp_id', $( "#mainlocationappid" ).val());
    form_data2.append('locationname', $('input[name=locationname]').val());
    form_data2.append('locationdescription',  $('textarea#locationdescription').val());
    form_data2.append('locationlatitude', $('input[name=locationlatitude]').val());
    form_data2.append('locationlongitude', $('input[name=locationlongitude]').val());
    form_data2.append('location_pic', location_pic);
          var msg=set_data_file(form_data2);
          alert(msg);
         if(msg=="1"){
            alert('แก้ไขสำเร็จ!');
            app_id=msg;
          }
          else {
            alert('--ไม่มีการแก้ไขเพิ่มเติม--');
          }
      }
      a.preventDefault();
      a.unbind();
    });

    $('#addquestion').click(function() {
           window.location = "index.php?page=questioncreate&app_id=" + getDataUrl('app_id')  + "&location_app_id=" + isLocation_app_id;
     });
     $('#success_location').click(function() {
            window.location = "index.php?page=appcreate&app_id=" + getDataUrl('app_id');
      });
  break;

 case  'questioncreate' :  ////**case page****/////
  var location_app_id = getDataUrl('location_app_id');
  last_app_id = getDataUrl('app_id');
     $('#form_addquestion').submit(function(a) {

        if($(".type1").is(":visible")){
            var answer_check = $('input[name=answertype1]:checked').val();
            var answer_text;
              switch(answer_check) {
                case "1":
                  answer_text = $('input[name=choice1_type1]').val();
                break;
                case "2":
                  answer_text = $('input[name=choice2_type1]').val();
                break;
                case "3":
                  answer_text = $('input[name=choice3_type1]').val();
                break;
                case "4":
                  answer_text = $('input[name=choice4_type1]').val();
                break;
                default:
                break;
            }
            var choice_str = $('input[name=choice1_type1]').val()+"_"+$('input[name=choice2_type1]').val()+"_"+$('input[name=choice3_type1]').val()+"_"+$('input[name=choice4_type1]').val();
            var form_q = {
              'case'  : "form_createquestion",
              'location_app_id' : location_app_id,
              'type_question' : "1",
              'qustiondescription' :  $('textarea#qustiondescription').val(),
              'choice_str' : choice_str,
              'answer_text' : answer_text,
            };
         var msg=set_data(form_q);
         alert(msg);
        }
        //type 2 visible
        else if($(".type2").is(":visible")){
          var answer_check = $('input[name=answertype2]:checked').val();
          var answer_text;
            switch(answer_check) {
              case "1":
                answer_text = $('input[name=choice1_type2]').val();
              break;
              case "2":
                answer_text = $('input[name=choice2_type2]').val();
             break;
             default:
             break;
           }
         var choice_str = $('input[name=choice1_type2]').val()+"_"+$('input[name=choice2_type2]').val();
         var form_q = {
           'case'  : "form_createquestion",
           'location_app_id' : location_app_id,
           'type_question' : "2",
           'qustiondescription' :  $('textarea#qustiondescription').val(),
           'choice_str' : choice_str,
           'answer_text' : answer_text,
         };
         var msg=set_data(form_q);
         alert(msg);
       }
       //type 3 visible
       else if($(".type3").is(":visible")){
         alert("type3 show");
         var answer_text="";
         $('.checkboxtype3:checked').each(function(i){
           switch($(this).val()) {
             case "1":
              answer_text += $('input[name=choice1_type3]').val()+"_";
             break;
             case "2":
              answer_text += $('input[name=choice2_type3]').val()+"_";
              break;
              case "3":
              answer_text += $('input[name=choice3_type3]').val()+"_";
              break;
              case "4":
              answer_text += $('input[name=choice4_type3]').val()+"_";
              break;
              default:
              break;
            }
          });
       answer_text = answer_text.substring(0,answer_text.length-1); //cut last "_"
       var choice_str = $('input[name=choice1_type3]').val()+"_"+$('input[name=choice2_type3]').val()+"_"+$('input[name=choice3_type3]').val()+"_"+$('input[name=choice4_type3]').val();
       var form_q = {
         'case'  : "form_createquestion",
         'location_app_id' : location_app_id,
         'type_question' : "3",
         'qustiondescription' :  $('textarea#qustiondescription').val(),
         'choice_str' : choice_str,
         'answer_text' : answer_text,
      };
        var msg=set_data(form_q);
        alert(msg);
            }
      //type 4 visible
      else if($(".type4").is(":visible")){
        alert("type4 show");
        var answer_Arr = [];
        answer_Arr[parseInt($('#answertype4_1').val())-1] = $('input[name=choice1_type4]').val() ;
        answer_Arr[parseInt($('#answertype4_2').val())-1] = $('input[name=choice2_type4]').val() ;
        answer_Arr[parseInt($('#answertype4_3').val())-1] = $('input[name=choice3_type4]').val() ;
        answer_Arr[parseInt($('#answertype4_4').val())-1] = $('input[name=choice4_type4]').val() ;
        var answer_text="";
        for (i = 0; i < answer_Arr.length ; i++) {
          answer_text+=answer_Arr[i]+"_";
        }
        answer_text = answer_text.substring(0,answer_text.length-1);
        var choice_str = $('input[name=choice1_type4]').val()+"_"+$('input[name=choice2_type4]').val()+"_"+$('input[name=choice3_type4]').val()+"_"+$('input[name=choice4_type4]').val();
        var form_q = {
          'case'  : "form_createquestion",
          'location_app_id' : location_app_id,
          'type_question' : "4",
          'qustiondescription' :  $('textarea#qustiondescription').val(),
          'choice_str' : choice_str,
          'answer_text' : answer_text,
        };
        var msg=set_data(form_q);
        alert(msg);
      }
      window.location = "index.php?page=locationcreate&app_id=" + last_app_id+"&location_app_id="+location_app_id;

      a.preventDefault();
      a.unbind();
    });
    $('#cancle_question').click(function() {
          window.location = "index.php?page=locationcreate&app_id=" + last_app_id+"&location_app_id="+location_app_id;
     });
break;

default:
break;
}


// function get data form url
function getDataUrl(name, url) {
    if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
   if (!results) return null;
   if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
});
