<?php 
	$target_dir = "../assets/images/alltrack/imgComposer/";
	$target_file = $target_dir.basename($_FILES["fileuploadComposer"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$messsage="Start:";
	// Check if file already exists
	if (file_exists($target_file)) {
	    $messsage= "Tệp đã tồn tại rồi";
	    $uploadOk = 0;
	}
	// Check file size
	if ($_FILES["fileuploadComposer"]["size"] > 500000) {
	    $messsage=$messsage."Tệp quá lớn.";
	    $uploadOk = 0;
	}
	// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    $messsage=$messsage."Chỉ cho phép các tệp JPG, JPEG, PNG & GIF.";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
	    $messsage=$messsage."Tệp chưa được upload.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileuploadComposer"]["tmp_name"], $target_file)) {
	        $messsage='images/alltrack/imgComposer/'.basename($_FILES["fileuploadComposer"]["name"]);
	    } else {
	        $messsage=$messsage."Tệp upload lỗi";
	    }
	}
	echo $messsage;
 ?>