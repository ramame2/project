<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}
?>

        <?php

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
</html>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mijnportfolio</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <style>

     h1{
         font-size: 3rem;
     margin-left: 33rem}
     h2{
         font-size: x-large;}
     body{
         background-image:url(https://img.freepik.com/free-vector/abstract-blue-light-pipe-speed-zoom-black-background-technology_1142-9530.jpg);
         background-repeat:repeat;
         background-size:cover;}

     .container1
     {width:100%; height: 6rem; display:flex;
         justify-content: space-between; position:relative;
         row-gap: 4rem;}

     h1{
         font-size: 4rem;
         margin-left: 30.5rem; margin-top: 0.5rem;
         color: #e6dcdc;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}


     h2{
         margin-left: 2rem;
         font-size: larger; position:relative;
         color: antiquewhite;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
     }

     .items{
         margin-top:2rem; margin-right: -22rem;
         display: flex; justify-content: space-between;
         gap: 50px; font-size: large; color: black; position:initial;}

     .container2{
         width: 100%;display: grid;
         grid-template-columns: auto auto auto;
         gap: 0.5rem;; margin-top: 3rem;}

     img{
         width:21rem; height: 26rem;
         border-radius: 10rem;
         margin-left: 3rem; margin-bottom: 1rem;}

     p{
         font-size:large ; color: antiquewhite;
         width: 3rem; inline-size: 60rem; margin-right: 30px;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}


     .Contact{
         color: antiquewhite; font-size: x-large;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}

     .over{
         color: antiquewhite; font-size: x-large;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}

     .projecten{
         color: antiquewhite; font-size: x-large;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}



     button{
         width: 7rem; margin-left: 1.8rem;
         border-radius: 2rem; height: 2rem;}

     button:hover{
         cursor: pointer;}


     h2{
         margin-left: 0.1rem; font-size: x-large;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; color: cadetblue;}

     .text{
         margin-left: 2rem;
         margin-top: 2.3rem;}


     .sociaal{
         width: 2rem; height: 2rem;
          margin-top: 8rem;
         margin-bottom: 1rem;
         display: flex; justify-content: space-between;
         gap: 0.05rem;padding: 10px;}

     .face{
         width: 35px;height: 35px;}

     .insta{
         width: 35px;height: 35px;}

     .linked{
         width: 35px;height: 35px}

     .tik{
         width: 35px;height: 35px}

     .contact-info {
         text-align: center;
         color: #ffffff;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
         margin-left: 11rem;
     }

     .contact-info a {
         color: cadetblue; text-decoration: none;
         font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
         font-size: 1rem;
     }
     .contact-info a:hover {
         text-decoration:underline;

     }

     @media screen and (min-width: 320px) and (max-width: 1024px) {
         h1 {
             font-size: 2.5rem; margin-left: 1rem; text-align: center;
         }

         .container1 {flex-direction: column; align-items: center;
         }

         .items { flex-direction: column; align-items: center; margin-right: 0;gap: 0.5rem;
         }

         .container2 {
             grid-template-columns: 1fr;
         }

         img {width: 100%; height: auto; max-width: 15rem;
             border-radius: 5rem; margin: 0 auto;
         }

         .contact-info { margin: 1rem auto; text-align: center;
         }

         p {font-size: 1rem; margin: 0 1rem;
         }

         button {width: 100%; max-width: 200px;margin: 0.5rem auto;
         }
     }
    </style>


</head>
<body>
<header>
<div class="container1">

 <h1><strong>Rama Mari</strong></h1>




<div class="items">
    <a  class="Contact" href="me2.php" target="_blank"><strong>Contact</strong></a>
    <a class="over" href="over.php" target="_blank"></strong>Over<strong></a>
    <a class="projecten"  href="projecten.php" target="_blank"><strong>Projecten</strong></a>
</div>
</div>

</header>
<div class="container2">
    <img src="rm.jpg" alt="">


<div class="text">
<h2>Hello,<br>
    welcome in my portfolio</h2>
 <br> <p>Ik ben Rama Mari, en dit is mijn portfolio.<br>
        Ik ben iemand die van het leven houdt, ambitieus <br>
        is, serieus is in mijn alle taken en werk, en ik hou  ervan <br>
        om al mijn taken op de tijd af te ronden. Het productiviteit <br>
        verhoogt eigenlijk altijd mijn geluksgevoel en positieve energie.</p>


        <div class="sociaal">
    <a href="https://www.facebook.com/engrama.merea" target="_blank"><img class="face" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSskbpEX-jqvW2ZslvzHgvtEKykib-oCRvCPA&s" alt="" ></a>
    <a href="https://www.linkedin.com/legal/professional-community-policies?openinweb=true"><img class="linked" src="https://banner2.cleanpng.com/20180417/ifw/avfn2u8al.webp" alt=""></a>
    <a href=""><img class="insta" src="https://w7.pngwing.com/pngs/910/192/png-transparent-instagram-instagram-new-design-liner-round-social-media-instagram-new-icon.png" alt=""></a>
    <a href="https://www.tiktok.com/@roro.mari22?_t=8q5sxdJ7iMd&_r=1" target="_blank"><img class="tik" src="https://w7.pngwing.com/pngs/483/249/png-transparent-tiktok-icon-thumbnail.png" alt=""></a>

    </div>
</div>


</div>




<footer>

        <div class="contact-info">
            <p>Email: <a href="mailto:eng.rama.me@gmail.com">eng.rama.me@gmail.com</a></p>
            <p>Telefoonnummer: <a href="tel:0685344454">0685344454</a></p>
        </div>
    </footer>


</body>
</html>






