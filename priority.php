<?php	
	require_once "config.php";
	$data = "SELECT `Priority` from `complaints` where `complaints`.`Cid` = $row['Cid']";
	$query = mysqli_query($conn, $data);

	$result = shell_exec('python C:/Only Kunj/Projects/Priority/main.py' . escapeshellarg(json_encode($data)));
	$resultData = json_decode($result, true);
	var_dump($resultData);
	$priority= "INSERT INTO `complaints`(`Priority`) WHERE `complaints`.`Cid` = $row['Cid']";
	$query = mysqli_query($conn, $priority);
?>
