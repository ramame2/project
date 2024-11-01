
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
    <title>Inloggen</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <style>
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: white;
            margin: 0;
            background-color: #1a1a1a;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("bb.jpg");
            background-size:cover;
        }

        header {
            width: 100%;
            text-align: center;
        }
        img {
            width: 1100%;
            height: 90%;
            max-width: 290px;
            margin: 1rem auto;
            border-radius: 40%;
        }

        .login-container {
            background-color: #0c0a0a;
            color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 500px;
            width: 90%;
            margin: 0 auto;
        }

        .login-container input, .login-container button {
            width: 90%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
        }

        .login-container button {
            background-color: cadetblue;
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
        }

        .login-container button:hover {
            background-color: #5f9ea0;
        }

        .login-container a {
            color: cadetblue;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .he {
            font-size: 1.5rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            color: #dacfcf;
            margin-top: 1rem;

        }
        h1{
           font-size: 4rem;
            color: #2e717c;
            margin-top: -5rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

        }
        .text{color: #fbf9f9;
        font-size: 1.14rem;}

        /* Responsive styling */
        @media screen and (max-width: 768px) {
            .login-container {
                padding: 20px;
            }

            .login-container input, .login-container button {
                padding: 12px;
                font-size: 1rem;
            }

            .he {
                font-size: 1rem;
            }

            .container2 {
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 10px;
                text-align: center;
            }

            img {
                width: 100%;
                max-width: 150px;
                margin: 1rem auto;
                border-radius: 30%;
            }

            .text h2 {
                font-size: 1.5rem;
                margin-bottom: 1rem;
            }

            .text p {
                font-size: 1rem;
                padding: 0 1rem;
            }
            h1{
                font-size: 1.1rem;
                margin-left: 1.5rem;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Rama Mrai</h1>
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
        <p class="he">Heeft U geen account? <a href="register.php">Register hier</a></p>
    </div>
</header>

<div class="container2">
    <img src="rm.jpg" alt="Profile Image">
    <div class="text">
        <h2>Hello,<br> welcome to my portfolio</h2>
        <p>
            Deze website biedt een compleet beeld van mijn persoonlijkheid en <br>
            werkstijl, waardoor u een goed inzicht krijgt in hoe we succesvol kunnen samenwerken. <br>
            U vindt hier alles wat u moet weten over mijn programmeervaardigheden en capaciteiten.
        </p>
    </div>
</div>
</body>
</html>
