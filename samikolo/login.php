<?php
require_once "pdo.php";
session_start();
if ( isset($_POST['email']) 
     && isset($_POST['password'])) {
	
	//this way is vulnerable replace like below
	
	
	//get the typed email and password
	
	$typed_email = $_POST['email'];
	$typed_password = $_POST['password']; 	
	
	
    
	$sql = "SELECT * FROM users WHERE email = '$typed_email' AND password= '$typed_password'";
	
	//just for demonstration - delete
	echo("<pre>\n".$sql."\n</pre>\n");
	$stmt = $pdo->query($sql);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	print_r($rows);
	
	
	
	/*
	// this uses prepared statements so is not vulnerable to injection
	$sql = "SELECT * FROM users WHERE email = :email AND password=:password";
    $stmt = $pdo->prepare($sql);
	$stmt->execute(['email' => $_POST['email'], 'password' => $_POST['password']]);
	$user = $stmt->fetch(PDO::FETCH_ASSOC);
	print_r($user);
	*/
	if($user){
		
		$_SESSION["user"] = $user["user_id"];
		//just for demonstration - delete
		//print_r($_SESSION);
		echo session_id();
		//just for demonstration - delete
		//$myLoc = "member.php?user=$user[user_id]";
		header('Location: member.php');
	}
	else{
		echo "You must enter a correct email and password";
	}
}
?>


<!DOCTYPE html>
<html lang="en-GB">
<head>
    <meta charset="UTF-8">
    <title>Login to the Members Area</title>
    <link rel="stylesheet" href="stylesheet.css">
    
</head>
<body>
	    <header>
        <img src="images/Logo.jpg" alt="Samikolo Sk Logo">
        <nav>
            <a href="call_index.php">Homepage</a>
            <a href="about_me.php">About Me</a>
            <a href="contactus.php">Contact Us</a>
            <a href="shopping.php">Shop</a>
            <a href="recommendation.php">Recommendations</a>
            <a href="media.php">Media</a>
            <a href="member.php">Member</a>
        </nav>
    </header>
    
	<p>Login</p>
	<form method="post">
	<p>Email:
	<input type="text" name="email"></p>
	<p>Password:
	<input type="password" name="password"></p>
	<p><input type="submit" value="Login"/></p>

</body>
</html>