<!DOCTYPE html>
<html>
<head>
  <style>
    .file {
      visibility: hidden;
      position: absolute;
    }
  </style>
  <script>
    $(document).on('click', '.browse', function(){
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function(){
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  </script>
</head>

<body>

  <form action="testupload.php" method="post" enctype="multipart/form-data">
    <div class="content clearfix">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload" required>
      <input type="submit" value="Upload" name="submit">


    </div>

  </form>


  <label class="custom-file">
    <input type="file" id="file" class="custom-file-input">
    <span class="custom-file-control"></span>
  </label>


  <div class="container">

    <div class="form-group">
      <input type="file" name="img[]" class="file">
      <div class="input-group col-xs-12">
        <span class="input-group-addon"><i class="glyphicon glyphicon-picture"></i></span>
        <input type="text" class="form-control input-lg" disabled placeholder="Upload Image">
        <span class="input-group-btn">
          <button class="browse btn btn-primary input-lg" type="button"><i class="glyphicon glyphicon-search"></i> Browse</button>
        </span>
      </div>
    </div>


  </div>

</body>
</html>
