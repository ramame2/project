<!DOCTYPE html>
<html lang="en">


    <style>


        #text-container {
            width: 100%;
            height: 4rem;
            font-size: 3rem;
            text-align: center;
            color: #23717c;
            font-family: Cambria, serif;
            margin-top: 2rem;

        }
    </style>
<body>

<div id="text-container"></div>

<script>
    const text = "Hello!! welcome to my portfolio!";
    const textContainer = document.getElementById("text-container");
    let index = 0;

    function displayNextLetter() {
        if (index < text.length) {
            textContainer.innerHTML += text[index];
            index++;
            setTimeout(displayNextLetter, 100); // Adjust speed (in milliseconds) if needed
        } else {
            // After finishing, reset index and clear text to repeat
            setTimeout(() => {
                textContainer.innerHTML = ""; // Clear the text container
                index = 0; // Reset index
                displayNextLetter(); // Start displaying again
            }, 2000); // Wait for 2 seconds before restarting (adjust if needed)
        }
    }
    displayNextLetter();
</script>

</body>
</html>

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
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mijn Portfolio</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
</head>
<style>

        body {
            background-image: url(bb.jpg);
            background-repeat: repeat;
            background-size: cover;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        h1 {
            width: 12em;
            height: 5rem;
            font-size: 4rem;
            text-align: center;
            color: #28383a;
            font-family: Cambria, serif;
            margin-top: 3rem;
            background-color: #86a3a8;
            border-radius: 7rem;
        }

        h2 {
            color: cadetblue;
            font-family: Cambria, serif;
            font-size: 2.2rem;
            text-align: left;
            margin-top: 1rem;
            margin-left: 4.8rem;
        }

        p {
            font-size: 1.1rem;
            color: antiquewhite;
            text-align: center;
            padding: 0 1rem;
            line-height: 1.5;
            font-family: Cambria, serif;
            margin-top: 5rem;
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
            grid-template-columns: auto auto;
            justify-items: center;
            gap: 2rem;
            padding: 2rem 0;

        }

        img {
            width: 95%%;
            max-width: 290px;
            height: 97%;
            border: #e2ce4a solid;
            border-radius: 15rem;
            margin-top: 0rem;
            margin-left: -0.5rem;
        }

        .sociaal {
            display: flex;
            justify-content: center;
            gap: 0.7rem;
            margin-top: 0rem;
        }

        .sociaal img {
            width: 25px;
            height: 25px;
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

        h3 {
            color: cadetblue;
            font-size: 3.5rem;
            margin-left: 4rem;
            font-family: "Arabic Typesetting";
        }

        .container3 {

            margin-left: 0rem;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .collapse-button {
            position: fixed;
            top: 0rem;
            right: 7rem;
            background-color: #d1cc5c;
            color: white;
            font-size: 11px;
            padding: 10px 12px;
            border: cadetblue solid;
            cursor: pointer;
            z-index: 1000;
            border-radius: 28px;
            transition: background-color 0.3s ease;;
        }


        .collapse-button:hover {
            background-color: #555;
        }


        .items {
            display: none;
            background-color: #fff;
            position: fixed;
            top: 60px;
            right: 62px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 200px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 999;
            overflow: hidden;
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


        .items a:hover {
            background-color: #f1f1f1;
            color: #007BFF; /* Professional blue hover color */
        }


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

    @media only screen and (max-device-width: 768px) {
        footer {
            flex-direction: grid;
            text-align: left;
            padding: 1rem;
            height: 4rem;
        }

        footer p {
            margin: 0.5rem 0;
        }

        h2 {
            font-size: x-large;
            margin-left: 0.8rem;
        }


        img {
            width: 23rem;
            height: 20rem;

        }

        .collapse-button {
            position: fixed;
            top: 0rem;
            right: 2rem;
            background-color: #3c6730;
            color: white;
            font-size: 15px;
            padding: 10px 12px;
            border: cadetblue solid;
            cursor: pointer;
            z-index: 1000;
            border-radius: 29px;
            transition: background-color 0.3s ease;;
        }

        .items {
            display: none;
            background-color: #fff;
            position: fixed;
            top: 60px;
            right: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            width: 200px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 999;
            overflow: hidden;
        }

        .container2 {

            justify-items: center;
            gap: 1rem;
            padding: 1rem 0;
            max-width: 110%;
            margin: auto;
        }
    }
</style>

<div class="container1">
    <h1>Rama Mari</h1>
</div>
<div>


</div>


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



<div class="container2">
    <img src="rm.jpg" alt="Rama Mari">
    <div class="text">
        <h2>Hello,<br> welcome to my portfolio</h2>
        <p>Ik ben Rama Mari, en dit is mijn portfolio.<br>Ik hou van leven, ben ambitieus, serieus in mijn taken en werk, ik hou ervan om al mijn taken op tijd af te ronden.<br>
            Productiviteit verhoogt altijd mijn geluksgevoel en positieve energie.</p>
    </div>
    <div class="container3">
        <h3> Welke secties bevat mijn portfoilio?</h3>
        <p class="p2">
            <strong>Over-pagina</strong>:  Hier staan alle persoonlijke informatie over mij.<br>
            Mijn CV is hier ook te vinden, en er is de mogelijkheid<br>
            voor u om mijn CV te downloaden.<br><br>

            <strong>Contactpagina</strong>:  via deze pagina kunt u contact met mij opnemen, <br>
            ik kan dan ue berichten kijken en beantwoorden.<br><br>

            <strong>Projectenpagina</strong>:  Op deze pagina presenteer ik de projecten die ik eerder heb gemaakt.
            Ik kan ook meer toekomstige projecten toevoegen als ik er meer heb.<br> Daarnaast is er een
            sectie met informatie over alle projecten.
            <br> <br> <br> <br> <br>  <br> <br> <br> <br> <br>
        </p>


    </div>

</div>

<footer>
    <div class="sociaal">
        <a href="https://www.facebook.com/engrama.merea" target="_blank"><img class="face" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSskbpEX-jqvW2ZslvzHgvtEKykib-oCRvCPA&s" alt="Facebook"></a>
        <a href="https://www.linkedin.com/legal/professional-community-policies?openinweb=true"><img class="linked" src="https://banner2.cleanpng.com/20180417/ifw/avfn2u8al.webp" alt="LinkedIn"></a>
        <a href="#"><img class="insta" src="https://w7.pngwing.com/pngs/910/192/png-transparent-instagram-instagram-new-design-liner-round-social-media-instagram-new-icon.png" alt="Instagram"></a>
        <a href="https://www.tiktok.com/@roro.mari22?_t=8q5sxdJ7iMd&_r=1" target="_blank"><img class="tik" src="https://w7.pngwing.com/pngs/483/249/png-transparent-tiktok-icon-thumbnail.png" alt="TikTok"></a>
    </div>
    <p>&copy; 2024 Rama Mari - Alle rechten voorbehouden</p>
</footer>

</body>
</html>




