<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>:D</title>
    <style>
        *{
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-weight:1000;
        }
        body{
            background: rgb(214,0,255);
            background: linear-gradient(90deg, rgba(214,0,255,1) 0%, rgba(0,146,255,1) 100%);
        }
        h1{
            color:white;
            text-align:center;
            font-size:45px;
        }
        
        .number-container{
            top: 20%;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
        }

        .number{
            width: 800px;
            height: 50px;
            border-radius: 20px;
            border: 2px solid white;
            color: grey;        
        }
        .submit{
            height: 50px;
            width: 805px;
            background: white;
            border-radius: 20px;
            border: 2px solid white;
            color: grey;
        }  
        .text{
            color:white;
            text-align:center;
            margin-top:320px;
            font-size:35px
        }     

    </style>
</head>
<body>
    <h1>Errate die Nummer</h1>

<form action="main.php" method="post">
    <div class="container">
        <div class="number-container">
            <input class="number" type="number" name="number" placeholder="Zahl eingeben"><br><br>
            <input class="submit" type="submit">
        </div>
    </div>
</form>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["number"])) {
    $zahl = $_POST["number"];

    if (!isset($_SESSION["würfel"])) {
        $_SESSION["würfel"] = rand(0, 100);
    }

    $würfel = $_SESSION["würfel"];

    if ($zahl == $würfel) {
        echo "<p class='text'>Glückwunsch! Sie haben gewonnen.<br>
              Die Zahl war: $würfel</p>";

        session_destroy();
    } elseif ($zahl > $würfel) {
        echo "<br><p class='text'>Kleinere Zahl eingeben!</p>";
    } else {
        echo "<br><p class='text'>Größere Zahl eingeben!</p>";
    }
}
?>
</body>
</html>
