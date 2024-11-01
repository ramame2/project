<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over - Rama Mari</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
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
            text-align: center; padding: 20px;
            transition: background 0.3s; width: 15rem; margin-left: 38rem;
        }

        header h1 {
            font-size: 3rem;
            font-family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-weight: bold; margin: 0; color:cadetblue;
            margin-top: -3rem;
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
            max-width: 400px; border: 1px solid #fff;
        }

        body.dark-mode .popup {
            background-color: cadetblue;
        }

        .popup.show {
            display: block;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        .toggle-container {
            margin-left: 83rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            width: 1rem;
        }
        #theme-toggle {
            padding: 0.5rem 1rem;
            background-color: white; color: black; font-weight: bold; font-size: 0.8rem;
            border: solid black; border-radius: 20px; cursor: pointer; transition: background-color 0.3s, color 0.3s;
            margin-left: 45rem; width: 8.7rem;
             font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        a{
            margin-left: 2rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: x-large;
        }

        .terug{
            margin-left: 2rem;
        color: #007BFF;

        font-size: 1rem;}

        .d{
            height: 7rem;}

        @media screen and (min-width: 320px) and (max-width: 1024px) {

            header {
                width: 100%; margin-left: 0; padding: 10px;
            }

            header h1 {
                font-size: 2rem; margin-top: 0;
            }

            .content {
                padding: 10px;
            }

            .content button {
                width: 100%; font-size: 1.5rem;
                padding: 15px;
            }

            #theme-toggle {
                margin-left: 0; margin-top: 10px; width: 100%;
            }

            .popup {
                width: 100%; max-width: 100%;
            }

            footer .terug {
                display: block; text-align: center;
                font-size: 1rem; margin-top: 20px;
            }
        }
    </style>

    <?php
    $servername = "sql211.infinityfree.com";
    $username = "if0_37327165";
    $password = "edKK6Cnyx66e";
    $dbname = "if0_37327165_rama";


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
         echo '<a href="data:application/pdf;base64,' . base64_encode($row['cv_file']) . '" download="CV">Download mijn CV</a>';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</head>
<body class="light-mode">
<header>
    <h1>Rama Mari</h1>
    <button id="theme-toggle" onclick="toggleTheme()">Dark/light mood</button>
</header>

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
</div>
<div class="d">

</div>
<footer><a class="terug" href="index.php" target="_blank"> TERUG NAAR HOMEPAGINA</a></footer>
<script>
    function toggleTheme() {
        const body = document.body;
        body.classList.toggle("dark-mode");

        const themeToggle = document.getElementById("theme-toggle");
        if (body.classList.contains("dark-mode")) {
            themeToggle.textContent = "Dark/light mood";
        } else {
            themeToggle.textContent = "Dark/light mood";
        }
    }
    function togglePopup(popupId) {
        const popup = document.getElementById(popupId);
        popup.classList.toggle("show");
    }
</script>
</body>
</html>
