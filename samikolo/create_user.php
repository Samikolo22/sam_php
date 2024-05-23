<?php
require_once "pdo.php";

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
    $sql = "INSERT INTO users (name, email, password) 
              VALUES (:name, :email, :password)";
    echo("<pre>\n" . $sql . "\n</pre>\n");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(
        ':name' => $_POST['name'],
        ':email' => $_POST['email'],
        ':password' => $_POST['password']));
}

if (isset($_POST['delete']) && isset($_POST['user_id'])) {
    $sql = "DELETE FROM users WHERE user_id = :zip";
    echo "<pre>\n$sql\n</pre>\n";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(array(':zip' => $_POST['user_id']));
}

$stmt = $pdo->query("SELECT name, email, password, user_id FROM users");
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en-GB">
    <head>
        <meta charset="UTF-8">
        <title>Create User</title>
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
        <table border="1">
            <?php
            foreach ($rows as $row) {
                echo "<tr><td>";
                echo($row['name']);
                echo("</td><td>");
                echo($row['email']);
                echo("</td><td>");
                echo($row['password']);
                echo("</td><td>");
                echo('<form method="post"><input type="hidden" ');
                echo('name="user_id" value="' . $row['user_id'] . '">' . "\n");
                echo('<input type="submit" value="Del" name="delete">');
                echo("\n</form>\n");
                echo("</td></tr>\n");
            }
            ?>
        </table>
        <!- Should use proper semantic HTML -->
        <p>Add A New User</p>
        <form method="post">
            <p>Name:
                <input type="text" name="name" size="40"></p>
            <p>Email:
                <input type="text" name="email"></p>
            <p>Password:
                <input type="password" name="password"></p>
            <p><input type="submit" value="Add New"/></p>
        </form>

        <a href="logout.php"><button type = "button">Log Out</button></a>
    </body>
