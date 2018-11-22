<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "image_tools";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}


	$id = $_POST['id'];

	$sql = "DELETE FROM tbl_tmp_image WHERE tmp_image_id = '$id'";

	if ($conn->query($sql) === TRUE) {
		    return true;
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}




