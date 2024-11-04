<?php
$servername = "sql211.infinityfree.com";
$username = "if0_37327165";
$password = "edKK6Cnyx66e";
$dbname = "if0_37327165_rama";

try {
    // Create a PDO connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = htmlspecialchars($_POST['username']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Check if username already exists
        $stmt = $conn->prepare("SELECT COUNT(*) FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $userExists = $stmt->fetchColumn();

        if ($userExists) {
            echo "Username already exists. Please choose a different username.";
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $password);
            $stmt->execute();

            echo "Registration successful!";
        }
    }
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
</head>
    <style>
        body {
            background-color: rgba(18, 18, 18, 0.85);
            color: #e0e0e0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }


        .container {
            background-color: rgba(30, 30, 30, 0.84);
            padding: 80px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 217, 255, 0.79);
        }
        input, button {
            margin-bottom: 1rem;
            display: block;
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8rem;
        }
        button {
            margin: 0.7rem;
            background-color: rgba(95, 158, 160, 0.76);
            color: #fff;
            border: none;
            padding: 15px;
            border-radius: 20px;
            cursor: pointer;
        }
        button:hover {
            background-color:dodgerblue;
        }
        a {
            color:cadetblue;
        }
        h1{color: cadetblue;
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        font-size: 2.9rem;
        text-align: center;
        }
        p {
            font-size: 1rem;
            text-align: center;
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



        .sociaal {
            display: flex;
            justify-content: center;
            gap: 1.7rem;
            margin-top: 1rem;
            border-radius: 8rem;
            margin-top: 0rem;
            margin-left: 1rem;

        }
        img {
            justify-items: center;
            width: 63%;
            height: 70%;
            border: #4a7fe2 2px solid;
            border-radius: 8rem;
            margin-top: 0rem;
        }

        .sociaal img {
            width: 25px;
            height: 25px;
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



        @media screen and (max-width: 500px) {
            body {
                padding: 4rem;
                height: auto;
            }

            .container {
                margin-top: 10rem;
                padding: 45px;
                box-shadow: none; /* Remove shadow for simpler mobile display */
            }

            h1 {
                font-size: 1.5rem;
                text-align: center;
            }

            input, button {
                font-size: 1rem;
                padding: 8px;
            }

            button {
                max-width: 200px;
                margin: 10px auto;
            }

            p {
                font-size: 0.9rem;
                text-align: center;
            }
            footer {
                position: fixed;
                background-color: rgba(51, 51, 51, 0.56);
                color: #f0f0f0;
                padding: 0.5rem 0rem;
                font-size: 0.5rem;

            }

            .sociaal {
                display: flex;
                gap: 1rem;
                margin-top: 0rem;
            }




        }

    </style>

<body>


<div class="container">
    <h1>Registreren</h1>
    <form method="POST" action="">
        <label for="password">Gebruikersnaam:</label>
        <input type="text" name="username" required>

        <label for="password">Wachtwoord:</label>
        <input type="password" name="password" required>

        <button type="submit">Registreren</button>
    </form>
    <p>Al een account? <a href="login.php">Log hier in</a>.</p>
</div>

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
