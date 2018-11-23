<!DOCTYPE html>
<html>
    <head>
        <title>jQuery ajax method tutorials</title>
        <link rel="stylesheet" href="style.css"
        type="text/css" />
        <script src="jquery_latest.js" type="text/javascript"></script>
        <script src="script.js" type="text/javascript"></script>
    </head>
    
    <body>
		<div id="content">
		<?php

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "rating_db";

		$conn = new mysqli($servername, $username, $password, $dbname);

		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$query = 'SELECT * FROM product';
		$result = $conn->query($query);
		while($row = $result->fetch_array()){

			$count_query = 'SELECT * FROM ratings WHERE product_id ='.$row['product_id'];
			$count_result = $conn->query($count_query);
			$totalRating = $count_result->num_rows;
			$sql = 'SELECT AVG(rating) FROM ratings WHERE product_id ='.$row['product_id'];
			$results = $conn->query($sql);
			
			while($rows = $results->fetch_array()){?>
		<div class="header">
		   <h3 class="title"><?php echo $row['title'];?></h3>
		   <p class="p_id"><?php echo '[Product Id : '.$row['product_id'].']';?></p>
		</div>
		   <p><?php echo $row['product_details'];?></p>
		   <div class="ratings">
			 <a href="#">1</a>
			 <a href="#">2</a>
			 <a href="#">3</a>
			 <a href="#">4</a>
			 <a href="#">5</a>
		   </div>
		   <span class="h_id"><?php echo $row['product_id'];?></span>
		   <div class="avg_rate">
			<p>Average Rating : <?php echo floor($rows['AVG(rating)']).' (Total rating given '.$totalRating.')';?></p>
			
		   </div>
		   <?php }?>
		<?php }?>
		</div>
	</body>
</html>