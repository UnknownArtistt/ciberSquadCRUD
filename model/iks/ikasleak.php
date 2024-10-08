<?php
// Sesioa hasi eta admin den zihurtatu
session_start();
include '../../konexioa.php'; // Konexioa gehitu

if (!isset($_SESSION['erabiltzaile_izena']) || $_SESSION['administraria'] != 0) {
    // Login-era bueltatu admin ez bada
    header('Location: ../saioa_hasi.php');
    exit();
}

// Konekzioa egin
$conn = konektatu();

// Kurtso guztiak jaso
$sql = "SELECT * FROM ikasleak";
// Query-a exekutatu
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ikasle Panela</title>
    <link rel="stylesheet" href="styles_ikasleak.css">
</head>
<body>

    <nav class="navbar">
        <ul>
            <li><a href="../../crud/administrazioa.php">Hasiera</a></li> <!-- Hasierara joan -->
            <li><a href="ikasleak.php">Ikasleak</a></li> <!-- Ikasleen panelera joan -->
            <li><a href="../erb/erabiltzaileak.php">Erabiltzaileak</a></li> <!-- Erabiltzaileen panelera joan -->
            <li><a href="../ere/erregistro_eskaerak.php">Erregistro Eskaerak</a></li> <!-- Erregistro eskaeretara joan -->
            <li><a href="../krs/kurtsoak.php">Kurtsoak</a></li> <!-- Kurtsoen panelera joan -->
            <li><a href="../logout.php">Saioa Itxi</a></li> <!-- Saioa itxi -->
        </ul>
    </nav>

    <div class="content">
        <!-- Goiburuak -->
    <h2>Ikasleak</h2>
        <table>
            <tr>
                <th>Id</th>
                <th>Izena</th>
                <th>Abizena</th>
                <th>Email</th>
                <th>Matrikulatutako Kurtsoa</th>
                <th>Aukerak</th>
            </tr>

            <?php
            // Ikasle bakoitzaren datuak bistaratu
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['izena'] . "</td>";
                    echo "<td>" . $row['abizena'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['kurtso_id'] . "</td>";
                    echo "<td>";
                    // Botón de eliminar
                    echo "<form method='POST' action='delete_ikaslea.php' style='display:inline-block;'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='delete-btn'>Ezabatu</button>";
                    echo "</form>";

                    // Botón de actualizar
                    echo "<form action='update_ikaslea.php' method='get' style='display:inline-block;'>";
                    echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                    echo "<button type='submit' class='update-btn'>Eguneratu</button>";
                    echo "</form>";

                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Ez daude ikasleak erregistratuta.</td></tr>";
            }
            ?>
        </table>

        <!-- Kurtso berria sortzeko formularioa erakutsi -->
        <button class="create-btn" onclick="document.getElementsByClassName('new-student-form')[0].style.display='block'">
            Ikasle Berria Sortu
        </button>

        <!-- Kurtso berria sortu -->
        <div class="new-student-form" style="display: none;">
            <h3>Kurtso Berria Sortu</h3>
            <form method="POST" action="create_ikaslea.php">

                <label for="izena">Izena:</label>
                <input type="text" id="izena" name="izena" required>

                <label for="abizena">Abizena:</label>
                <input type="text" id="abizena" name="abizena" required>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" required>

                <button type="submit" class="create-btn">Sortu</button>
            </form>
        </div>

    </div>
    
</body>
</html>