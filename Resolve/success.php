<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Submission Success</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style></style>
</head>
<body class="bg">
<?php
    $server= "localhost";
	$username= "root";
	$password= "";
	$dbname= "resolve";
	
	$conn = mysqli_connect($server, $username, $password, $dbname);
    
    if(isset($_POST['Name'])){

        $name = $_POST['Name'];
        $adm = $_POST['Adm'];
        $mob = $_POST['Mob'];
        $email = $_POST['Email'];
        $description = $_POST['Desc'];

        $sql = "INSERT INTO `complaints` ( `Name`, `Aid`, `Mob`, `Email`, `Complaint`, `DOF`) VALUES ( '$name', '$adm', '$mob', '$email', '$description', current_timestamp())";
                
        $results = mysqli_query($conn,$sql);


        $result = shell_exec('python C:\xampp\htdocs\Resolve\Priority\main.py'.escapeshellarg(json_encode($description)));
        $resultData = json_decode($result);
        echo "$resultData";
        if($resultData == 1){
            $priority= "UPDATE `complaints` SET `Priority`='Urgent' WHERE Cid =(SELECT MAX(Cid) FROM complaints)";
            $query = mysqli_query($conn, $priority);
        }
        else{
            $priority= "UPDATE `complaints` SET `Priority`='Unknown' WHERE Cid =(SELECT MAX(Cid) FROM complaints)";
            $query = mysqli_query($conn, $priority);
        }
        
        if($results){
        ?>
                <p clas="succ">Form submitted successfully</p>
                <p class="ucc">We have recieved your complain and will see to it being resolved as soon as possible.</p>
        <?php
        }
        else{
            echo "Unable to File your Complaint!!!<br> Please TRY AGAIN!!!" ;
        }
    }

?>
    <a href="home.html"><p class="Resolve">Resolve</p></a>
    <a href="home.html"><button class="Options" style="right: 400px;top: 28px;"></button><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-door-fill" viewBox="0 0 16 16"><path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"/></svg></a>
    <a href="form.html"><button class="Options" style="right: 300px;top: 28px;"></button><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-diff-fill" viewBox="0 0 16 16"><path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM8 6a.5.5 0 0 1 .5.5V8H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V9H6a.5.5 0 0 1 0-1h1.5V6.5A.5.5 0 0 1 8 6zm-2.5 6.5A.5.5 0 0 1 6 12h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z"/></svg></a>
    <a href="about.html"><button class="Options" style="right: 200px;top: 28px;"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-info-square-fill" viewBox="0 0 16 16"><path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.93 4.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM8 5.5a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/></svg></a>
    <a href="login.html"><button class="Options" style="right: 100px;top: 28px;"></button><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/><path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg></a>
    
</body>
</html>

