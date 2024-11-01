<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $score = intval($_POST['score']);

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO scores (score) VALUES (:score)");
    $stmt->bindParam(':score', $score);

    if ($stmt->execute()) {
        echo "Score saved successfully";
    } else {
        echo "Error: Could not save the score.";
    }
}
// Fetch the highest score
$stmt = $conn->query("SELECT MAX(score) AS high_score FROM scores");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo $row['high_score']
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Game</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header">
    <button id="start-game">Start Game</button>
    <button id="end-game" style="display: none;">End Game</button>
</div>
<div id="game-container">
    <h1>Bubble Game</h1>
    <div id="score">Score: 0</div>
</div>
<script src="game.js"></script>
</body>
</html>


<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(135deg, #ffcc33, #ff66cc, #66ffcc, #3399ff);
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        overflow: hidden; /* Prevent scrollbars */
    }

    #header {
        width: 100%;
        display: flex;
        justify-content: center;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 10px;
    }

    #header button {
        margin: 0 10px;
        padding: 10px 20px;
        background-color: #6200ea;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
    }

    #header button:hover {
        background-color: #3700b3;
    }

    #game-container {
        text-align: center;
        flex: 1;
    }

    .bubble {
        position: absolute;
        width: 50px;
        height: 50px;
        background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.2), rgba(97, 218, 251, 0.5));
        border-radius: 50%;
        cursor: pointer;
        box-shadow: inset -10px -10px 20px rgba(255, 255, 255, 0.5), inset 10px 10px 20px rgba(0, 0, 0, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.5);
        opacity: 0.7;
    }

</style>

<script>
    let score = 0;
    let gameInterval;

    document.getElementById('start-game').addEventListener('click', startGame);
    document.getElementById('end-game').addEventListener('click', endGameManually);
    window.onload = loadHighScore;

    function startGame() {
        score = 0;
        document.getElementById('score').innerText = 'Score: ' + score;
        document.getElementById('start-game').style.display = 'none';
        document.getElementById('end-game').style.display = 'block';
        gameInterval = setInterval(createBubble, 2000); // Slower bubble creation
        setTimeout(endGame, 30000); // End game after 30 seconds
    }

    function endGameManually() {
        endGame();
    }

    function createBubble() {
        const bubble = document.createElement('div');
        bubble.classList.add('bubble');
        bubble.style.left = Math.random() * 100 + 'vw';
        bubble.style.top = Math.random() * 100 + 'vh';
        bubble.style.width = Math.random() * 30 + 30 + 'px'; // Random bubble size
        bubble.style.height = bubble.style.width;
        bubble.style.backgroundColor = getRandomColor(); // Random color
        bubble.addEventListener('click', popBubble);
        document.body.appendChild(bubble);

        moveBubble(bubble); // Start movement

        setTimeout(() => bubble.remove(), 10000); // Remove bubble after 10 seconds
    }

    function moveBubble(bubble) {
        let dx = (Math.random() - 0.5) * 2; // Random horizontal speed
        let dy = (Math.random() - 0.5) * 2; // Random vertical speed

        function updatePosition() {
            const rect = bubble.getBoundingClientRect();
            if (rect.left <= 0 || rect.right >= window.innerWidth) dx = -dx; // Bounce horizontally
            if (rect.top <= 0 || rect.bottom >= window.innerHeight) dy = -dy; // Bounce vertically

            bubble.style.left = rect.left + dx + 'px';
            bubble.style.top = rect.top + dy + 'px';

            requestAnimationFrame(updatePosition);
        }

        requestAnimationFrame(updatePosition);
    }

    function popBubble(event) {
        score++;
        document.getElementById('score').innerText = 'Score: ' + score;
        event.target.remove();
    }

    function endGame() {
        clearInterval(gameInterval);
        document.querySelectorAll('.bubble').forEach(bubble => bubble.remove());
        saveScore(score);
        loadHighScore(); // Load high score after the game ends
        document.getElementById('end-game').style.display = 'none';
        document.getElementById('start-game').style.display = 'block';
    }

    function saveScore(score) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'save_score.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('score=' + score);
    }

    function loadHighScore() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_high_score.php', true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                document.getElementById('high-score').innerText = 'High Score: ' + xhr.responseText;
            }
        };
        xhr.send();
    }

    function getRandomColor() {
        const letters = '0123456789ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }


</script>