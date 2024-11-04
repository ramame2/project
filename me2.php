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
            box-shadow: 0 4px 8px rgba(0, 217, 255, 0.79);
            border-radius: 8px;
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
            color: #978282;
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
            box-shadow: 0 4px 8px rgba(0, 217, 255, 0.79);
            border-left: 5px solid #2a372b;
        }
        label.dark-mode {
            color: #22a2b8;
        }
        input[type="text"].dark-mode,
        input[type="email"].dark-mode,
        textarea.dark-mode {
            border: 1px solid #555;
            background-color: #444;
            color: white;
        }
        .map {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.01rem;
            padding: 0.5rem;
            width: 80%;
            max-width: 800px;
            margin: auto;
            height: 30%;
            position: relative;
            border-radius: 20px;
        }
        #theme-toggle {
            margin-top: 1rem;
            display: block;
            width: 60px;
            margin-left: 2rem;
            text-align: center;
            border-radius: 2rem;
        }
        .terug {
            display: block;
            text-align: center;
            font-size: 1rem;
            margin-top: 0;
            margin-left: -5rem;
            color: #066ddc;
        }

        .collapse-button {
            position: fixed;
            top: 1rem;
            right: 7rem;
            width: 4rem;
            background-color: rgba(241, 250, 2, 0.69);
            color: #061ef6;
            font-size: 18px;
            padding: 10px 12px;
            border: cadetblue solid;
            cursor: pointer;
            z-index: 1000;
            border-radius: 28px;
            transition: background-color 0.3s ease;;
        }


        .collapse-button:hover {
            background-color: #3f72a5;
        }


        .items {
            display: none;
            background-color: rgba(55, 46, 46, 0.58);
            position: fixed;
            top: 85px;
            right: 62px;
            border: 1px solid rgba(221, 221, 221, 0.27);
            border-radius: 8px;
            width: 165px;
            height: 165px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 999;
            overflow: hidden;
        }

        .items a {
            display: block;
            padding: 16px 20px;
            font-size: 18px;
            text-decoration: none;
            color: rgb(251, 249, 249);
            transition: background-color 0.3s ease, color 0.3s ease;
            font-weight: 500;
        }


        .items a:hover {
            background-color: rgba(92, 116, 205, 0.75);
            color: #fff200;
        }

        #text-container{
            display: flex;
            justify-content: center;
            margin: auto;
            color: #1aa9c1;
            font-size: 2.2rem;

        }

        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(51, 51, 51, 0.53);
            color: #f0f0f0;
            display: flex;
            justify-content: space-between;
            padding: 1rem 0.3rem;
            font-size: 1rem;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }


        footer p {
            margin: 0.3rem;
            color: #d1d1d1;
        }


        .sociaal {
            display: flex;
            justify-content: center;
            gap: 1.7rem;
            margin-top: 1rem;
            border-radius: 8rem;
            margin-left: 1rem;

        }
        img {
            justify-items: center;
            width: 63%;
            height: 70%;
            border: #4a7fe2 2px solid;
            border-radius: 8rem;
            margin-top: 0;
        }

        .sociaal img {
            width: 25px;
            height: 25px;
        }


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

            .map {
                width: 96%;
                height: 40%;
                border-radius: 20px;

            }

            footer {
                position: fixed;
                background-color: rgba(51, 51, 51, 0.56);
                color: #f0f0f0;
                padding: 0.3rem 0;
                font-size: 0.5rem;

            }
            footer p {
                margin-top: 0.6rem;
                margin-right: 0.8rem;
                font-size: 1rem;
                color: #d1d1d1;
            }

            .sociaal {
                display: flex;
                gap: 0.6rem;
                margin-top: 0.5rem;
            }


            img {

                border: #ddf405 1px solid;
                border-radius: 8rem;

            }


            .terug {
                font-size: 1rem;
                margin-top: 0.5rem;
                margin-left: -1.2rem;
                color: #066ddc;
            }

            h3 {
                color: #dbe817;
                font-size: 2rem;
                margin-left: 1rem;
                font-family: "Arabic Typesetting", serif;
                font-weight: ;
            }


            .collapse-button {
                position: fixed;
                width: 3rem;
                top: 1rem;
                right: 1.5rem;
                background-color: #defd10;
                color: #0f3efb;
                font-size: 15px;
                padding: 18px 12px;
                border: cadetblue solid;
                cursor: pointer;
                z-index: 1000;
                border-radius: 24px;
                transition: background-color 0.3s ease;;
            }

            .items {
                display: none;
                background-color: rgba(48, 42, 42, 0.75);
                position: fixed;
                top: 60px;
                right: 12px;
                border: 1px solid rgba(37, 30, 30, 0.6);
                border-radius: 8px;
                width: 200px;
                box-shadow: 0 8px 16px rgba(152, 144, 43, 0.27);
                z-index: 999;
                overflow: hidden;
            }

            p {
                text-align: center;
                font-size: 1.3rem;
                margin-top: 1.5rem;
                margin-left: 0;

            }

            #text-container {
                justify-content: left;

                font-size: 1.5rem;
                margin-top: 1.5rem;
                margin-left: 4rem;

            }
        }
    </style>
