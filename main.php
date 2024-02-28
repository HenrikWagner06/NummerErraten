<?php
echo "<h1>Errate die Nummer</h1>";
session_start();
if (!isset($_SESSION["counter"])) {
    $_SESSION["counter"] = 0;
}

if (isset($_POST["number"])) {
    $zahl = $_POST["number"];
    if (!isset($_SESSION["würfel"])) {
        $_SESSION["würfel"] = rand(0, 100);
    }

    $würfel = $_SESSION["würfel"];
    if ($zahl == $würfel) {
        echo "<p class='text'>Glückwunsch! Sie haben gewonnen.<br> Die Zahl war: $würfel</p>";
        $_SESSION["counter"] = 0;
        session_destroy();
        $_SESSION["counter"] = 0;
    } elseif ($zahl > $würfel) {
        $_SESSION["counter"]++;
        echo "<br><p class='text'>Kleinere Zahl eingeben!</p>";
    } else {
        $_SESSION["counter"]++;
        echo "<br><p class='text'>Größere Zahl eingeben!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Errate die Nummer</title>
<link rel="stylesheet" href="main.css">
</head>
<body>
<form action="main.php" method="post">
<div class="container">
    <div class="number-container">
        <input class="number" type="number" name="number" placeholder="Number between 0-100"><br><br>
        <input class="submit" type="submit">
        <p>Versuche:<?php echo "{$_SESSION['counter']}"; ?></p>
    </div>
</div>
</form>
</body>
</html>
