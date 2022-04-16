<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <title>Admin-Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <style></style>
</head>
<body class="bg">

<?php
    $username = "admin";
    $password = "Resolve";

    session_start();
    if(isset($_SESSION['username'])){
    ?>
    <p class="Resolve">Resolve</p>
    <a href="logout.php"><button class="out">LogOut</button><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/><path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg></a>
    <p style="position:absolute;right: 165px;top: 44px;font-weight:800;font-size: larger;text-decoration: underline;cursor: pointer;">Logout</p>
    <p class="atext" style="top:120px;left:150px;color:lawngreen">You have successfully logged in!</p>
    <p class="atext" style="top:270px;left:300px;font-size: 120px;">Welcome Admin :)</p>
    <a href="display.php"><buton class="record">View Complaints</buton></a>

    <?php 
}
else{
        if($_POST['username']==$username && $_POST['password']==$password){
            $_SESSION['username']=$username;
            ?>
            <p class="Resolve">Resolve</p>
            <a href="logout.php"><button class="out">LogOut</button><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"/><path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/></svg></a>
            <p style="position:absolute;right: 165px;top: 44px;font-weight:800;font-size: larger;text-decoration: underline;cursor: pointer;">Logout</p>
            <p class="atext" style="top:120px;left:150px;color:lawngreen">You have successfully logged in!</p>
            <p class="atext" style="top:270px;left:300px;font-size: 120px;">Welcome Admin :)</p>
            <a href="display.php"><buton class="record">View Complaints</buton></a>
    <?php
        }
        else{
                ?>
                <script> 
					alert('The Username/Password is incorrect :( '); 
			    </script> 
				
                <?php
                    header("Location: login.html", true, 301);
                    exit();
        }
}
?>
</body>
</html>