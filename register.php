<?php
$servername = "sql211.infinityfree.com";
$username = "if0_37327165";
$password = "edKK6Cnyx66e";
$dbname = "if0_37327165_rama";
try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'username' and 'password' are set in $_POST
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = trim($_POST['username']); // Sanitize username
        $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT); // Hash and sanitize password

        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);

        // Execute the statement and check for success
        if ($stmt->execute()) {
            echo "Registration successful! You can now log in.";
        } else {
            echo "Error: Could not register the user.";
        }
    } else {
        echo "Please provide both username and password.";
    }
}

?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="me3.css">
    <style>
        body {
            background-color: #121212;
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .container {
            background-color: #1e1e1e;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        input, button {
            display: block;
            width: 100%;
            margin-top: 10px;
            border-radius: 5rem;
        }
        button {
            background-color:cadetblue;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color:dodgerblue;
        }
        a {
            color:cadetblue;
        }
        h1{color: cadetblue;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}

        @media screen and (max-width: 500px) {
            body {
                padding: 1rem;
                height: auto;
            }

            .container {
                padding: 15px;
                box-shadow: none; /* Remove shadow for simpler mobile display */
            }

            h1 {
                font-size: 1.5rem;
                text-align: center;
            }

            input, button {
                font-size: 1rem;
                padding: 8px;
            }

            button {
                max-width: 200px;
                margin: 10px auto;
            }

            p {
                font-size: 0.9rem;
                text-align: center;
            }
        }

    </style>
</head>
<body>
<div class="container">
    <h1>Registreren</h1>
    <form method="POST" action="">
        <label for="password">Gebruikersnaam:</label>
        <input type="text" name="username" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>

        <button type="submit">Registreren</button>
    </form>
    <p>Al een account? <a href="login.php">Log hier in</a>.</p>
</div>
</body>
</html>
