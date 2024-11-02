<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}


        $servername = "sql211.infinityfree.com";
        $username = "if0_37327165";
        $password = "edKK6Cnyx66e";
        $dbname = "if0_37327165_rama";


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Portfolio</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <style>
        body {
            background-image: url(bb.jpg);
            background-repeat: repeat;
            background-size: cover;
            margin: 0;
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 3rem;
            text-align: center;
            color: #30737e;
            font-family: Cambria, serif;
            margin-top: 3rem;
        }
        h2 {
            color: cadetblue;
            font-family: Cambria, serif;
            font-size: x-large;
            text-align: left;
            margin-top: 1rem;
            margin-left: 6.8rem;
        }
        p {
            font-size: 1.1rem;
            color: antiquewhite;
            text-align: center;
            padding: 0 1rem;
            line-height: 1.5;
            font-family: Cambria, serif;
        }
        .container1 {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 4rem;
            padding: 1rem 0;
            flex-wrap: wrap;
        }
        header {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 1rem;
        }

        .container2 {
            display: grid;
            grid-template-columns: 1fr;
            justify-items: center;
            gap: 2rem;
            padding: 2rem 0;
        }
        img {
            width: 80%;
            max-width: 300px;
            height: auto;
            border-radius: 2rem;
            margin-top: 1rem;
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
        .contact-info {
            text-align: center;
            color: #ffffff;
            font-family: Cambria, serif;
            padding: 1rem 0;
        }
        .contact-info a {
            color: cadetblue;
            text-decoration: none;
        }
        .contact-info a:hover {
            text-decoration: underline;
        }
        button {
            width: 100px;
            margin: 1rem auto;
            display: block;
            border-radius: 2rem;
            padding: 0.5rem;
            font-size: 1rem;
            background-color: #ffffff;
            border: solid 1px cadetblue;
            color: #30737e;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #30737e;
            color: #ffffff;
        }


        @media screen and (min-width: 768px) {
            .container2 {
                grid-template-columns: auto auto;
                gap: 2rem;
                max-width: 80%;
                margin: 0 auto;
            }
            h1 {
                font-size: 4rem;
                margin-top: 2rem;
            }
            p {
                font-size: 1.2rem;
            }
        }
    </style>

    <div class="container1">
        <h1>Rama Mari</h1>
    </div>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Collapsible Menu</title>
        <style>
            /* Basic styling */
            body {
                font-family: Arial, sans-serif;
                margin: 0;
            }

            .collapse-button {
                position: fixed;
                top: 10px;
                right: 8px;
                background-color: #333;
                color: white;
                font-size: 24px;
                padding: 10px 12px;
                border: none;
                cursor: pointer;
                z-index: 1000; /* Keeps the button above other content */
                border-radius: 18px;
                transition: background-color 0.3s ease;
            }


            .collapse-button:hover {
                background-color: #555;
            }

            /* Collapsible menu items */
            .items {
                display: none;
                background-color: #fff;
                position: fixed; /* Fixed position for menu items */
                top: 60px; /* Slightly below the button */
                right: 10px;
                border: 1px solid #ddd;
                border-radius: 8px;
                width: 200px;
                box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
                z-index: 999; /* Keeps menu above other content */
                overflow: hidden; /* Rounded corners for content */
            }

            .items a {
                display: block;
                padding: 16px 20px;
                font-size: 18px; /* Make text larger */
                text-decoration: none;
                color: #333;
                transition: background-color 0.3s ease, color 0.3s ease;
                font-weight: 500;
            }

            /* Hover effect for links */
            .items a:hover {
                background-color: #f1f1f1;
                color: #007BFF; /* Professional blue hover color */
            }
        </style>
    </head>
    <body>


    <button class="collapse-button" onclick="toggleMenu()">☰</button>

    <!-- Collapsible menu items -->
    <div class="items" id="menuItems">
        <a class="Contact" href="me2.php" target="_blank">Contact</a>
        <a class="over" href="over.php" target="_blank">Over</a>
        <a class="projecten" href="projecten.php" target="_blank">Projecten</a>
    </div>

    <!-- JavaScript to toggle menu -->
    <script>
        function toggleMenu() {
            const menuItems = document.getElementById("menuItems");
            menuItems.style.display = (menuItems.style.display === "block") ? "none" : "block";
        }

        // Close the menu if clicked outside
        window.onclick = function(event) {
            const menuItems = document.getElementById("menuItems");
            if (!event.target.matches('.collapse-button')) {
                if (menuItems.style.display === "block") {
                    menuItems.style.display = "none";
                }
            }
        }
    </script>

    </html>

</header>

<div class="container2">
    <img src="rm.jpg" alt="Rama Mari">
    <div class="text">
        <h2>Hello, welcome to my portfolio</h2>
        <p>Ik ben Rama Mari, en dit is mijn portfolio.<br>
            Ik hou van leven, ben ambitieus , serieus in mijn taken en werk,<br>
            en ik hou ervan om al mijn taken op tijd af te ronden. Productiviteit <br>
            verhoogt altijd mijn geluksgevoel en positieve energie.</p>
    </div>
    <div class="sociaal">
        <a href="https://www.facebook.com/engrama.merea" target="_blank"><img class="face" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSskbpEX-jqvW2ZslvzHgvtEKykib-oCRvCPA&s" alt="Facebook"></a>
        <a href="https://www.linkedin.com/legal/professional-community-policies?openinweb=true"><img class="linked" src="https://banner2.cleanpng.com/20180417/ifw/avfn2u8al.webp" alt="LinkedIn"></a>
        <a href="#"><img class="insta" src="https://w7.pngwing.com/pngs/910/192/png-transparent-instagram-instagram-new-design-liner-round-social-media-instagram-new-icon.png" alt="Instagram"></a>
        <a href="https://www.tiktok.com/@roro.mari22?_t=8q5sxdJ7iMd&_r=1" target="_blank"><img class="tik" src="https://w7.pngwing.com/pngs/483/249/png-transparent-tiktok-icon-thumbnail.png" alt="TikTok"></a>
    </div>
</div>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Portfolio</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <style>
        /* Body styling */
        body {
            background-image: url(bb.jpg);
            background-repeat: repeat;
            background-size: cover;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Main content container */
        .content {
            flex: 1;
        }

        /* Footer styling */
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

        /* Footer content styling */
        footer p {
            margin: 0;
            font-size: 1rem;
            color: #d1d1d1;
        }

        footer a {
            color: #00aced;
            text-decoration: none;
            font-weight: 500;
        }

        footer a:hover {
            text-decoration: underline;
            color: #ffffff;
        }

        /* Media query for smaller screens */
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
<div class="content">
    <!-- Main content here -->
</div>

<footer>
    <p>Email: <a href="mailto:eng.rama.me@gmail.com">eng.rama.me@gmail.com</a></p>
    <p>Telefoonnummer: <a href="tel:06*******">06*********</a></p>
    <p>&copy; 2024 Rama Mari - Alle rechten voorbehouden</p>
</footer>

</body>
</html>




