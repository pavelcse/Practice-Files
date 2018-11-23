 <?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "insert_image_tools";

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
	<link rel="stylesheet" href="css/cropper.css">
	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/cropper.js"></script>
	<style>
		/*.cropper-crop{
			display: none;
		}
		.cropper-bg{
			background: none;
		}*/
	</style>
</head>
<body>
	<div class="container bg-light  my-2">

		<div class="row">
			<div class="form-group mt-5 ml-5">
				<label class="form-control-label" for="">Upload Image</label>
				<input type="file" name="userUploadedImage" class="form-control-file" id="userUploadedImage">
			</div>
		</div>
	
		<div class="row">
			<div class="col-8">
				<div class="row mb-5">				
					<div class="col text-center mt-4" style="height: 300px; width: 300px;">
						<img width="300px" height="300px" data-id="" id="image" class="img" src="" alt="Please Select an Image First" onerror="this.style.display='none';">
					</div>
				</div>

				<div class="row justify-content-center mb-5 button">
					<!-- <button class="btn btn-sm btn-danger mx-2" onclick="remove()">Delete</button> -->
					<button class="btn btn-sm btn-info mx-2" onclick="start()">Start Editing</button>
					<button class="btn btn-sm btn-info mx-2" onclick="rotate()">Rotate 90 &deg;</button>
					<button class="btn btn-sm btn-info mx-2" onclick="crop()">Crop & Preview</button>
					<button onclick="cancel()" class="btn btn-sm btn-info mx-2">Cancel Editing</button>
				
				</div>
			</div>
			<div class="col-4">
				<div class="row">
					<div class="col text-center" id="data"></div>
				</div>
			</div>
		</div>

		<div class="row" id="autostatus">
	        
	    </div>
	</div>
	<!-- Show Images From Database -->
	<script>
		/*$( document ).ready(function() {
			setInterval(function(){
		        $("#autostatus").load("check/loaddata.php").fadeIn("slow");
		    }, 1000);
		});*/

		// Get all data when page open...........
		$( document ).ready(function() {
			$.ajax('check/loaddata.php', {
			    method: "GET",
			    data: '',
			    processData: false,
			    contentType: false,
			    success: function(data){
			    	$("#autostatus").html(data);
	            }
			});
		});

		// After Insert a New Data...........
		function load_div(){
			$.ajax('check/loaddata.php', {
			    method: "GET",
			    data: '',
			    processData: false,
			    contentType: false,
			    success: function(data){
			    	$("#autostatus").html(data);
	            }
			});
		}
	</script>
	<!-- End: Show Images From Database -->

	<!-- image preview -->
	<script>
		$('.button').hide();
		$('#remove').hide();

		function readURL(input) {
		  if (input.files && input.files[0]) {
		    var reader = new FileReader();

		    reader.onload = function(e) {
		      $('#image').attr('src', e.target.result);
		      $('#image').hide();
		      $('#image').fadeIn(650);
		    }
		    reader.readAsDataURL(input.files[0]);
		  }
		}
		$("#userUploadedImage").change(function() {
		  readURL(this);
		  $('.button').show();
		  $('#remove').show();
		});
    </script>
    <!-- End image preview -->

	<!-- Image Editing Option -->
	<script>
		// For start Cropping........
		function start(){
			$('#image').cropper()
			$('#remove').hide();
		}

		// For Rotation........
		function rotate(){
			$('#image').cropper('rotate', 90)
			$('#remove').hide();
		}

		// For Crop and Preview........
		function crop(){

			$('#image').cropper('getCroppedCanvas').toBlob(function (blob) {
				$('#remove').hide();
				const formData = new FormData();

				  formData.append('croppedImage', blob);

				  $.ajax('check/preview.php', {
				    method: "POST",
				    data: formData,
				    processData: false,
				    contentType: false,
				    success: function(data){

	                    $("#data").html('<img id="img" width="250px" height="200px" src="check/'+data+'"><br><button onclick="upload()" class="btn btn-sm btn-info mt-3">Confirm & Update</button>');
	                },
				    error() {
				      alert('Upload error');
				    },
				  });
			});
		}

		// For Upload to Database........
		function upload(){
			$('#image').cropper('getCroppedCanvas').toBlob(function (blob) {

				const formData = new FormData();

				  formData.append('croppedImage', blob);
				  
				  $.ajax('check/insert.php', {
				    method: "POST",
				    data: formData,
				    processData: false,
				    contentType: false,
				    success: function(data){

						$('#image').cropper('destroy');
						$('#data').hide();
						//$('#data').val('');
						$('#image').attr('src', '');
						$('#userUploadedImage').val('');

						load_div();
						$('.button').hide();

	                },
				    error() {
				      alert('Upload error');
				    },
				  });
			});
		}

		// Set all empty........
		function cancel(){

			$('#image').cropper('destroy');
			$('#data').hide();
			$('#image').attr('src', '');
			$('#userUploadedImage').val('');
			$('.button').hide();
			location.reload();
		}

		function remove(){
			$('#image').attr('src', '');
			$('#userUploadedImage').val('');
			$('.button').hide();
			location.reload();
		}

		$('#image').cropper('destroy');
	</script>
	<!--End: Image Editing Option -->
	
</body>
</html>