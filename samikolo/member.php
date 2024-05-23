<?php
require_once "pdo.php";

session_start();

if (isset($_SESSION['user'])) {
    $sql = "SELECT * FROM users WHERE user_id = :user";
    //just for demonstration - delete

    $stmt = $pdo->prepare($sql);
    $stmt->execute(['user' => $_SESSION['user']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);


    $the_user = $user["name"];
} else {
    header('Location: login.php ');
}
?>

<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <title>Members Area</title>
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

        <h1>Welcome <?= $the_user ?></h1>
        <a href="create_user.php">Create a user</a>
        <a href="logout.php"><button type = "button">Log Out</button></a>

    </body>
</html>

