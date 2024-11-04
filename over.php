<?php
$servername = "sql211.infinityfree.com";
$username = "if0_37327165";
$password = "edKK6Cnyx66e";
$dbname = "if0_37327165_rama";



$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over mij</title>
    <link rel="icon" href="my.ico" type="image/x-icon">

</head>
    <style>
        :root {
            --bg-color-light: #f0f0f0; --text-color-light: #333;
            --button-bg-light: #1c454c; --popup-bg-light: #1c454c;
            --bg-color-dark: #1e1e1e; --text-color-dark: #e0e0e0;
            --button-bg-dark: #5c7a96; --popup-bg-dark: #acb7f1;
        }

        body.light-mode {
            background-color: var(--bg-color-light);
            color: var(--text-color-light);
        }

        body.dark-mode {
            background-color: var(--bg-color-dark);
            color: var(--text-color-dark);
        }

        header {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.01rem;
            padding: 0.5rem;
            width: 50%;
            margin: auto;
        }

        header h1 {
            font-size: 3rem;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold; color:cadetblue;
            margin-top: 1rem;
        }

        .content {
            display: flex; flex-direction: column;
            align-items: center; gap: 2rem; padding: 20px;
        }

        button {
            margin-top: 1rem; width: 17rem;
            font-size: 2rem; padding: 10px 20px;
            border: none; border-radius: 8px;
            cursor: pointer; color: #fff;
            background-color: #1c454c; transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 217, 255, 0.79);
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        button:hover {
            background-color: #e6dcdc;
        }

        body.dark-mode button {
            background-color:cadetblue;
        }

        .popup {
            display: none;padding: 15px;
            border-radius: 8px; margin-top: 10px;
            font-size: 1rem;
            color: white;background-color: #1c454c; width: 80%;
            box-shadow: 0 4px 8px rgba(0, 217, 255, 0.79);
            max-width: 400px; border: 1px solid #fff;
        }

        body.dark-mode .popup {
            background-color: cadetblue;
        }

        .popup.show {
            display: block;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }


        #theme-toggle {

            padding: 0.5rem 1rem;
            background-color: white;
            margin-top: -1rem;
            color: black;
            font-weight: bold;
            font-size: 0.8rem;
            border: solid black;
            transition: background-color 0.3s, color 0.3s;
            width: 4.7rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            margin-left: 2rem;
            text-align: center;
            border-radius: 2rem;
        }
        .terug {
            text-align: center;
            margin-left: -8rem;
            font-size: 1rem;
            color: #066ddc;
        }

        .collapse-button {
            width: 6rem;
            position: fixed;
            top: 1rem;
            right: 7rem;
            background-color: rgba(28, 69, 76, 0.82);
            color: #061ef6;
            font-size: 18px;
            padding: 1px 1px;
            border: cadetblue solid;
            cursor: pointer;
            z-index: 1000;
            border-radius: 98px;
            transition: background-color 0.3s ease;;
        }


        .collapse-button:hover {
            background-color: #3f72a5;
        }


        .items {
            display: none;
            background-color: rgb(42, 88, 96);
            position: fixed;
            top: 75px;
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
            font-size: 2rem;

        }
        .cv-download-link{
            display: inline-block;
            text-decoration: none;
            text-align: center;
            margin-top: 1rem; width: 14rem;
            font-size: 2rem; padding: 10px 20px;
            border: none; border-radius: 8px;
            cursor: pointer; color: #fff;
            background-color: #236671; transition: background-color 0.3s;
            box-shadow: 0 4px 8px rgba(0, 217, 255, 0.79);
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
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
            padding: 1rem 1rem;
            font-size: 1rem;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }


        footer p {
            margin: 0.3rem 1rem 0.3rem 0.3rem;
            font-size: 1rem;
            color: #d1d1d1;
        }


        .sociaal {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            border-radius: 8rem;
            margin-top: 0;
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


        .d{
            height: 7rem;}



        @media screen and (max-width: 600px) {


            header {
                width: 100%;
                margin-left: 0;
                padding: 10px;
            }

            header h1 {
                font-size: 2rem;
                margin-top: 0;
            }

            .content {
                padding: 10px;
            }

            .content button {
                width: 100%;
                font-size: 1.5rem;
                padding: 15px;
            }

            #theme-toggle {
                margin-left: 0;
                margin-top: 10px;
                width: 20%;
            }


            footer {
                position: fixed;
                background-color: rgba(51, 51, 51, 0.56);
                color: #f0f0f0;
                padding: 0.5rem 0;
                font-size: 0.5rem;

            }
            .terug {
                align-items: center;
                margin-left: 0.6rem;
                font-size: 0.9rem;
                margin-top: 1rem;
                color: #066ddc;
            }

            .sociaal {
                display: flex;
                gap: 1rem;
                margin-top: 0;
            }


            img {

                border: #ddf405 1px solid;
                border-radius: 8rem;

            }



            .collapse-button {
                position: fixed;
                top: 1rem;
                right: 1.5rem;
                background-color: #defd10;
                color: #0f3efb;
                font-size: 15px;
                padding: 10px 12px;
                border: cadetblue solid;
                cursor: pointer;
                z-index: 1000;
                border-radius: 29px;
                transition: background-color 0.3s ease;;
                width: 5rem;
            }

            .items {
                display: none;
                background-color: rgba(48, 42, 42, 0.75);
                position: fixed;
                top: 60px;
                right: 12px;
                border: 1px solid rgba(221, 221, 221, 0.6);
                border-radius: 8px;
                width: 200px;
                box-shadow: 0 8px 16px rgba(152, 144, 43, 0.27);
                z-index: 999;
                overflow: hidden;
            }

            p {
                text-align: center;
                font-size: 1.2rem;
                margin-top: 1.5rem;
                margin-left: 1rem;

            }

            #text-container {
                font-size: 1.5rem;
                margin-top: 1.5rem;
                margin-left: 1rem;

            }
        }
    </style>





