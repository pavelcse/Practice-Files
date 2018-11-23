<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "insert_image_tools";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM tbl_images WHERE active = 1 ORDER BY image_id DESC";
	$result = $conn->query($sql);

    //print_r(json_encode($getData,JSON_HEX_APOS));
	$data = '';
    $data .=  '<div class="col">' ; 
    if ($result) {
            while ($getData = $result->fetch_assoc()) {
                //$data .= '<li>'.$getData['body'].'</li>';
                $data .= '<img width="200px" height="200px" class="rounded float-left p-2 m-2" src="check/'.$getData['image_name'].'" alt="">';
                //$data .= 'pavel';
            }
    } else {
            $data .= '<p> No Data Found..!</p>';
    }

    $data .= '</div>';
    echo $data;
