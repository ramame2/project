<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Database connection
$servername = "sql211.infinityfree.com";
$username = "if0_37327165";
$password = "edKK6Cnyx66e";
$dbname = "if0_37327165_rama";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);

    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    if ($stmt->execute()) {
        $successMessage = "Message is verzonden!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #0c0c0c;
            transition: background-color 0.3s, box-shadow 0.3s;
        }
        h1 {
            margin-bottom: 10px;
            font-size: 3rem;
            color: cadetblue;
            text-align: center;
            margin-top: -3rem;

        }
        p {
            margin-bottom: 20px;
            color: #555;
            text-align: center;
        }
        .contact-form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        label {
            font-weight: bold;
            color: #007BFF;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
            background-color: #e8f5e9;
        }
        button {
            padding: 10px;
            background-color: #ffffff;
            border: solid black;
            color: #0c0a0a;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #dacfcf;
        }
        body.dark-mode {
            background-color: black;
            color: white;
        }
        .container.dark-mode {
            background: #2c2c2c;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            border-left: 5px solid #2a372b;
        }
        label.dark-mode {
            color: #1c454c;
        }
        input[type="text"].dark-mode,
        input[type="email"].dark-mode,
        textarea.dark-mode {
            border: 1px solid #555;
            background-color: #444;
            color: white;
        }
        .sociaal {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }
        .sociaal img {
            width: 35px;
            height: 35px;
        }
        .map {
            width: 17%;
            height: 50px;
            margin-top: 0px;
            border-radius: 200px;
        }
        #theme-toggle {
            margin-top: 1rem;
            display: block;
            width: 60px;
            margin-left: 89%;
            text-align: center;
            border-radius: 2rem;
        }
        .terug {
            display: block;
            text-align: center;
            margin-top: 1.5rem;
            color: #007BFF;
        }

        /* Responsive Styles */
        @media screen and (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }
            .container {
                padding: 15px;
                width: 90%;
                margin: 20px auto;
            }
            #theme-toggle {
                font-size: 0.9rem;

            }
            .sociaal img {
                width: 30px;
                height: 30px;
            }
            .map {
                height: 200px;
            }
        }
    </style>
</head>
<body>
<button id="theme-toggle" onclick="toggleTheme()">Dark Mode</button>
<header>
    <h1>Contact</h1>
</header>
<div class="container">
    <p>We horen graag van u, stuurt u hier een bericht</p>
    <form action="me2.php" method="post" class="contact-form">
        <label for="name">Naam:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Bericht:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <button type="submit">Verzenden</button>
    </form>
</div>
<footer>
    <div class="sociaal">

        <a href="https://www.facebook.com/engrama.merea" target="_blank"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSskbpEX-jqvW2ZslvzHgvtEKykib-oCRvCPA&s" alt="Facebook"></a>
        <a href="https://www.linkedin.com/legal/professional-community-policies?openinweb=true" target="_blank"><img src="https://banner2.cleanpng.com/20180417/ifw/avfn2u8al.webp" alt="LinkedIn"></a>
        <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.000123130496!2d5.219589076524773!3d52.37041777202225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c616e13959b029%3A0xe04f21626e2f3f0e!2sWindesheim%20in%20Almere!5e0!3m2!1sen!2snl!4v1730371721315!5m2!1sen!2snl"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        <a href="instagram.com"><img src="https://w7.pngwing.com/pngs/910/192/png-transparent-instagram-instagram-new-design-liner-round-social-media-instagram-new-icon.png" alt="Instagram"></a>
        <a href="https://www.tiktok.com/@roro.mari22?_t=8q5sxdJ7iMd&_r=1" target="_blank"><img src="https://w7.pngwing.com/pngs/483/249/png-transparent-tiktok-icon-thumbnail.png" alt="TikTok"></a>
    </div>
    <a class="terug" href="index.php" target="_blank">TERUG NAAR HOMEPAGINA</a>
   </footer>

<script>
    function toggleTheme() {
        const body = document.body;
        const container = document.querySelector('.container');
        const labels = document.querySelectorAll('label');
        const inputs = document.querySelectorAll('input[type="text"], input[type="email"], textarea');

        body.classList.toggle("dark-mode");
        container.classList.toggle("dark-mode");
        labels.forEach(label => label.classList.toggle("dark-mode"));
        inputs.forEach(input => input.classList.toggle("dark-mode"));

        const themeToggle = document.getElementById("theme-toggle");
        themeToggle.textContent = body.classList.contains("dark-mode") ? "Light Mode" : "Dark Mode";
    }
</script>
</body>
</html>
