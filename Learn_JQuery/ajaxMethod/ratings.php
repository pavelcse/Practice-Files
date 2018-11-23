<?php
	$ip = $_SERVER['REMOTE_ADDR'];


	$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "rating_db";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

	$query = 'INSERT INTO ratings(product_id,rating,client_ip) VALUES("'.$_GET['id'].'","'.$_GET['r'].'","'.$ip.'")';
	$result = $conn->query($query);
?>