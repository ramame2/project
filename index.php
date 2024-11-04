
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
    <link rel="stylesheet" href="index.css">
    <link rel="icon" href="my.ico" type="image/x-icon">

</head>
<style>

        h1 {
            width: 8.8em;
            height: 5rem;
            font-size: 3.6rem;
            text-align: center;
            color: #fff108;
            font-family: Cambria, serif;
            margin-top: 1rem;
            margin-left: 1rem;
            border-radius: 7rem;
        }

        .container1 {
            width: 50%%;
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
            width: 80%;
            justify-items: center;
            display: grid;
            grid-template-columns: auto auto;
            gap: 2rem;
            padding: 2rem 0;
            margin:auto 0;

        }

        #text-container{
            margin: auto;
            color: #0f3efb;
            font-size: 2.5rem;
            margin-bottom: 1.5rem;

        }

        .mypic {
            justify-items: center;
            width:63%;
            height: 70%;
            border: #4a7fe2 2px solid;
            border-radius: 8rem;
            margin-top: -3rem;
            margin-left: auto;
        }

       .text{
           width:78%;
           font-size: 1.4rem;
           color: #dacfcf;
           font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;

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
                font-family: "Arabic Typesetting";

            }

            .container3 {

                margin-left: 27rem;
                margin: auto auto;
                width: 80%;}

            .p2{
                font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                font-size: 1.4rem;
                color: white;

            }



            .collapse-button {
                position: fixed;
                top: 1rem;
                right: 7rem;
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
                background-color: rgb(108, 102, 102);
                position: fixed;
                top: 85px;
                right: 62px;
                border: 1px solid rgba(221, 221, 221, 0.27);
                border-radius: 8px;
                width: 165px;
                height: 165px;
                box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
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


            body {
                background-image: url(bk.jpg);
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


            @media only screen and (max-device-width: 500px) {
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


                img {

                    border: #ddf405 1px solid;
                    border-radius: 8rem;

                }


                h3 {
                    color: #dbe817;
                    font-size: 2rem;
                    margin-left: 1rem;
                    font-family: "Arabic Typesetting";

                }


                .p2{
                    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
                    font-size: 1.4rem;
                    color: white;
                    margin-top: -0.5rem;
                    margin-left: 1rem;

                }


                .collapse-button {
                    position: fixed;
                    top: 0rem;
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
                    box-shadow: 0px 8px 16px rgba(152, 144, 43, 0.27);
                    z-index: 999;
                    overflow: hidden;
                }

                .container2 {
                    margin-left: 0rem;
                    width: 100%;
                    height: 28rem;
                }

                .mypic {

                    border: #4a7fe2 1px solid;
                    margin-top: -2rem;
                    margin-left: 8rem;
                    width: 14rem;
                    height: 14rem;
                }

                p {
                    text-align: left;
                    font-size: 1.3rem ;
                    margin-top: 12.9rem;
                    margin-left: -21rem;
                    width: %;
                }

                #text-container{
                    margin: auto;
                    color: #0f3efb;
                    font-size: 1.5rem;
                    margin-bottom: 1.5rem;

                }
                h1{
                    justify-items: center;
                    margin-top: 0.5rem;
                    font-size: x-large;
                    height: 2.5rem;
                    width: 10.5rem;

                }


            }
        }
</style>

<div class="container1">
    <h1>Rama Mari</h1>
</div>



</head>

<body>

<div id="text-container"></div>

<script>
    const text = "Hello!! Welcome to my portfolio!";
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




<div class="container2">
    <img class="mypic" src="rm.jpg" alt="Rama Mari">

    <div class="text">

        <p>Ik ben Rama Mari, en dit is mijn portfolio.<br>
            Ik ben ambitieus, serieus in mijn taken en werk.<br>
            Ik hou ervan om al mijn taken op tijd af te ronden.<br>
            Productiviteit verhoogt altijd mijn geluksgevoel en positieve energie.</p>
    </div>
</div>




    <div class="container3">
        <h3> Welke secties bevat mijn portfolio?</h3>
        <p class="p2">
            <strong>Over-pagina</strong>:  Hier staan alle persoonlijke informatie over mij.<br>
            Mijn CV is hier ook te vinden, en er is de mogelijkheid<br>
            voor u om mijn CV te downloaden.<br><br><br>

            <strong>Contactpagina</strong>:  via deze pagina kunt u contact met mij opnemen, <br>
            ik kan dan ue berichten kijken en beantwoorden.<br><br><br>

            <strong>Projectenpagina</strong>:  Op deze pagina presenteer ik de projecten die ik eerder heb gemaakt.
            Ik kan ook meer toekomstige projecten toevoegen als ik er meer heb. Daarnaast is er een
            sectie met informatie over alle projecten.
            <br> <br> <br>
        </p>


    </div>
<br><br><br>
</div>
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




