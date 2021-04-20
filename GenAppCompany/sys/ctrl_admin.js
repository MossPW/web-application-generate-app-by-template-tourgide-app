/*function set_data(tmp_data){
  var foo ="";
  $.ajax({
    async:false,
    type:"POST",
    url:"genCode.php",
    cache:false,
    data:tmp_data,
    success: function(data){
      foo = data;
    }
  });
  return foo;
}
function getDataUrl(name, url) {
    if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
   if (!results) return null;
   if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
/*
$(function() {
  $("#gencode").click(function() {
      $("#dvloader").show();
      //$(".block1").load("views/changepass.template.php", function(){ $("#dvloader").hide(); });
      return false;
  });
});*/

/*$(document).ready(function(){
  var page = getDataUrl('page');
  alert(page);
  if(page=="gen"){
    $("#dvloader").show();

    var form_data = new FormData();
    var app_id = getDataUrl('app_id');
    form_data.append('app_id', app_id);
     var msg=set_data_file(form_data);
    $.ajax({
        url: 'genCode.php',
        type: 'POST',
        data: post_data,
        success: function(data) {
          $("#dvloader").hide();
          alert(form_data);
        },
        error: function() {
            alert("Something went wrong!");
        }
    });
  /*  form_data.append('app_id', app_id);
    var msg=set_data_file(form_data);

    alert(form_data);
    $("#dvloader").hide();
*/
    //window.location = "admin_index.php?page=admindashboard";

  /*}


});
*/
