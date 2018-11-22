 <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "image_tools";

	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="cropper.css">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="cropper.js"></script>
	<style>
		.cropper-crop{
			display: none;
		}
		.cropper-bg{
			background: none;
		}
	</style>
</head>
<body>
	<div class="container">
	
		<div class="row">
			<div class="col-8">
				<div class="row">				
					<div class="col text-center mt-4" style="height: 300px; width: 300px;">
						<img width="300px" height="250px" data-id="" id="image" class="img" src="" alt="Please Select an Image First">
					</div>
				</div>

				<div class="row justify-content-center mb-5 button">
					<button class="btn btn-sm btn-info mx-2" onclick="start()">Start Editing</button>
					<button class="btn btn-sm btn-info mx-2" onclick="rotate()">Rotate 90 &deg;</button>
					<button class="btn btn-sm btn-info mx-2" onclick="crop()">Crop & Preview</button>
					<button onclick="cancel()" class="btn btn-sm btn-info mx-2">Cancel Editing</button>
				</div>
			</div>
			<div class="col-4">
				<div class="row mt-4">
					<div class="col text-center" id="data"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<?php 
				$sql = "SELECT * FROM tbl_image";
				$result = $conn->query($sql);
				while ($datas = $result->fetch_assoc()) {				
			?>
	        <div class="col">
	            <img class="image" width="200px" class="rounded float-left" id="<?php echo $datas['image_id']; ?>" src="<?php echo $datas['image_name']; ?>" alt="">
	        </div>
	    	<?php }?>

	    </div>
	</div>

	<script>
		$(document).ready(function(){
	        $('.button').hide();
	        $('.image').click(function(){
	        	$('.button').show();
	        });
    	});
	</script>
	
	<script>
		$('#image').cropper();

		function start(){
			$('#image').cropper()
		}

		function rotate(){
			$('#image').cropper('rotate', 90)
		}

		function crop(){

			$('#image').cropper('getCroppedCanvas').toBlob(function (blob) {
				const formData = new FormData();

				var id = $('#image').attr("data-id");

			  formData.append('croppedImage', blob);
			  formData.append('id', id);

			  //console.log(formData);

			  $.ajax('upload.php', {
			    method: "POST",
			    data: formData,
			    processData: false,
			    contentType: false,
			    success: function(data){
			    	var result = $.parseJSON(data);
			    	//alert(result['tmp_image_name']);

                    $("#data").html('<img id="img" data-id="'+result['tmp_image_id']+'" width="250px" height="200px" src="'+result['tmp_image_name']+'"><br><button onclick="upload()" class="btn btn-sm btn-info mt-3">Confirm & Update</button>');
                },
			    error() {
			      alert('Upload error');
			    },
			  });
			});
		}

		function upload(){
			$('#image').cropper('getCroppedCanvas').toBlob(function (blob) {

				const formData = new FormData();

				var id = $('#img').attr("data-id");
				//alert(id);

				  formData.append('croppedImage', blob);
				  formData.append('id', id);
				  
				  $.ajax('data_upload.php', {
				    method: "POST",
				    data: formData,
				    processData: false,
				    contentType: false,
				    success: function(data){
				    	alert(data);
						location.reload();
	                },
				    error() {
				      alert('Upload error');
				    },
				  });
			});
		}

		function cancel(){

			var id = $('#image').attr("data-id");
				const formData = new FormData();
			  formData.append('id', id);
			  
			  $.ajax('cancel.php', {
			    method: "POST",
			    data: formData,
			    processData: false,
			    contentType: false,
			    success: function(data){
					location.reload();
	            },
			    error() {
			      alert('Upload error');
			    },
			  });
		}

		$('#image').cropper('destroy');
	</script>

	<script>

		$('.image').click(function(){
		  	var img = $(this).attr('src');
		  	var id = $(this).attr('id');

		  	var cng_img = $('.img').attr('src', img);
		  	var cng_id = $('.img').attr('data-id', id);
		});

    </script>

	
</body>
</html>