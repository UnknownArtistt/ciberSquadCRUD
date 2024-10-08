<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erregistratu - CiberSquad</title>
    <link rel="stylesheet" href="css/styles_register.css"> <!-- CSS dokumentua -->
</head>
<body class="register-body"> <!-- Login klasea -->
    <!-- Menua -->
    <nav class="navbar">
        <ul>
            <li><a href="index.php">Hasierara</a></li> <!-- Hasierara itzuli -->
            <li><a href="saioa_hasi.php">Saioa Hasi</a></li> <!-- Logeatzera joan -->
        </ul>
    </nav>

    <!-- Edukia -->
    <div class="register-container"> <!-- Erregistroaren klasea-->
        <img src="media/cybersquad_logo.png" class="logo" alt="CiberSquad Logo">
        <h2>Erregistratu Gure Akademian -></h2>

        <!-- Errore mezua erakutsi-->
        <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
            <p style="color: green; font-weight: bold;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php elseif (isset($_GET['status']) && $_GET['status'] === 'error'): ?>
            <p style="color: red; font-weight: bold;"><?php echo htmlspecialchars($_GET['message']); ?></p>
        <?php endif; ?>

        <!-- Erregistro formularioa -->
        <form action="model/erregistratu_prozesatu.php" method="POST" class="register-form">
            
            <label for="ikasle_izena">Zure Izena:</label>
            <input type="text" id="ikasle_izena" name="ikasle_izena" required>

            <label for="ikasle_abizena">Zure Abizena:</label>
            <input type="text" id="ikasle_abizena" name="ikasle_abizena" required>

            <label for="email">Zure Email-a:</label>
            <input type="email" id="email" name="email" required>

            <label for="erabiltzaile_izena">Erabiltzaile Izena:</label>
            <input type="text" id="erabiltzaile_izena" name="erabiltzaile_izena" required>

            <label for="password">Pasahitza:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Erregistratu</button>
        </form>
    </div>
</body>
</html>
