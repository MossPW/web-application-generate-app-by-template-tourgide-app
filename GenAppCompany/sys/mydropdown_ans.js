function getDataUrl(name, url) {
    if (!url) url = window.location.href;
      name = name.replace(/[\[\]]/g, "\\$&");
      var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(url);
   if (!results) return null;
   if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}
  var page = getDataUrl('page');
if(page=="questioncreate"){
  $(document).ready(function() {
    $('.tables').hide(); //hide
    $('.type1').show(); //set default class to be shown here, or remove to hide all
  });

  $('#typeselector').change(function() { //on change do stuff
    $('.tables').hide(); //hide all with .box class
    $('.' + $(this).val()).show(); //show selected option's respective element
  });
}
