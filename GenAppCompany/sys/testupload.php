<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
	$check = pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION);
	echo $check;
	if($check == "rar") {
		echo "Upload file successfully.";
		$uploadOk = 1;
	} else {
		echo "File is not apk file.";
		$uploadOk = 0;
	}
}
?>
