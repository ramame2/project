
<?php
session_start(); // Start a new session

// Database connection
$servername = "sql211.infinityfree.com";
$username = "if0_37327165";
$password = "edKK6Cnyx66e";
$dbname = "if0_37327165_rama";

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Prepare SQL statement with parameterized query
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: index.php");
        exit;
    } else {
        $error_message = "Invalid username or password.";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: white;
            margin: 0;
            background-color: #1a1a1a;
            background-image: url("jj.jpg");
            background-size: cover;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        header {
            text-align: center;
            padding: 20px 0;
        }

        h1 {
            font-size: 4rem;
            color: #e8dd0b;
            margin: 0;
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
            color: #dbe817;
            font-size: 4rem;
            margin-left: 4rem;
            font-family: "Arabic Typesetting", serif;

        }

        .mypic {
            width: 100%;
            max-width: 299px;
            height: auto;
            border-radius: 80%;
            margin: 1rem;
            border: solid 0.2rem #0726f4;
        }

        .login-container {
            background-color: rgba(12, 10, 10, 0.8);
            color: #f0f0f0;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            width: 90%;
            margin: 20px auto;
        }

        .login-container input,
        .login-container button {
            width: 90%;
            padding: 12px;
            margin: 8px 0;
            border: none;
            border-radius: 5px;
        }

        .login-container button {
            width: 10rem;
            background-color: #0740fb;
            color: #ffffff;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .login-container button:hover {
            background-color: #13d7dd;
        }

        .login-container a {
            color: #091bed;
            text-decoration: none;
        }

        .login-container a:hover {
            text-decoration: underline;
        }

        .text {
            color: #fbf9f9;
            font-size: 1.3rem;
            text-align: left;
            margin: 1rem;
        }

        .container2 {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            text-align: left;
            margin-top: -40px;
        }

        h2 {
            color: #efef16;
        }

        #text-container {
            width: 100%;
            height: 3rem;
            font-size: 2rem;
            text-align: center;
            color: #076afd;
            font-family: "Lucida Bright", serif;
            margin-top: 2rem;
        }



        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 98%;
            background-color: rgba(51, 51, 51, 0.53);
            color: #f0f0f0;
            display: flex;
            justify-content: space-between;
            padding: 1rem 1rem;
            font-size: 0.9rem;
            box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
        }


        footer p {
            margin: 0.3rem;
            font-size: 1rem;
            color: #d1d1d1;
        }


        @media screen and (max-width: 500px) {
            h1 {
                font-size: 2.5rem;
            }

            .mypic {
                max-width: 145px;

            }

            .login-container {
                margin-top: 20px;
            }

            .text h2 {
                font-size: 1.3rem;
            }

            .text p {
                font-size: 1rem;
            }


            footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 98%;
                background-color: rgba(51, 51, 51, 0.53);
                color: #f0f0f0;
                display: flex;
                justify-content: space-between;
                padding: 0.2rem 0.5rem;
                font-size: 0.9rem;
                box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);
            }


            footer p {
                margin: 0;
                font-size: 1rem;
                color: #d1d1d1;
            }


            .sociaal {
                display: flex;
                gap: 0.8rem;
                margin-top: 0rem;
            }


        }

        }
    </style>
</head>
<body>
<header>
    <h1>Rama Mari</h1>
</header>

<div id="text-container"></div>

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

<div class="login-container">
    <form method="POST" action="">
        <label for="username">Gebruikersnaam:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Inloggen</button>
    </form>
    <?php if (isset($error_message)): ?>
        <p class="error" style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <p class="he">Heeft u geen account? <a href="register.php">Registreer hier</a></p>
</div>

<div class="container2">
    <img class="mypic" src="rm.jpg" alt="Profile Image">
    <div class="text">
        <h2>Hello,<br> welcome to my portfolio</h2>
        <p>
            Deze website biedt een compleet beeld van mijn persoonlijkheid en <br>
            werkstijl, waardoor u een goed inzicht krijgt in hoe we succesvol kunnen <br>
            samenwerken. U vindt hier alles wat u moet weten over mijn programmeervaardigheden en capaciteiten.
        </p>
    </div>
</div>
<br><br><br><br><br><br><br><br><br>

<footer>
    <div class="sociaal">
        <a href="https://www.facebook.com/engrama.merea" target="_blank"><img class="face" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSskbpEX-jqvW2ZslvzHgvtEKykib-oCRvCPA&s" alt="Facebook"></a>
        <a href="https://www.linkedin.com/legal/professional-community-policies?openinweb=true"><img class="linked" src="https://banner2.cleanpng.com/20180417/ifw/avfn2u8al.webp" alt="LinkedIn"></a>
        <a href="#"><img class="insta" src="https://w7.pngwing.com/pngs/910/192/png-transparent-instagram-instagram-new-design-liner-round-social-media-instagram-new-icon.png" alt="Instagram"></a>
        <a href="https://www.tiktok.com/@roro.mari22?_t=8q5sxdJ7iMd&_r=1" target="_blank"><img class="tik" src="https://w7.pngwing.com/pngs/483/249/png-transparent-tiktok-icon-thumbnail.png" alt="TikTok"></a>
        <a href="https://github.com/ramame2" target="_blank"><img class="github" src="github.png" alt="Github"></a>
    </div>
    <p>&copy; 2024 Rama Mari</p>
</footer>

</body>
</html>
