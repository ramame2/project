<?php
session_start(); // Start a new session

// Database connection
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

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare SQL statement with parameterized query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="portfolio.css">
    <title>Inloggen</title>
    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: white; margin: 0;
        }
        header {
            padding: 1px;
            text-align: center;
        }
        .login-container {

            color: #0c0a0a;
            padding: 10px; border-radius: 20px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); text-align: center;
        }
        .login-container input {
            width: 20%; padding: 5px;
            margin: 5px 0; border: none;
            border-radius: 3px;
        }
        .login-container button {
            width: 10%; padding: 5px;
            background-color: cadetblue; color: #ffffff;
            border: none; border-radius: 7px;
            cursor: pointer;
        }
        .login-container button:hover {
            background-color: cadetblue;
        }
        .login-container a {
            color: cadetblue;
            text-decoration: none;
        }
        .login-container a:hover {
            text-decoration: none;
        }
        .he{margin-left: -10rem;}
        .login-container{background-color: #0c0a0a;
        width: 40rem; margin-left: 24rem;
        border-radius: 5px;}
        form{background-color: #0c0a0a;}
        label{color: #f0f0f0;}

        @media screen and (min-width: 320px) and (max-width: 780px) {
            body {
                padding: 1rem;
            }

            .login-container {
                width: 90%;
                margin: 0 auto; padding: 1rem;
                box-shadow: none;
            }

            .login-container input, .login-container button {
                width: 100%;
                margin-top: 10px;
            }

            .login-container button {
                max-width: none;
            }

            .he {
                margin: 1rem 0;
                font-size: 0.9rem;
                text-align: center;
            }

            .container2 {
                flex-direction: column;
                padding: 1rem;
                text-align: center;
            }

            img {
                width: 100%; max-width: 250px;
                margin: 1rem auto; border-radius: 50%;
            }

            .text h2 {
                font-size: 1.5rem;
            }

            .text p {
                font-size: 1rem;
                padding: 0 1rem;
            }
        }
    </style>
</head>
<body>
<header>
    <div class="login-container">
        <form method="POST" action="">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <?php if (isset($error_message)): ?>
            <p class="error"><?php echo $error_message; ?></p>
        <?php endif; ?>
        <p class="he">Heeft U geen account? <a class="reg" href="register.php">Register hier</a></p>
    </div>
</header>

<div class="container2">
    <img src="rm.jpg" alt="">
    <div class="text">
        <h2>Hello,<br> welcome to my portfolio</h2>
        <br>
                <p>
                    Deze website biedt een compleet beeld van mijn persoonlijkheid en <br>
                    werkstijl, waardoor u een goed inzicht krijgt in hoe we succesvol kunnen samenwerken. <br>
                    U vindt hier alles wat u moet weten over mijn programmeervaardigheden en capaciteiten</p>
    </div>
</div>
</body>
</html>
