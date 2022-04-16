<?php 

$server= "localhost";
$username= "root";
$password= "";
$dbname= "resolve";
	
$conn = mysqli_connect($server, $username, $password, $dbname);

	if($conn){
	?>
		<script>
			alert('COMPLAINT RESOLVED- record deleted successfully !!!');
		</script>
	<?php
	}
	else{
		die("No Connection".mysqli_connect_error());
	}
	
	$id= $_GET['id'];
	$movequery= "INSERT INTO `resolved` SELECT * FROM `complaints` WHERE `complaints`.`Cid` = $id";
	$query = mysqli_query($conn, $movequery);
	$deletequery= "DELETE FROM `complaints` WHERE `complaints`.`Cid` = $id";
	$query = mysqli_query($conn, $deletequery);
	
	header('location:display.php');
	
?>