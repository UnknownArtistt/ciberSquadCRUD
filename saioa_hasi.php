<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saioa Hasi - CiberSquad</title>
    <link rel="stylesheet" href="css/styles_login.css"> <!-- CSS dokumentua binkulatu -->
</head>
<body class="login-body"> <!-- Login-erako klase espezifikoa -->
    <!-- Menua-->
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Hasierara</a></li> <!-- Hasierara itzuli -->
            <li><a href="erregistratu.php">Erregistratu</a></li>
        </ul>
    </nav>

    <!-- Eduki garrantzitsua -->
    <div class="login-container"> <!-- Login klasea -->
        <img src="media/cybersquad_logo.png" class="logo" alt="CiberSquad Logo">
        <h2>Saioa Hasi</h2>

        <!-- Errore mezua erakutsi -->
        <?php if (isset($_GET['error']) && $_GET['error'] == 'incorrect_password'): ?>
            <p style="color: red;">Pasahitza ez da zuzena.</p>
        <?php elseif (isset($_GET['error']) && $_GET['error'] == 'user_not_found'): ?>
            <p style="color: red;">Erabiltzailea ez da aurkitu.</p>
        <?php endif; ?>

        <!-- Login formularioa -->
        <form action="model/login_prozesatu.php" method="POST" class="login-form">
            <label for="erabiltzaile_izena">Erabiltzaile Izena:</label>
            <input type="text" id="erabiltzaile_izena" name="erabiltzaile_izena" required> 

            <label for="password">Pasahitza:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Saioa Hasi</button>
        </form>
    </div>
</body>
</html>
