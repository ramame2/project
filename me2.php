<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <link rel="stylesheet" href="me3.css">
    <style>
        * {
            box-sizing: border-box; margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: white;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        .container {
            max-width: 600px; margin: 50px auto;
            padding: 20px; background: white;
            border-radius: 8px; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-left: 5px solid #0c0c0c; transition: background-color 0.3s, box-shadow 0.3s;
        }
        h1 {
            margin-bottom: 10px; font-size: 3rem;
            color: cadetblue; text-align: center;
            margin-left: 0.01rem;
        }
        p {
            margin-bottom: 20px;
            color: #555;
        }
        .contact-form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 5px;
            font-weight: bold;
            color: #007BFF;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            padding: 10px; margin-bottom: 20px;
            border: 1px solid #ccc; border-radius: 4px;
            font-size: 16px; transition: border-color 0.3s;
        }
        input[type="text"]:focus,
        input[type="email"]:focus,
        textarea:focus {
            border-color: #4CAF50;
            outline: none;
            background-color: #e8f5e9;
        }
        button {
            padding: 10px; width: 8rem;
            background-color: #ffffff; border: solid black;
            color: #0c0a0a; border-radius: 4px;
            font-size: 16px; cursor: pointer;
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
        .switch {
            position: relative; display: inline-block;
            width: 60px; height: 34px;
            margin: 20px 0;
        }
        .switch input {
            opacity: 0; width: 0;
            height: 0;
        }

        }
        .slider:before {
            position: absolute; content: "";
            height: 26px; width: 26px;
            left: 4px; bottom: 4px;
            background-color: white; transition: .4s;
            border-radius: 50%;
        }

        input:checked + .slider {
            background-color: cadetblue;
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        #theme-toggle {
            margin-left: 87rem; margin-top: 1.5rem;
            margin-right: 1rem; font-size: 0.8rem;
            border-radius: 8rem;
        }

        }
        .terug {
            margin-left: 2rem;
            margin-top: 2rem;
            color: #007BFF;
        }
.na{margin-left: 0.1rem;}

        .sociaal{
            width: 2rem; height: 2rem;
            margin-top: -2rem;
            display: flex; justify-content: space-between;
            gap: 1.5rem;padding: 10px;
        margin-left: 42rem;}

        .face{
            width: 35px;height: 35px;}

        .insta{
            width: 35px;height: 35px;}

        .linked{
            width: 35px;height: 35px}

        .tik{
            width: 35px;height: 35px}

        .container.dark-mode {
            background-color: #3a3a3a;
            color: #f0f0f0;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            border-left: 5px solid #2a372b;
        }


        label.dark-mode {
            color: #b0d4e3;
        }


        input[type="text"].dark-mode,
        input[type="email"].dark-mode,
        textarea.dark-mode {
            border: 1px solid #777;
            background-color: #555;
            color: #f0f0f0;
        }

        .map {
            margin-left: 0.1rem;
            margin-top: -50rem;
            border-radius: 9rem;



        }


        @media screen and (min-width: 320px) and (max-width: 1024px) {

            body{
                width:130%;
            height: 300%;
            margin: 0;}

            .container {
                padding: 15px;
                width: 100%;
                margin: 20px auto;
                border-radius: 6px;
                box-shadow: none;
            }
            h1 {
                font-size: 2rem;
                margin: 10px 0;
            }
            .contact-form label,
            .contact-form input,
            .contact-form textarea,
            button {
                width: 100%;
                font-size: 1rem;
            }
            .sociaal {
                display: flex;
                justify-content: center;
                gap: 10px;
                margin-top: 20px;
            }
            .sociaal img {
                width: 25px;
                height: 25px;
            }
            .map {
                width: 100%;
                height: 250px;
                margin-top: 20px;
                border-radius: 8px;
            }
        }

    </style>
</head>
<body>

<button id="theme-toggle" onclick="toggleTheme()">Dark/light Mood</button>
<header>
    <h1 class="na">Rama Mari</h1>
</header>
<div class="container">
    <h1>Contact</h1>
    <p>We horen graag van u! Vult u alstublieft het onderstaande formulier in.</p>

    <?php
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

    <form action="me2.php" method="post" class="contact-form">
        <label for="name">Naam:</label>
        <input type="text" id="name" name="name" required>
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="message">Bericht:</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <button type="submit">Verzenden</button>
    </form>

    <?php
    if (!empty($successMessage)) {
        echo "<p style='color: blue;'>$successMessage</p>";
    }
    ?>
</div>
<footer>
    <div class="sociaal">
        <a href="https://www.facebook.com/engrama.merea" target="_blank"><img class="face" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSskbpEX-jqvW2ZslvzHgvtEKykib-oCRvCPA&s" alt="" ></a>
        <a href="https://www.linkedin.com/legal/professional-community-policies?openinweb=true"><img class="linked" src="https://banner2.cleanpng.com/20180417/ifw/avfn2u8al.webp" alt=""></a>
        <a href=""><img class="insta" src="https://w7.pngwing.com/pngs/910/192/png-transparent-instagram-instagram-new-design-liner-round-social-media-instagram-new-icon.png" alt=""></a>
        <a href="https://www.tiktok.com/@roro.mari22?_t=8q5sxdJ7iMd&_r=1" target="_blank"><img class="tik" src="https://w7.pngwing.com/pngs/483/249/png-transparent-tiktok-icon-thumbnail.png" alt=""></a>

    </div>
    <a class="terug" href="index.php" target="_blank">TERUG NAAR HOMEPAGINA</a>
    <iframe class="map"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.000123130496!2d5.219589076524773!3d52.37041777202225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c616e13959b029%3A0xe04f21626e2f3f0e!2sWindesheim%20in%20Almere!5e0!3m2!1sen!2snl!4v1730371721315!5m2!1sen!2snl"
            width="150" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

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
