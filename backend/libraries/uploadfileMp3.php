<?php 
	$target_dir = "../assets/tracks/";
	$target_file = $target_dir.basename($_FILES["fileuploadMp3"]["name"]);
	$uploadOk = 1;
	$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$messsage="Start:";
	// Check if file already exists
	if (file_exists($target_file)) 
	{
	    $messsage= "Tệp đã tồn tại rồi";
	    $uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) 
	{
	    $messsage=$messsage."Tệp chưa được upload.";
	// if everything is ok, try to upload file
	} else {
	    if (move_uploaded_file($_FILES["fileuploadMp3"]["tmp_name"], $target_file)) {
	        $messsage='tracks/'.basename($_FILES["fileuploadMp3"]["name"]);
	    } else {
	        $messsage=$messsage."Tệp upload lỗi";
	    }
	}
	echo $messsage;
 ?>