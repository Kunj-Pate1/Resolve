<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "resolve";

        $conn = mysqli_connect($servername,$username,$password,$database);
?>
<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <title>Resolved Complaints</title>
	<?php include 'link.php' ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://use.fontawesome.com/602bbd89d0.js"> </script>
</head>
<body class="bg">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand" href="display.php" >Go Back</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="restable.php">Resolved Complaints <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="urgent.php">Urgent Complaints</a>
      </li>
	</ul>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <a href="logout.php"><button class="btn btn-danger " style="position:absolute;right:2%;top:13%;" >LogOut</button></a>
	</div>
	</nav>
	<table class="table table-hover table-dark">
	<thead>
		<tr>
			<th scope="col" class="tab">Complaint ID</th>
			<th scope="col" class="tab">Name</th>
			<th scope="col" class="tab">Admission No.</th>
			<th scope="col" class="tab">Mobile No.</th>
			<th scope="col" class="tab">Email ID</th>
			<th scope="col" class="tab">Complaint Description</th>
			<th scope="col" class="tab">Date of filing</th>
			<th scope="col" class="tab">Priority</th>
            <th scope="col" class="tab" colspan="2" >Status</th>
			
		</tr>
	</thead>
	<tbody>
		<?php

			$sql = "SELECT * FROM `complaints` WHERE `complaints`.`Priority` = 'Urgent'";
			$result = mysqli_query($conn,$sql);
			$num = mysqli_num_rows($result);

			while($row = mysqli_fetch_array($result)){
		?>
				<tr>
					
					<td scope="row" class="id"><?php echo $row['Cid'] ?></td>
					<td scope="row" class="tab"><?php echo $row['Name'] ?></td>
					<td scope="row" class="tab"><?php echo $row['Aid'] ?></td>
					<td scope="row" class="tab"><?php echo $row['Mob'] ?></td>
					<td scope="row" class="tab"><?php echo $row['Email'] ?></td>
					<td scope="row" class="tab"><?php echo $row['Complaint'] ?></td>
					<td scope="row" class="tab"><?php echo $row['DOF'] ?></td>
					<td scope="row" class="tab"><?php echo $row['Priority'] ?></td>
                    <td class="tab">Pending</td>
					<td class="tab"><a href="resolved.php?id=<?php echo $row['Cid'];?>"><button class= "res" >Resolve</button></a></td>
				</tr>
		<?php	
			}
		?>
	</tbody>
	</table>
</body>
</html>