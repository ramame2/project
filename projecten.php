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
    <title>Projecten</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
<body>
<h1>Rama Mari</h1>
<button id="theme-toggle" onclick="toggleTheme()">Dark/light Mode</button>

</body>

<?php
// Database connection
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            display: flex; flex-direction: column;
            gap: 0.01rem; align-items:flex-start;
            padding: 0.5rem;
        }
        .project {
            width: 30%; margin-left: 32rem;
            border: 1px solid gray; padding: 1rem;
            background-color: #f9f9f9; border-radius: 8px;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .project-btn {margin-top: 1rem; margin-left:5.8rem ;
            padding: 0.5rem 5.5rem; font-size: 1rem;
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
            margin-left: 80rem; border-radius: 3rem;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 1rem; margin-top: -1rem;

        }
        .terug {margin-left: 1rem;
            color: #007BFF;

            font-size: 0.8rem;}
        @media screen and (min-width: 320px) and (max-width: 1024px) {
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
                width: 100%;
            }
        }
    </style>
</head>
<footer><a class="terug" href="index.php" target="_blank"> TERUG NAAR HOMEPAGINA</a></footer>
<body>

<script>
    function toggleTheme() {
        const body = document.body;
        body.classList.toggle("dark-mode");

        const themeToggle = document.getElementById("theme-toggle");
        if (body.classList.contains("dark-mode")) {
            themeToggle.textContent = "light mode";
        } else {
            themeToggle.textContent = "Dark mode";
        }
    }

</script>

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
