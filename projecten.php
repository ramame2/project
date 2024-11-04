

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}
?>
<!DOCTYPE html>
<html lang="nl">

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <title>Projecten</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <div id="text-container"></div>
<body>
<button id="theme-toggle" onclick="toggleTheme()">🌙🔆</button>



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

$sql = "SELECT * FROM project_descriptions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $projectNumber = 1;
    echo "<div class='project-ladder'>";
    while ($row = $result->fetch_assoc()) {
        echo "<div class='project'>";
        echo "<h2>" . htmlspecialchars($row['project_title']) . "</h2>";
        echo "<p>" . htmlspecialchars($row['description']) . "</p>";


        if ($projectNumber === 1) {
            echo "<button class='project-btn' onclick='window.location.href=\"game.php\"'>Project 1</button>";
        } else {
            echo "<button class='project-btn' onclick='openProject(" . $projectNumber . ")'>Project " . $projectNumber . "</button>";
        }

        echo "</div>";
        $projectNumber++;
    }
    echo "</div>";
} else {
    echo "<p>No projects found.</p>";
}

$conn->close();
?>

 <style>
        body {
            background-color: #fbf9f9;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        h1 {
            text-align: center; margin: 20px 0;
            font-size: 2.3rem; color: cadetblue;
        }

        .project-ladder {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.01rem;
            padding: 0.5rem;
            width: 50%;
            margin: auto;
        }

        .project {
            width: 100%;
            justify-items: center;
            margin: 1rem;
            border: 1px solid gray;
            padding: 1rem;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 217, 255, 0.79);
            border-radius: 8px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .project-btn {margin-top: 1rem; margin-left:0 ;
            padding: 0.5rem 8rem; font-size: 1rem;
            background-color: cadetblue; color: white; border: none; border-radius: 5px;
            cursor: pointer; transition: background-color 0.3s;
        }
        .dark-mode {
            background-color: #1e1e1e;
            color: #f0f0f0;
        }
        .dark-mode .project {
            background-color: #2e2e2e;
            border-color: #444;
        }
        .dark-mode .project-btn {
            background-color: #444;
            color: #f0f0f0;

        }
        .dark-mode .project-btn:hover {
            background-color: #555;
        }
        #theme-toggle{
            width: 3rem;
            margin-left: 4rem; border-radius: 3rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 0.91rem; margin-top: -1rem;

        }

        .terug {
            display: block;
            text-align: center;
            font-size: 1rem;
            margin-top: 0;
            margin-left: -6.5rem;
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
            top: 65px;
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
            font-size: 1rem;
            margin: 0.5rem;
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




        @media screen and (min-width: 320px) and (max-width: 500px) {
            h1 {
                font-size: 1.8rem;
            }
            .project-ladder {
                padding: 0.2rem;
            }
            .project {
                width: 90%; margin-left: 0; margin-bottom: 1rem;
            }
            .project-btn { width: 100%; margin-left: 0;
                padding: 0.5rem;
            }
            #theme-toggle {
                margin-left: 0; margin-top: 1rem;
                width: 10%;
            }
            .container {
                padding: 15px;
                width: 90%;
                margin: 20px auto;
            }

            #theme-toggle {
                font-size: 0.9rem;

            }

            footer {
                position: fixed;
                background-color: rgba(51, 51, 51, 0.56);
                color: #f0f0f0;
                padding: 0.3rem 0;
                font-size: 0.5rem;

            }

            .sociaal {
                display: flex;
                gap: 0.6rem;
                margin-top: 0.5rem;
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

            footer p {
                text-align: center;
                font-size: 1rem;
                margin-top: 0.8rem;


            }

            #text-container {
                justify-content: left;
                font-size: 1.4rem;
                margin-top: 1.5rem;
                margin-left: 4rem;

            }

            .terug {
                align-items: center;
                margin-left: 0.6rem;
                font-size: 0.9rem;
                margin-top: 0.8rem;
                color: #066ddc;
            }


        }
    </style>
</body>
<br><br><br>
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
</html>
