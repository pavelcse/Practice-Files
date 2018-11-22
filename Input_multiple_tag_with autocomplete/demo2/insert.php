<?php
//insert.php

if(isset($_POST["name"]))
{

print_r($_POST["skill"]);die();



 $connect = new PDO("mysql:host=localhost;dbname=testing", "root", "");
 $query = "INSERT INTO programmer(name, skill) VALUES(:name, :skill)";
 $statement = $connect->prepare($query);
 $statement->execute(
  array(
   ':name'  => $_POST["name"],
   ':skill' => $_POST["skill"]
  )
 );
 $result = $statement->fetchAll();
 $output = '';
 if(isset($result))
 {
  $output = '
  <div class="alert alert-success">
   Your data has been successfully saved into System
  </div>
  ';
 }
 echo $output;
}

?>