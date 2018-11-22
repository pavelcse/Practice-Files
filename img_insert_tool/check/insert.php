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

	$new_file = 'upload/'.time().'image.png';

	$sql = "INSERT INTO tbl_images (image_name) VALUES ('$new_file')";

	if ($conn->query($sql) === TRUE) {

		move_uploaded_file($to_be_uploaded, $new_file);
		return true;
		    
		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

?> 