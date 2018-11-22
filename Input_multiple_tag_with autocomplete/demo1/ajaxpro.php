<?php

     $dbhost = 'localhost';
     $dbuser = 'root';
     $dbpass = '';

	$mysqli = new mysqli($dbhost, $dbuser, $dbpass, 'ajax_tag_autocomplete');
	if(! $mysqli ){
            die('Could not connect: ' . mysqli_error());
         }
         echo 'Connected successfully';
         mysqli_close($mysqli);
	 

	$sql = "SELECT name FROM tags WHERE name LIKE '%".$_GET['query']."%' LIMIT 10";
	$result = $mysqli->query($sql);

	$json = [];
	while($row = $result->fetch_assoc()){
	     $json[] = $row['name'];
	}
	echo json_encode($json);

?>