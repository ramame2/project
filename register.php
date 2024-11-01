<?php
$servername = "sql211.infinityfree.com";
$username = "if0_37327165";
$password = "edKK6Cnyx66e";
$dbname = "if0_37327165_rama";

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if username already exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $userExists = $stmt->fetchColumn();

        if ($userExists) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            echo "Registration successful!";
        }
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <link rel="stylesheet" href="me3.css">
    <style>
        /* Existing CSS styles */
        body { /* styles */ }
        .container { /* styles */ }
        input, button { /* styles */ }
        button:hover { /* styles */ }
        a { /* styles */ }
        h1 { /* styles */ }
        @media screen and (max-width: 500px) { /* styles */ }

        /* New style for the message box */
        #message {
            margin-top: 15px;
            padding: 10px;
            border-radius: 4px;
            display: none; /* Hidden by default */
        }
        #message.success { background-color: #28a745; color: white; }
        #message.error { background-color: #dc3545; color: white; }
    </style>
</head>
<body>
<div class="container">
    <h1>Registreren</h1>
    <form id="registrationForm">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>

        <button type="submit">Registreren</button>
    </form>
    <div id="message"></div> <!-- Message container -->
    <p>Al een account? <a href="login.php">Log hier in</a>.</p>
</div>

<script>
    document.getElementById('registrationForm').addEventListener('submit', async function(event) {
        event.preventDefault(); // Prevent form from submitting the traditional way

        const formData = new FormData(this);
        const messageBox = document.getElementById('message');

        try {
            const response = await fetch('register.php', {
                method: 'POST',
                body: formData
            });

            const result = await response.json();
            messageBox.style.display = 'block'; // Show message box

            if (result.status === 'success') {
                messageBox.className = 'success';
            } else {
                messageBox.className = 'error';
            }
            messageBox.textContent = result.message;

        } catch (error) {
            messageBox.className = 'error';
            messageBox.style.display = 'block';
            messageBox.textContent = 'Er ging iets mis. Probeer het opnieuw.';
        }
    });
</script>
</body>
</html>
