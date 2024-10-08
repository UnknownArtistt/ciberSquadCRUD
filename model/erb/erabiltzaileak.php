<?php

// Sesioa hasi eta admin den zihurtatu
session_start();
include '../../konexioa.php';

if (!isset($_SESSION['erabiltzaile_izena']) || $_SESSION['administraria'] != 0) {
    // Login-era bueltatu admin ez bada
    header('Location: ../saioa_hasi.php');
    exit();
}

// Konexioa hasi
$conn = konektatu();

// Erabiltzaile guztiak jasotzeko sententzia
$sql = "SELECT * FROM erabiltzaileak";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erabiltzaile Panela</title>
    <link rel="stylesheet" href="styles_erabiltzaileak.css">
</head>
<body>
    
    <nav class="navbar">
        <ul>
            <!-- <li><a href="../../administrazioa.php">Hasiera</a></li> --> <!-- Hasierara bueltatu -->
            <li><a href="../iks/ikasleak.php">Ikasleak</a></li> <!-- Ikasleen panelera joan -->
            <li><a href="../erb/erabiltzaileak.php">Erabiltzaileak</a></li> <!-- Erabiltzaileen panelera joan -->
            <li><a href="../ere/erregistro_eskaerak.php">Erregistro Eskaerak</a></li> <!-- Erregistro eskaeretara joan -->
            <li><a href="../krs/kurtsoak.php">Kurtsoak</a></li> <!-- Kurtsoen panelera joan -->
            <li><a href="../logout.php">Saioa Itxi</a></li> <!-- Panelera joan -->
        </ul>
    </nav>

    <div class="content">

    <!-- Goiburuak -->
    <h2>Erabiltzaileak</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>Erabiltzaile Izena</th>
                <th>Ikasle Id</th>
                <th>Izena</th>
                <th>Abizena Kurtsoa</th>
                <th>Email</th>
                <th>Administraria</th>
                <th>Pasahitza</th>
                <th>Aukerak</th>
            </tr>

            <?php
            // Datuak erakutsi
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['erabiltzaile_izena'] . "</td>";
                    echo "<td>" . $row['ikasle_id'] . "</td>";
                    echo "<td>" . $row['ikasle_izena'] . "</td>";
                    echo "<td>" . $row['ikasle_abizena'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['administraria'] . "</td>";
                    echo "<td>" . $row['pasahitza'] . "</td>";
                    echo "<td>";

                    // Ezabatzeko botoia
                    echo "<form method='POST' action='delete_erb.php' style='display:inline-block;'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='delete-btn'>Ezabatu</button>";
                    echo "</form>";

                    // Eguneratzeko botoia
                    //echo "<form action='update_ikaslea.php' method='get' style='display:inline-block;'>";
                    //echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    //echo "<button type='submit' class='update-btn'>Eguneratu</button>";
                    //echo "</form>";

                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Ez daude ikasleak erregistratuta.</td></tr>";
            }
            ?>
        </table>

        <!-- Kurtso berriaren formularioa erakutsi -->
        <button class="create-btn" onclick="document.getElementById('new-user-form').style.display='block'">
            Erabiltzaile Berria Sortu
        </button>

        <!-- Kurtso berri sortzeko datuak jaso -->
        <div id="new-user-form" style="display: none;">
            <h3>Kurtso Berria Sortu</h3>
            <form method="POST" action="create_ikaslea.php">

                <label for="erb_izena">Erabiltzaile Izena:</label>
                <input type="text" id="erb_izena" name="erb_izena" required>

                <label for="izena">Ikasle Izena:</label>
                <input type="text" id="izena" name="izena" required>

                <label for="abizena">Ikasle Abizena:</label>
                <input type="text" id="abizena" name="abizena" required>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>

                <button type="submit" class="create-btn">Sortu</button>
            </form>
        </div>

    </div>
    
</body>
</html>