</head>
<body>
<div id="text-container"></div>
<button id="theme-toggle" onclick="toggleTheme()">🌙🔆</button>
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

    <div class="map">
        <iframe class="map"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2436.000123130496!2d5.219589076524773!3d52.37041777202225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c616e13959b029%3A0xe04f21626e2f3f0e!2sWindesheim%20in%20Almere!5e0!3m2!1sen!2snl!4v1730371721315!5m2!1sen!2snl"
                frameborder="0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


    </div>
<br><br><br><br>

<footer>
    <div class="sociaal">
        <a href="https://www.facebook.com/engrama.merea" target="_blank"><img class="face" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSskbpEX-jqvW2ZslvzHgvtEKykib-oCRvCPA&s" alt="Facebook"></a>
        <a href="https://www.linkedin.com/legal/professional-community-policies?openinweb=true"><img class="linked" src="https://banner2.cleanpng.com/20180417/ifw/avfn2u8al.webp" alt="LinkedIn"></a>
        <a href="#"><img class="insta" src="https://w7.pngwing.com/pngs/910/192/png-transparent-instagram-instagram-new-design-liner-round-social-media-instagram-new-icon.png" alt="Instagram"></a>
        <a href="https://www.tiktok.com/@roro.mari22?_t=8q5sxdJ7iMd&_r=1" target="_blank"><img class="tik" src="https://w7.pngwing.com/pngs/483/249/png-transparent-tiktok-icon-thumbnail.png" alt="TikTok"></a>
        <a href="https://github.com/ramame2" target="_blank"><img class="github" src="github.png" alt="Github"></a>
    </div>
    <div>
        <a class="terug" href="index.php" target="_self">HOMEPAGINA</a>
    </div>
    <p>&copy; 2024 Rama Mari</p>
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
        themeToggle.textContent = body.classList.contains("dark-mode") ? "🔆" : "🌙";
    }
</script>



<script>
    const text = "Hello! Welcome to my portfolio!";
    const textContainer = document.getElementById("text-container");
    let index = 0;

    function displayNextLetter() {
        if (index < text.length) {
            textContainer.innerHTML += text[index];
            index++;
            setTimeout(displayNextLetter, 200);
        } else {

            setTimeout(() => {
                textContainer.innerHTML = "";
                index = 0; //
                displayNextLetter();
            }, 2000);
        }
    }
    displayNextLetter();
</script>


<button class="collapse-button" onclick="toggleMenu()">☰</button>


<div class="items" id="menuItems">
    <a class="Contact" href="me2.php" target="_self">📨 Contact </a>
    <a class="over" href="over.php" target="_self">️📑 Over mij</a>
    <a class="projecten" href="projecten.php" target="_self">📚 Projecten </a>
</div>


<script>
    function toggleMenu() {
        const menuItems = document.getElementById("menuItems");
        menuItems.style.display = (menuItems.style.display === "block") ? "none" : "block";
    }


    window.onclick = function(event) {
        const menuItems = document.getElementById("menuItems");
        if (!event.target.matches('.collapse-button')) {
            if (menuItems.style.display === "block") {
                menuItems.style.display = "none";
            }
        }
    }
</script>


</body>
</html>
