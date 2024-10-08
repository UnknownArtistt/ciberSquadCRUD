<?php
// Sesioa hasi
session_start();
include '../../konexioa.php'; // Konexioa gehitu

// Konexioa egin
$conn = konektatu();

// Erregistro eskaera guztiak gehitu
$sql = "SELECT * FROM erregistro_eskaerak";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erregistro Eskaera Panela - CiberSquad</title>
    <link rel="stylesheet" href="styles_erregistro_eskaerak.css">
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="../../administrazioa.php">Hasiera</a></li> <!-- Hasierara bueltatu -->
            <li><a href="../iks/ikasleak.php">Ikasleak</a></li> <!-- Ikasleen panelera -->
            <li><a href="../erb/erabiltzaileak.php">Erabiltzaileak</a></li> <!-- Erabiltzaileen panelera -->
            <li><a href="erregistro_eskaerak.php">Erregistro Eskaerak</a></li> <!-- Erregistro eskaeretara -->
            <li><a href="../krs/kurtsoak.php">Kurtsoak</a></li> <!-- Kurtsoen panelera -->
            <li><a href="../logout.php">Saioa Itxi</a></li> <!-- Saioa itxi -->
        </ul>
    </nav>

    <div class="content">
        <!-- Goiburuak -->
        <h2>Erregistro Eskaerak</h2>
        <table border="1">
            <tr>
                <th>Izena</th>
                <th>Abizena</th>
                <th>Email</th>
                <th>Erabiltzaile Izena</th>
                <th>Ekintza</th>
            </tr>

            <?php
            // Erregistro eskaeren datuak bistaratu
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['ikasle_izena'] . "</td>";
                    echo "<td>" . $row['ikasle_abizena'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['erabiltzaile_izena'] . "</td>";

                    // Erabiltzaileari alta eman
                    echo "<td><form method='POST' action='alta_prozesatu.php'>";
                    echo "<input type='hidden' name='ikasle_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit'>Alta Eman</button>";
                    echo "</form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Ez dago erregistro eskaerarik.</td></tr>";
            }
            ?>

        </table>
    </div>

    <?php $conn->close(); ?>
</body>
</html>
