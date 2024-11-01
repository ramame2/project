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


        .items a {
            font-size: 1.5rem;
            color: #f0f0f0;
            font-family: "Lucida Bright";
            padding: 0.5rem;
            text-decoration: none;
            margin-left: 5rem;
            transition: color 0.3s, background-color 0.3s;
        }

        .items a:hover {
            color: #ffffff;
            background-color: cadetblue; /* Kleur bij hover */
            border-radius: 0.5rem;
        }

        .items a:hover {
            color: cadetblue;
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
</head>
<body>
<header>
    <div class="container1">
        <h1>Rama Mari</h1>
    </div>
    <div class="items">
        <a class="Contact" href="me2.php" target="_blank">Contact</a>
        <a class="over" href="over.php" target="_blank">Over</a>
        <a class="projecten" href="projecten.php" target="_blank">Projecten</a>
    </div>
</header>

<div class="container2">
    <img src="rm.jpg" alt="Rama Mari">
    <div class="text">
        <h2>Hello, welcome to my portfolio</h2>
        <p>Ik ben Rama Mari, en dit is mijn portfolio. Ik hou van leven, ben ambitieus , serieus in mijn taken en werk, en ik hou ervan om al mijn taken op tijd af te ronden. Productiviteit verhoogt altijd mijn geluksgevoel en positieve energie.</p>
    </div>
    <div class="sociaal">
        <a href="https://www.facebook.com/engrama.merea" target="_blank"><img class="face" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSskbpEX-jqvW2ZslvzHgvtEKykib-oCRvCPA&s" alt="Facebook"></a>
        <a href="https://www.linkedin.com/legal/professional-community-policies?openinweb=true"><img class="linked" src="https://banner2.cleanpng.com/20180417/ifw/avfn2u8al.webp" alt="LinkedIn"></a>
        <a href="#"><img class="insta" src="https://w7.pngwing.com/pngs/910/192/png-transparent-instagram-instagram-new-design-liner-round-social-media-instagram-new-icon.png" alt="Instagram"></a>
        <a href="https://www.tiktok.com/@roro.mari22?_t=8q5sxdJ7iMd&_r=1" target="_blank"><img class="tik" src="https://w7.pngwing.com/pngs/483/249/png-transparent-tiktok-icon-thumbnail.png" alt="TikTok"></a>
    </div>
</div>

<footer>
    <div class="contact-info">
        <p>Email: <a href="mailto:eng.rama.me@gmail.com">eng.rama.me@gmail.com</a></p>
        <p>Telefoonnummer: <a href="tel:06*******">06*********</a></p>
    </div>
</footer>

</body>
</html>




