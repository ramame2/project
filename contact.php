<?php
$servername = "sql211.infinityfree.com";
$username = "if0_37327165";
$password = "edKK6Cnyx66e";
$dbname = "if0_37327165_rama";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "INSERT INTO `contacts` (`id`, `name`, `phoneNumber`) VALUES (NULL, \'Rama Mari\', \'068-5366652\');";
$sql = "SELECT name , phoneNumber FROM Contacts";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="contactt.css">
    
</head>
<body>
    <header> 
        <div class="Rama">
            
            <h1>Rama Mari</h1>
        
        
        
        </div>
    </header>
        <div class="container">

<h2>Contact</h2>
<div class="Contact">
<h3>Naam</h3>
<input class="naam" type="text">
<h4>E-mail</h4>
<input  class="email" type="email">
<h5>Birecht</h5>
<input class="birecht" type="text">
<br><br>
<input class="submit" type="submit" value="Verzenden" >
</div>
        </div>
</body>

</html>
</php>