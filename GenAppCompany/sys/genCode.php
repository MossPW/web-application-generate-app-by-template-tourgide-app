<?php
ini_set('max_execution_time', 300);//8 second

$appID = $_GET['app_id'];
$gen = new Gen();

//$gen->createJava('56');
//echo '<center><img src="files/assets/loader.gif"></center>';
$gen->genApp($appID);

echo '<script type="text/javascript"> window.alert("success of generate code!"); window.location.href="admin_index.php?page=admindashboard";</script>';
  //    href="admin_index.php?page=download_file_android&app_id='.$appID.'";

class Gen
{
        //run all function for Generate Code
    function genApp($app_id)
    {
        $this->copyTemplateApp($app_id);
        $this->copyAssetsApp($app_id);
        $this->copyAssetsLocationApp($app_id);
        $this->createStringXML($app_id);
        $this->createJava($app_id);
        $this->zipFile($app_id);
    }
    //Copy file template from original template for destination path
    function copyTemplateApp($app_id)
    {
        $functionClass   = new FunctionClass();
        $objApp          = $functionClass->selectData('*', 'app', "WHERE app_id = '$app_id'");
        $appNameEn       = $objApp['app_name_en'];
        $pathSource      = "files/assets/TemplateApp";
        $pathDestination = "files/file_app/" . $app_id . "/file_android/" . $appNameEn;
        if ($this->copyr($pathSource, $pathDestination) != true) {
            alert("Error Copy TemplateApp");
        }
    }
    //Copy assets file from app
    function copyAssetsApp($app_id)
    {
        $functionClass   = new FunctionClass();
        $objApp          = $functionClass->selectData('*', 'app', "WHERE app_id = '$app_id'");
        $appNameEn       = $objApp['app_name_en'];
        $pathSource      = "files/file_app/" . $app_id . "/app";
        $pathDestination = "files/file_app/" . $app_id . "/file_android/" . $appNameEn . "/app/src/main/res/drawable-xhdpi";
        if ($this->copyr($pathSource, $pathDestination) != true) {
            alert("Error Copy AssetsApp");
        }
    }
    function copyAssetsLocationApp($app_id)
    {
        $functionClass   = new FunctionClass();
        $objApp          = $functionClass->selectData('*', 'app', "WHERE app_id = '$app_id'");
        $appNameEn       = $objApp['app_name_en'];
        $pathSource      = "files/file_app/" . $app_id . "/location";
        $pathDestination = "files/file_app/" . $app_id . "/file_android/" . $appNameEn . "/app/src/main/res/drawable-xhdpi";
        if ($this->copyr($pathSource, $pathDestination) != true) {
            alert("Error Copy AssetsApp");
        }
    }
    function copyr($source, $dest)
    {
        // Check for symlinks
        if (is_link($source)) {
            return symlink(readlink($source), $dest);
        }

        // Simple copy for a file
        if (is_file($source)) {
            return copy($source, $dest);
        }

        // Make destination directory
        if (!is_dir($dest)) {
            mkdir($dest);
        }

        // Loop through the folder
        $dir = dir($source);
        while (false !== $entry = $dir->read()) {
            // Skip pointers
            if ($entry == '.' || $entry == '..') {
                continue;
            }

            // Deep copy directories
            $this->copyr("$source/$entry", "$dest/$entry");
        }

        // Clean up
        $dir->close();
        return true;
    }
    //Generate Code Java
    function getStringArrMainPoi($app_id)
    {
        $functionClass = new FunctionClass();
        $strMainPoi    = "";
        $strMainPoiAdd = "";
        $arrMainPoi    = $functionClass->selectDataArr('*', 'main_location_app', "WHERE app_id = '$app_id'");
        if (!empty($arrMainPoi)) {
            foreach ($arrMainPoi as $value) {
                $id   = $value['main_location_app_id'];
                $name = $value['main_location_app_name'];
                $lat  = $value['main_location_app_latitude'];
                $long = $value['main_location_app_longitude'];

                $strMainPoi .= 'MainPOI mMainPOI' . $id . ' = new MainPOI(' . $id . ',"' . $name . '",' . $lat . ',' . $long . ');' . '
                                ';
                $strMainPoiAdd .= 'mMainPoiList.add(mMainPOI' . $id . ');
                                ';
            }
            $strMainPoi .= ' ' . $strMainPoiAdd . ' ';
        }
        return $strMainPoi;
    }
    function getStringArrLocation($app_id)
    {
        $functionClass  = new FunctionClass();
        $arrLocation    = $functionClass->selectDataArr('*', 'location_app', "WHERE app_id = '$app_id'");
        $strLocation    = "";
        $strLocationAdd = "";
        if (!empty($arrLocation)) {
            foreach ($arrLocation as $value) {
                $locationId     = $value['location_app_id'];
                $mainLocationId = $value['main_location_app_id'];//"1";
                $name           = $value['location_app_name'];
                $name           = $this->replaceSensitiveData($name); //replace sensitive data "" to ''
                $latitude       = $value['location_app_latitude'];
                $longitude      = $value['location_app_longitude'];
                $detail         = $value['location_app_detail'];
                $detail         = $this->replaceSensitiveData($detail); //replace sensitive data "" to ''

                $strLocation .= 'AugmentedPOI mPoi' . $locationId . ' = new AugmentedPOI(' . $locationId . ',' . $mainLocationId . ',"' . $name . '",' . $latitude . ', ' . $longitude . ',"' . $detail . '",question_poi' . $locationId . ');
                                ';

                $strLocationAdd .= 'mPoiList.add(mPoi' . $locationId . ');
                                ';
            }
        }
        $strLocation .= ' ' . $strLocationAdd . ' ';
        return $strLocation;
    }
    function getStringQuestion($app_id)
    {
        $functionClass = new FunctionClass();
        $arrLocation   = $functionClass->selectDataArr('*', 'location_app', "WHERE app_id = '$app_id'");

        $strQuestionAll = ""; //all question for location
        if (!empty($arrLocation)) {
            foreach ($arrLocation as $valueLocation) {
                $strQuestionFirst = ""; //defind object refer
                $strQuestionNew   = ""; //new object question multiple data
                $strQuestionAdd   = ""; //add object to list
                //***//
                $id_location      = $valueLocation['location_app_id'];
                $arrQuestion      = $functionClass->selectDataArr('*', '	question_app', "WHERE location_app_id = '$id_location'");
                $strQuestionFirst .= 'SetQuestion question_poi' . $id_location . ' = new SetQuestion();
                 ';
                $strQuestionAll .= $strQuestionFirst . " ";
                if (!empty($arrQuestion)) {
                    foreach ($arrQuestion as $valueQuestion) {
                        $id_question     = $valueQuestion['question_app_id'];
                        $type_question   = $valueQuestion['question_app_type'];
                        $text_question   = $valueQuestion['question_app_text'];
                        $text_question   = $this->replaceSensitiveData($text_question); //replace sensitive data "" to ''
                        $choice_question = $valueQuestion['question_app_choice'];
                        $choice_question = $this->replaceSensitiveData($choice_question); //
                        $answer_question = $valueQuestion['question_app_answer'];
                        $answer_question = $this->replaceSensitiveData($answer_question); //
                        $strQuestionNew .= 'QuestionLibrary q' . $id_question . '_poi' . $id_location . ' = new QuestionLibrary(' . $type_question . ',"' . $text_question . '",new String[] {' . $this->getStringFromStringArr($choice_question) . '},new String[] {' . $this->getStringFromStringArr($answer_question) . '});
                        ';
                        $strQuestionAdd .= 'question_poi' . $id_location . '.addQuestion(q' . $id_question . '_poi' . $id_location . ');
                         ';
                    }

                    $strQuestionAll .= $strQuestionNew . " ";
                    $strQuestionAll .= "  " . $strQuestionAdd . " ";
                }
            }
        }
        return $strQuestionAll;

    }
    function replaceSensitiveData($data)
    {
        return preg_replace("/\r|\n/", "", preg_replace('/s+/', ' ', str_replace('"', "'", $data)));

    }
    function getStringFromStringArr($strData)
    {
        $arrString  = explode("_", $strData);
        $strProcess = "";
        if (count($arrString) <= 1) {
            $strProcess = '"' . $arrString[0] . '"';
        } else {
            for ($i = 0; $i < count($arrString); $i++) {
                $strProcess .= '"' . $arrString[$i] . '"';
                if ($i < count($arrString) - 1) {
                    $strProcess .= ',';
                }
            }
        }
        return $strProcess;
    }
    //Generate XML File
    function createStringXML($app_id)
    {
        $functionClass = new FunctionClass();
        $objApp        = $functionClass->selectData('*', 'app', "WHERE app_id = '$app_id'");
        $appNameTh     = $objApp['app_name_th'];
        $appNameEn     = $objApp['app_name_en'];
        $path          = 'files/file_app/' . $app_id . '/file_android/' . $appNameEn . '/app/src/main/res/values/strings.xml';
        $stringXml     = '<?xml version="1.0" encoding="UTF-8"?>

                          <resources>

                          <string name="app_name">' . $appNameTh . '</string>

                          <string name="app_id">com.tourguide.example.' . $appNameEn . '</string>

                          <string name="hello_world">Hello world!</string>

                          <string name="menu_settings">Settings</string>

                          <string name="title_activity_main">MainActivity</string>

                          <string name="title_activity_camera_view">CameraViewActivity</string>

                          </resources>';
        //echo $stringXml;
        return file_put_contents($path, $stringXml) or die("Fail");
    }
    //Generate Java file
    function createJava($app_id)
    {
        $functionClass = new FunctionClass();
        $objApp        = $functionClass->selectData('*', 'app', "WHERE app_id = '$app_id'");
        $appNameEn     = $objApp['app_name_en'];
        $pathJava      = 'files/file_app/' . $app_id . '/file_android/' . $appNameEn . '/app/src/main/java/com/tourguide/example/silpakorn/SetLocation.java';

        $stringJava = 'package com.tourguide.example.silpakorn;
		                   import java.util.ArrayList;

                    public class SetLocation {
                       private ArrayList<AugmentedPOI> mPoiList = new ArrayList<>();
                       private ArrayList<MainPOI> mMainPoiList = new ArrayList<>();

                       SetLocation() {

                       //set mainpoi//
                       ' . $this->getStringArrMainPoi($app_id) . '
                       ////

                      //set question//
                      ' . $this->getStringQuestion($app_id) . '
                      ////

                      //set AugmentedPOI//
                      ' . $this->getStringArrLocation($app_id) . '
                      ////
                      }

                      public AugmentedPOI searchPosition(int mId){
                        for (AugmentedPOI objPoi : mPoiList ) {
                          if(objPoi.getPoiId()==mId){
                            return objPoi;
                          }
                        }
                        return null;
                      }

                      public MainPOI searchMainPosition(int mainId){
                        for (MainPOI objMainPoi : mMainPoiList ) {
                          if(objMainPoi.getMainPoiID()==mainId){
                            return objMainPoi;
                          }
                        }
                        return null;
                      }

                      public ArrayList getLocationList(){
                        return mPoiList;
                      }

                      public ArrayList getMainPoiList(){
                        return mMainPoiList;
                      }
                    }';
      //  echo $stringJava;
        return file_put_contents($pathJava, $stringJava) or die("Fail");

    }

    function zipFile($app_id)
    {
        $functionClass = new FunctionClass();
        $objApp        = $functionClass->selectData('*', 'app', "WHERE app_id = '$app_id'");
        $appNameEn     = $objApp['app_name_en'];
        $sourcePath    = 'files/file_app/' . $app_id . '/file_android';
        $rootPath      = realpath($sourcePath);

        // Initialize archive object
        $zip     = new ZipArchive();
        $zipName = 'files/file_app/' . $app_id . '/' . 'file_zip_android' . '/' . $appNameEn . '.zip';
        $zip->open($zipName, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($rootPath), RecursiveIteratorIterator::LEAVES_ONLY);

        foreach ($files as $name => $file) {
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                // Get real and relative path for current file
                $filePath     = $file->getRealPath();
                $relativePath = substr($filePath, strlen($rootPath) + 1);
                // Add current file to archive
                $zip->addFile($filePath, $relativePath);
            }
        }
        // Zip archive will be created only after closing object
        $zip->close();
        //remove file app
      // $functionClass->rrmdir('files/file_app/'."$app_id".'/'.'file_android'.'/'.$appNameEn);

    }

}




?>
