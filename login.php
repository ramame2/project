
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
            font-family: 'Arial', sans-serif;
            color: white;
            margin: 0;
            background-color: #1a1a1a;
            background-image: url("jj.jpg");
            background-size: cover;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            font-size: 4rem;
            color: #e8dd0b;
            margin: 0;
        }

        img {
            width: 100%;
            max-width: 299px;
            height: auto;
            border-radius: 80%;
            margin: 1rem;
            border: solid 0.2rem #0726f4;
        }

        .login-container {
            background-color: rgba(12, 10, 10, 0.8);
            color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 90%;
            margin: 20px auto;
        }

        .login-container input,
        .login-container button {
            width: 90%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
        }

        .login-container button {
            width: 10rem;
            background-color: #0740fb;
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .login-container button:hover {
            background-color: #13d7dd;
        }

        .login-container a {
            color: #091bed;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .text {
            color: #fbf9f9;
            font-size: 1.3rem;
            text-align: left;
            margin: 1rem;
        }

        .container2 {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            text-align: left;
            margin-top: -40px;
        }

        h2 {
            color: #efef16;
        }

        @media screen and (max-width: 768px) {
            h1 {
                font-size: 2.5rem;
            }

            img {
                max-width: 150px;
            }

            .login-container {
                margin-top: 20px;
            }

            .text h2 {
                font-size: 1.5rem;
            }

            .text p {
                font-size: 1rem;
            }
        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #f0f0f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 2rem;
            font-size: 0.9rem;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }

        footer p {
            margin: 0;
        }

        footer a {
            color: #00aced;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
            color: #ffffff;
        }

        @media screen and (max-width: 600px) {
            footer {
                flex-direction: column;
                text-align: center;
                padding: 1rem;
            }

            footer p {
                margin: 0.5rem 0;
            }
        }
    </style>
</head>
<body>
<header>
    <h1>Rama Mari</h1>
</header>

<div class="login-container">
    <form method="POST" action="">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Inloggen</button>
    </form>
    <?php if (isset($error_message)): ?>
        <p class="error" style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <p class="he">Heeft u geen account? <a href="register.php">Registreer hier</a></p>
</div>

<div class="container2">
    <img src="rm.jpg" alt="Profile Image">
    <div class="text">
        <h2>Hello,<br> welcome to my portfolio</h2>
        <p>
            Deze website biedt een compleet beeld van mijn persoonlijkheid en <br>
            werkstijl, waardoor u een goed inzicht krijgt in hoe we succesvol kunnen <br>
            samenwerken. U vindt hier alles wat u moet weten over mijn programmeervaardigheden en capaciteiten.
        </p>
    </div>
</div>
<br><br><br><br><br><br>
<footer>
    <p>Email: <a href="mailto:eng.rama.me@gmail.com">eng.rama.me@gmail.com</a></p>
    <p>Telefoonnummer: <a href="tel:06*******">06*********</a></p>
    <p>&copy; 2024 Rama Mari - Alle rechten voorbehouden</p>
</footer>
</body>
</html>
