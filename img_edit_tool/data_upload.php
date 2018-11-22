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

	$new_file = 'upload/'.time().'image.png';
	$id = $_POST['id'];


	$sql = "UPDATE tbl_image SET image_name = '$new_file' WHERE image_id = '$id'";

	if ($conn->query($sql) === TRUE) {

	    $file = move_uploaded_file($to_be_uploaded, $new_file);

	    $del_sql = "DELETE FROM tbl_tmp_image WHERE tmp_image_id = '$id'";
	    $conn->query($del_sql);

		echo "Image Updated Successfully.";

	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}

?> 