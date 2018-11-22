<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "insert_image_tools";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$croppedImage = $_FILES['croppedImage'];
	$to_be_uploaded = $croppedImage['tmp_name'];

	$new_file = 'temp/'.time().'image.png';

	$sql = "INSERT INTO tbl_tmp_image (tmp_image_name) VALUES ('$new_file')";

	if ($conn->query($sql) === TRUE) {

		move_uploaded_file($to_be_uploaded, $new_file);
		echo $new_file;
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}