<body class="light-mode">
<div>
    <header>
        <h1>Rama Mari</h1>

    </header>
    <div id="text-container"></div>
</div>
<div>

    <button id="theme-toggle" onclick="toggleTheme()">🌙🔆</button>

</div>


<div class="content">
    <button onclick="togglePopup('skillsPopup')">Vaardigheden</button>
    <div id="skillsPopup" class="popup">
        <p>Ik ben een veelzijdige ontwikkelaar met ervaring in HTML, CSS, JavaScript, PHP en Git.<br>
            Ik heb websites gebouwd, games ontwikkeld en beschik over een basiskennis van grafisch ontwerp.
            Daarnaast ben ik sterk in timemanagement en leer ik snel nieuwe vaardigheden aan.</p>
    </div>
    <button onclick="togglePopup('educationPopup')">Opleidingen</button>
    <div id="educationPopup" class="popup">
        <p>Ik heb biologie en biotechnologie gestudeerd aan de Universiteit van Aleppo in mijn land.<br>
            Daarna heb ik twee jaar informatietechnologie gevolgd, maar door de oorlog kon ik deze opleiding niet afronden.<br>
            Momenteel studeer ik AD Software Development aan Hogeschool Windesheim.</p>
    </div>

    <button onclick="togglePopup('experiencePopup')">Werkervaring</button>
    <div id="experiencePopup" class="popup">
        <p>Ik heb drie jaar als tandartsassistente gewerkt in mijn land en een jaar stage gelopen in Nederland om mijn taalvaardigheid te verbeteren.</p>
    </div>

    <button onclick="togglePopup('hobbiesPopup')">Hobby's</button>
    <div id="hobbiesPopup" class="popup">
        <p>Ik hou van sporten, tekenen, koken, en films kijken.</p>
    </div>

    <?php
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT name, email, phone, experience, cv_file FROM cv";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<a href="data:application/pdf;base64,' . base64_encode($row['cv_file']) . '" download="CV" class="cv-download-link">📄 Mijn CV </a>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>


</div>
<div class="d">

</div>

<div>
    <button class="collapse-button" onclick="toggleMenu()">☰</button>

</div>



<div class="items" id="menuItems">
    <a class="Contact" href="me2.php" target="_self">📨 Contact </a>
    <a class="over" href="over.php" target="_self">️📑 Over mij</a>
    <a class="projecten" href="projecten.php" target="_self">📚 Projecten </a>
</div>

</body>
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

<script>
    function toggleTheme() {
        const body = document.body;
        body.classList.toggle("dark-mode");

        const themeToggle = document.getElementById("theme-toggle");
        if (body.classList.contains("dark-mode")) {
            themeToggle.textContent = "🔆";
        } else {
            themeToggle.textContent = "🌙";
        }
    }
    function togglePopup(popupId) {
        const popup = document.getElementById(popupId);
        popup.classList.toggle("show");
    }
</script>



<script>
    const text = "Hello!! Welcome to my portfolio!";
    const textContainer = document.getElementById("text-container");
    let index = 0;

    function displayNextLetter() {
        if (index < text.length) {
            textContainer.innerHTML += text[index];
            index++;
            setTimeout(displayNextLetter, 100);
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


</body>
</html>
