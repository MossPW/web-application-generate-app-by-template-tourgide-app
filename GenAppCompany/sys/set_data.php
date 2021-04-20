<?php
include('config/connect_db.php');
include('config/session.php');
include('config/function.php');
//sensitive data edit ' to "  str_replace("'", '"', data);
switch ($_POST['case']) {
  case 'form_createapp':
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $functionClass = new FunctionClass();
    $user_id = $_SESSION['user_id'];
    $appname_th = $_POST['appname_th'];
    $appname_th = str_replace("'", '"', $appname_th);
    $appname_en = $_POST['appname_en'];
    $appname_en = str_replace("'", '"', $appname_en);
    $app_status = "draft"; //set defult status app before payment
    $newAppname_en = ereg_replace('[[:space:]]+', '', trim($appname_en)); //remove space
    //rename file
    $nameicon =  $_FILES['icon_app']['name'];
    $file_ext_icon = substr($nameicon, strripos($nameicon, '.')); // get file name
    $nameicon =  "icon_app" . $file_ext_icon;
    $namesplash = $_FILES['splash_app']['name'];
    $file_ext_splash = substr($namesplash, strripos($namesplash, '.')); // get file name
    $namesplash =  "splash_app" . $file_ext_splash;
     //#code mange file input

      $result =  $functionClass->selectData('*','app',"WHERE app_name_en ='$newAppname_en'");
      if(!empty($result)){
        echo 'failure';
      }
      else{
        $last_app_id = $functionClass->insertData('app','customer_id,app_name_th,app_name_en,app_icon,app_splash,app_status',"'$user_id','$appname_th','$newAppname_en','$nameicon','$namesplash','$app_status'");
        ///create directoy file_app/app_id
        mkdir("files/file_app/$last_app_id");
        ///create directoy file app and location
        mkdir("files/file_app/$last_app_id/"."app");
        mkdir("files/file_app/$last_app_id/"."location");
        mkdir("files/file_app/$last_app_id/"."file_apk");
        mkdir("files/file_app/$last_app_id/"."file_android");
        mkdir("files/file_app/$last_app_id/"."file_zip_android");
        //move file icon app to file
        move_uploaded_file($_FILES['icon_app']['tmp_name'], 'files/file_app/'."$last_app_id".'/'.'app'.'/'. $nameicon) or die ("error_file_icon");
        //move file splash app to file
        move_uploaded_file($_FILES['splash_app']['tmp_name'], 'files/file_app/'."$last_app_id".'/'.'app'.'/' . $namesplash) or die ("error_file_splash");
        echo $last_app_id;
        //#code mange file input
      }
    }
    break;

    case 'form_editapp':
      if($_SERVER['REQUEST_METHOD']=='POST'){
        $functionClass = new FunctionClass();
        $user_id = $_SESSION['user_id'];
        $app_id = $_POST['app_id'];
        $appname_th = $_POST['appname_th'];
        $appname_th = str_replace("'", '"', $appname_th);
        $appname_en = $_POST['appname_en'];
        $appname_en = str_replace("'", '"', $appname_en);
        $newAppname_en = ereg_replace('[[:space:]]+', '', trim($appname_en)); //remove space

        $resultOldApp =  $functionClass->selectData('*','app',"WHERE app_id = '$app_id'");
        $nameiconOld = $resultOldApp['app_icon'];
        $namesplashOld = $resultOldApp['app_splash'];
        $oldAppname_en = $resultOldApp['app_name_en'];

        if($oldAppname_en!=$newAppname_en){
        $result =  $functionClass->selectData('*','app',"WHERE app_name_en ='$newAppname_en' AND NOT(app_id = '$app_id')");
         if(!empty($result)){
           echo 'same app_name_en';
         }
        }

      else{
        if(!empty( $_FILES['icon_app']['name'])&&!empty( $_FILES['splash_app']['name'])){ //has file
          $nameicon =  $_FILES['icon_app']['name'];
          $file_ext_icon = substr($nameicon, strripos($nameicon, '.')); // get file name
          $nameicon =  "icon_app" . $file_ext_icon;
          $namesplash = $_FILES['splash_app']['name'];
          $file_ext_splash = substr($namesplash, strripos($namesplash, '.')); // get file name
          $namesplash =  "splash_app" . $file_ext_splash;
          //unlink old files
          unlink('files/file_app/'."$app_id".'/'.'app'.'/'. "$nameiconOld");
          unlink('files/file_app/'."$app_id".'/'.'app'.'/'. "$namesplashOld");
          //move file icon app to file
          move_uploaded_file($_FILES['icon_app']['tmp_name'], 'files/file_app/'."$app_id".'/'.'app'.'/'. $nameicon) or die ("error_file_icon");
          //move file splash app to file
          move_uploaded_file($_FILES['splash_app']['tmp_name'], 'files/file_app/'."$app_id".'/'.'app'.'/' . $namesplash) or die ("error_file_splash");
          //update data
          $isUpdate = $functionClass->updateData('app',"app_name_th='$appname_th',app_name_en='$newAppname_en',app_icon='$nameicon',app_splash='$namesplash'","WHERE app_id='$app_id'");
           echo $isUpdate;
        }
        else if(!empty( $_FILES['icon_app']['name'])){ //has icon app file
          $nameicon =  $_FILES['icon_app']['name'];
          $file_ext_icon = substr($nameicon, strripos($nameicon, '.')); // get file name
          $nameicon =  "icon_app" . $file_ext_icon;
          //unlink old files
          unlink('files/file_app/'."$app_id".'/'.'app'.'/'. "$nameiconOld");
          //move file icon app to file
          move_uploaded_file($_FILES['icon_app']['tmp_name'], 'files/file_app/'."$app_id".'/'.'app'.'/'. $nameicon) or die ("error_file_icon");
          $isUpdate = $functionClass->updateData('app',"app_name_th='$appname_th',app_name_en='$newAppname_en',app_icon='$nameicon'","WHERE app_id='$app_id'");
           echo $isUpdate;
        }
        else if(!empty( $_FILES['splash_app']['name'])){ //has splash app file
          $namesplash = $_FILES['splash_app']['name'];
          $file_ext_splash = substr($namesplash, strripos($namesplash, '.')); // get file name
          $namesplash =  "splash_app" . $file_ext_splash;
          //unlink old files
          unlink('files/file_app/'."$app_id".'/'.'app'.'/'. "$namesplashOld");
          move_uploaded_file($_FILES['splash_app']['tmp_name'], 'files/file_app/'."$app_id".'/'.'app'.'/' . $namesplash) or die ("error_file_splash");
          //update data
          $isUpdate = $functionClass->updateData('app',"app_name_th='$appname_th',app_name_en='$newAppname_en',app_splash='$namesplash'","WHERE app_id='$app_id'");
           echo $isUpdate;
        }
        else{ //empty file
          $isUpdate = $functionClass->updateData('app',"app_name_th='$appname_th',app_name_en='$newAppname_en'","WHERE app_id='$app_id'");
           echo $isUpdate;
          }
      }
    }
    break;

  case 'form_addmainlocation' :
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $functionClass = new FunctionClass();
    $app_id = $_POST['app_id'];
    $mainlocationname = $_POST['mainlocationname'];
    $mainlocationname = str_replace("'", '"', $mainlocationname);
    $mainlocationlatitude = $_POST['mainlocationlatitude'];
    $mainlocationlongitude = $_POST['mainlocationlongitude'];
    $namemainlocationpic =  $_FILES['mainlocation_pic']['name'];
    //#code mange file input
     $last_mainlocation_id = $functionClass->insertData('main_location_app','app_id,main_location_app_name,main_location_app_latitude,main_location_app_longitude',"'$app_id','$mainlocationname','$mainlocationlatitude','$mainlocationlongitude'");
     $file_ext_icon = substr($namemainlocationpic, strripos($namemainlocationpic, '.')); // get file name
     $namemainlocationpic =  "mpoi".$last_mainlocation_id.$file_ext_icon;
     //echo $namelocationpic;
     $functionClass->updateData('main_location_app',"main_location_app_pic='$namemainlocationpic'","WHERE main_location_app_id='$last_mainlocation_id'");
     //move file location_pic to file
     move_uploaded_file($_FILES['mainlocation_pic']['tmp_name'], 'files/file_app/'."$app_id".'/'.'location'.'/'. $namemainlocationpic) or die ("error_file_icon");

      echo $last_mainlocation_id;
    }
    break;

  case 'form_addlocation':
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $functionClass = new FunctionClass();
      $app_id = $_POST['app_id'];
      $mainlocationapp_id = $_POST['mainlocationapp_id'];
      $locationname = $_POST['locationname'];
      $locationname = str_replace("'", '"', $locationname);
      $locationdescription = $_POST['locationdescription'];
      $locationdescription = str_replace("'", '"', $locationdescription);
      $locationlatitude = $_POST['locationlatitude'];
      $locationlongitude = $_POST['locationlongitude'];
      $namelocationpic =  $_FILES['location_pic']['name'];
      //#code mange file input
       $last_location_id = $functionClass->insertData('location_app','app_id,main_location_app_id,location_app_name,location_app_latitude,location_app_longitude,location_app_detail',"'$app_id','$mainlocationapp_id','$locationname','$locationlatitude','$locationlongitude','$locationdescription'");
       $file_ext_icon = substr($namelocationpic, strripos($namelocationpic, '.')); // get file name
       $namelocationpic =  "poi".$last_location_id.$file_ext_icon;
       //echo $namelocationpic;
       $functionClass->updateData('location_app',"location_app_pic='$namelocationpic'","WHERE location_app_id='$last_location_id'");
       //move file location_pic to file
       move_uploaded_file($_FILES['location_pic']['tmp_name'], 'files/file_app/'."$app_id".'/'.'location'.'/'. $namelocationpic) or die ("error_file_icon");

       if(!empty($_FILES["location_more_pic"]["name"]))
       {
         $namemorelocationpic = $_FILES["location_more_pic"]["name"];
         $strmorelocationpic="";
         for($i=0;$i<count($namemorelocationpic);$i++){
           //poi1_1
           $oldname = $namemorelocationpic[$i];
           $file_ext_morelo = substr($oldname, strripos($oldname, '.')); // get file name
           $newname =  "poi".$last_location_id."_". ($i+1) .$file_ext_morelo;
           if ($i < count($namemorelocationpic) - 1) {
             $strmorelocationpic.=$newname."," ;
           }
           else{
           $strmorelocationpic.=$newname;
         }
         ///
         move_uploaded_file($_FILES['location_more_pic']['tmp_name'][$i], 'files/file_app/'."$app_id".'/'.'location'.'/'. $newname) or die ("error_file_icon");
         }
       // echo $strmorelocationpic;
         $functionClass->updateData('location_app',"location_app_more_pic='$strmorelocationpic'","WHERE location_app_id='$last_location_id'");
         }

        echo $last_location_id;

    }
    break;

    case 'form_editmainlocation':
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $functionClass = new FunctionClass();
      $app_id = $_POST['app_id'];
      $mainlocation_app_id = $_POST['mainlocation_app_id'];
      $mainlocationname = $_POST['mainlocationname'];
      $mainlocationname = str_replace("'", '"', $mainlocationname);
      $mainlocationlatitude = $_POST['mainlocationlatitude'];
      $mainlocationlongitude = $_POST['mainlocationlongitude'];

      //old data
      $resultOldApp =  $functionClass->selectData('*','main_location_app',"WHERE main_location_app_id = '$mainlocation_app_id'");
      $namepicOld = $resultOldApp['main_location_app_pic'];

      //#code mange file input
     if(!empty( $_FILES['mainlocation_pic']['name'])){ //has pic file
        $namepicNew = $_FILES['mainlocation_pic']['name'];
        $file_ext_pic = substr($namepicNew, strripos($namepicNew, '.')); // get file name
        $namepicNew =   "mpoi".$mainlocation_app_id. $file_ext_pic;
        //unlink old files
        unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namepicOld");
        move_uploaded_file($_FILES['mainlocation_pic']['tmp_name'], 'files/file_app/'."$app_id".'/'.'location'.'/' . $namepicNew) or die ("error_file_splash");
        //update data
        $isUpdate= $functionClass->updateData('main_location_app',"main_location_app_name='$mainlocationname',main_location_app_latitude='$mainlocationlatitude',main_location_app_longitude='$mainlocationlongitude',main_location_app_pic='$namepicNew'","WHERE main_location_app_id='$mainlocation_app_id'");

         echo $isUpdate;
      }
      else{ //don't have file
        $isUpdate= $functionClass->updateData('main_location_app',"main_location_app_name='$mainlocationname',main_location_app_latitude='$mainlocationlatitude',main_location_app_longitude='$mainlocationlongitude'","WHERE main_location_app_id='$mainlocation_app_id'");
         echo $isUpdate;
      }


    }
    break;


    case 'form_editlocation':
    if($_SERVER['REQUEST_METHOD']=='POST'){
      $functionClass = new FunctionClass();
      $app_id = $_POST['app_id'];
      $mainlocationapp_id = $_POST['mainlocationapp_id'];
      $location_app_id = $_POST['location_app_id'];
      $locationname = $_POST['locationname'];
      $locationname = str_replace("'", '"', $locationname);
      $locationdescription = $_POST['locationdescription'];
      $locationdescription = str_replace("'", '"', $locationdescription);
      $locationlatitude = $_POST['locationlatitude'];
      $locationlongitude = $_POST['locationlongitude'];
      //old data
      $resultOldApp =  $functionClass->selectData('*','location_app',"WHERE location_app_id = '$location_app_id'");
      $namepicOld = $resultOldApp['location_app_pic'];
      $nameMorePicOld =  $resultOldApp['location_app_more_pic'];

      //#code mange file input
     if(!empty( $_FILES['location_pic']['name'])&&!empty($_FILES["location_more_pic"]["name"])){ //has pic file AND has more pic file
       //** single image location **//
        $namepicNew = $_FILES['location_pic']['name'];
        $file_ext_pic = substr($namepicNew, strripos($namepicNew, '.')); // get file name
        $namepicNew =   "poi".$location_app_id. $file_ext_pic;
        //unlink old files
        unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namepicOld");
        move_uploaded_file($_FILES['location_pic']['tmp_name'], 'files/file_app/'."$app_id".'/'.'location'.'/' . $namepicNew) or die ("error_file_splash");
        //update data image location
        $isUpdate1= $functionClass->updateData('location_app',"main_location_app_id=$mainlocationapp_id,location_app_name='$locationname',location_app_latitude='$locationlatitude',location_app_longitude='$locationlongitude',location_app_detail='$locationdescription',location_app_pic='$namepicNew'","WHERE location_app_id='$location_app_id'");
         //***more image location ***/
         $namemorelocationpic = $_FILES["location_more_pic"]["name"];
         //unlink old file
         if(!empty($nameMorePicOld)){
         $arrLocationMorepicOld = explode(",", $nameMorePicOld);
         for($i=0;$i<count($arrLocationMorepicOld);$i++){
           $namepic = $arrLocationMorepicOld[$i];
           $removeMoreImg = unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namepic");
         }
       }
         //update data more image location
         $strmorelocationpic="";
         for($i=0;$i<count($namemorelocationpic);$i++){
           //poi1_1
           $oldname = $namemorelocationpic[$i];
           $file_ext_morelo = substr($oldname, strripos($oldname, '.')); // get file name
           $newname =  "poi".$location_app_id."_". ($i+1) .$file_ext_morelo;
           if ($i < count($namemorelocationpic) - 1) {
             $strmorelocationpic.=$newname."," ;
           }
           else{
           $strmorelocationpic.=$newname;
         }
         ///
         move_uploaded_file($_FILES['location_more_pic']['tmp_name'][$i], 'files/file_app/'."$app_id".'/'.'location'.'/'. $newname) or die ("error_file_icon");
         }
         $isUpdate2 = $functionClass->updateData('location_app',"location_app_more_pic='$strmorelocationpic'","WHERE location_app_id='$location_app_id'");
         echo $isUpdate1&&$isUpdate2;
      }
      else if(!empty( $_FILES['location_pic']['name'])){
        //** single image location **//
         $namepicNew = $_FILES['location_pic']['name'];
         $file_ext_pic = substr($namepicNew, strripos($namepicNew, '.')); // get file name
         $namepicNew =   "poi".$location_app_id. $file_ext_pic;
         //unlink old files
         unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namepicOld");
         move_uploaded_file($_FILES['location_pic']['tmp_name'], 'files/file_app/'."$app_id".'/'.'location'.'/' . $namepicNew) or die ("error_file_splash");
         //update data image location
         $isUpdate= $functionClass->updateData('location_app',"main_location_app_id=$mainlocationapp_id,location_app_name='$locationname',location_app_latitude='$locationlatitude',location_app_longitude='$locationlongitude',location_app_detail='$locationdescription',location_app_pic='$namepicNew'","WHERE location_app_id='$location_app_id'");
        echo $isUpdate;
      }
      else if(!empty($_FILES["location_more_pic"]["name"])){
        $isUpdate1 = $functionClass->updateData('location_app',"main_location_app_id=$mainlocationapp_id,location_app_name='$locationname',location_app_latitude='$locationlatitude',location_app_longitude='$locationlongitude',location_app_detail='$locationdescription'","WHERE location_app_id='$location_app_id'");
        //***more image location ***/
        $namemorelocationpic = $_FILES["location_more_pic"]["name"];
        //unlink old file
        if(!empty($nameMorePicOld)){
        $arrLocationMorepicOld = explode(",", $nameMorePicOld);
        for($i=0;$i<count($arrLocationMorepicOld);$i++){
          $namepic = $arrLocationMorepicOld[$i];
          $removeMoreImg = unlink('files/file_app/'."$app_id".'/'.'location'.'/'. "$namepic");
        }
      }
        //update data more image location
        $strmorelocationpic="";
        for($i=0;$i<count($namemorelocationpic);$i++){
          //poi1_1
          $oldname = $namemorelocationpic[$i];
          $file_ext_morelo = substr($oldname, strripos($oldname, '.')); // get file name
          $newname =  "poi".$location_app_id."_". ($i+1) .$file_ext_morelo;
          if ($i < count($namemorelocationpic) - 1) {
            $strmorelocationpic.=$newname."," ;
          }
          else{
          $strmorelocationpic.=$newname;
        }
        ///
        move_uploaded_file($_FILES['location_more_pic']['tmp_name'][$i], 'files/file_app/'."$app_id".'/'.'location'.'/'. $newname) or die ("error_file_icon");
        }
        $isUpdate2 = $functionClass->updateData('location_app',"location_app_more_pic='$strmorelocationpic'","WHERE location_app_id='$location_app_id'");
        echo $isUpdate1&&$isUpdate2;
      }
      else{ //don't have file
        $isUpdate = $functionClass->updateData('location_app',"main_location_app_id=$mainlocationapp_id,location_app_name='$locationname',location_app_latitude='$locationlatitude',location_app_longitude='$locationlongitude',location_app_detail='$locationdescription'","WHERE location_app_id='$location_app_id'");
        echo $isUpdate;
      }
      //echo $mainlocationapp_id;

    }
    break;

    case 'form_createquestion':
    $functionClass = new FunctionClass();
    $location_app_id = $_POST['location_app_id'];
    $type_question = $_POST['type_question'];
    $qustiondescription = $_POST['qustiondescription'];
    $qustiondescription = str_replace("'", '"', $qustiondescription);
    $choice_str = $_POST['choice_str'];
    $choice_str = str_replace("'", '"', $choice_str);
    $answer_text =  $_POST['answer_text'];
    $answer_text = str_replace("'", '"', $answer_text);

    switch ($type_question) {
     case '1':
      // echo $location_app_id." ".$type_question." ".$qustiondescription." ".$choice_str." ".$answer_text;
     $last_question_id = $functionClass->insertData('question_app','location_app_id,question_app_type,question_app_text,question_app_choice,question_app_answer',"'$location_app_id','$type_question','$qustiondescription','$choice_str','$answer_text'");
     echo $last_question_id;
     break;

     case '2':
     $last_question_id = $functionClass->insertData('question_app','location_app_id,question_app_type,question_app_text,question_app_choice,question_app_answer',"'$location_app_id','$type_question','$qustiondescription','$choice_str','$answer_text'");
     echo $last_question_id;
     break;
     case '3':
     $last_question_id = $functionClass->insertData('question_app','location_app_id,question_app_type,question_app_text,question_app_choice,question_app_answer',"'$location_app_id','$type_question','$qustiondescription','$choice_str','$answer_text'");
     echo $last_question_id;
     break;

     case '4':
     $last_question_id = $functionClass->insertData('question_app','location_app_id,question_app_type,question_app_text,question_app_choice,question_app_answer',"'$location_app_id','$type_question','$qustiondescription','$choice_str','$answer_text'");
     echo $last_question_id;
     break;

     default:
         # code...
     break;
   }

   break;

   case 'form_editquestion':
   $functionClass = new FunctionClass();
   $location_app_id = $_POST['location_app_id'];
   $question_app_id = $_POST['question_app_id'];
   $type_question = $_POST['type_question'];
   $qustiondescription = $_POST['qustiondescription'];
   $qustiondescription = str_replace("'", '"', $qustiondescription);
   $choice_str = $_POST['choice_str'];
   $choice_str = str_replace("'", '"', $choice_str);
   $answer_text =  $_POST['answer_text'];
   $answer_text = str_replace("'", '"', $answer_text);

    $isUpdate = $functionClass->updateData('question_app',"location_app_id=$location_app_id,question_app_type=$type_question,question_app_text='$qustiondescription',question_app_choice='$choice_str',question_app_answer='$answer_text'","WHERE question_app_id='$question_app_id'");
    echo $isUpdate;
  break;

 case 'get_mainloation':
     echo "2";
     break;

   default:
    # code...
   break;
 }
 ?>
