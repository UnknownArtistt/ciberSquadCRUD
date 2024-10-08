<?php
// Sesioa hasi eta admin den zihurtatu
session_start();
if (!isset($_SESSION['erabiltzaile_izena']) || $_SESSION['administraria'] != 0) {
    // Login-era bueltatu admin ez bada
    header('Location: saioa_hasi.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrazioa - CiberSquad</title>
    <link rel="stylesheet" href="css/styles_admin.css"> <!-- CSS admin-->
</head>
<body>
    <!-- Admin navbar-a-->
    <nav class="admin-navbar">
        <ul>
            <li><a href="administrazioa.php">Hasiera</a></li> <!-- Paneleko orri nagusira bueltatu -->
            <li><a href="model/iks/ikasleak.php">Ikasleak</a></li> <!-- IKasleetara joan -->
            <li><a href="model/erb/erabiltzaileak.php">Erabiltzaileak</a></li> <!-- Erabiltzaile panelera joan -->
            <li><a href="model/ere/erregistro_eskaerak.php">Erregistro Eskaerak</a></li> <!-- Erregistro eskaeretara bueltatu-->
            <li><a href="model/krs/kurtsoak.php">Kurtsoak</a></li> <!-- Kurtsoetara joan -->
            <li><a href="model/logout.php">Saioa Itxi</a></li> <!-- Sesioa itxi eta login-era joan -->
        </ul>
    </nav>

    <!-- Edukia -->
    <div class="admin-container">
        <h1>Ongi etorri Administrazio Panelera, <?php echo $_SESSION['erabiltzaile_izena']; ?>!</h1>
        <p>Hemen zure administrazio funtzioak kudeatu ditzakezu.</p>
    </div>
</body>
</html>
