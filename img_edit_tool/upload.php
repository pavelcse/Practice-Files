<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "image_tools";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$croppedImage = $_FILES['croppedImage'];
	$to_be_uploaded = $croppedImage['tmp_name'];

	$new_file = 'temp/'.time().'image.png';

	$id = $_POST['id'];

	//echo $new_file."/".$id;


	$sql = "INSERT INTO tbl_tmp_image (tmp_image_id, tmp_image_name) VALUES ('$id', '$new_file')";

	if ($conn->query($sql) === TRUE) {

		move_uploaded_file($to_be_uploaded, $new_file);

		$sql = "SELECT * FROM tbl_tmp_image WHERE tmp_image_id=$id";

		$data = $conn->query($sql);
		$img = $data->fetch_assoc();
		//print_r($img, );
		print_r(json_encode($img,JSON_HEX_APOS));
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}




