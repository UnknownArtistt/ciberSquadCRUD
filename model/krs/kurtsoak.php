<?php
// Sesioa hasi
session_start();
include '../../konexioa.php'; // Konexioa gehitu
include '../obj/kurtsoa.php'; // Kurtsoa klasea gehitu

// Konexioa egin
$conn = konektatu();

// Kurtso guztiak jaso
$sql = "SELECT * FROM kurtsoak";
// Query-a exekutatu
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurtso Panela - CiberSquad</title>
    <link rel="stylesheet" href="styles_kurtsoak.css"> 
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="../../administrazioa.php">Hasiera</a></li> <!-- Hasierara joan -->
            <li><a href="../iks/ikasleak.php">Ikasleak</a></li> <!-- Ikasleen panelera joan -->
            <li><a href="../erb/erabiltzaileak.php">Erabiltzaileak</a></li> <!-- Erabiltzaileen panelera joan -->
            <li><a href="../ere/erregistro_eskaerak.php">Erregistro Eskaerak</a></li> <!-- Erregistro eskaeretara joan -->
            <li><a href="kurtsoak.php">Kurtsoak</a></li> <!-- Kurtsoen panelera joan -->
            <li><a href="../logout.php">Saioa Itxi</a></li> <!-- Saioa itxi -->
        </ul>
    </nav>

    <div class="content">
        <h2>Kurtsoak</h2>
        <!-- Goiburuak -->
        <table>
            <tr>
                <th>Identifikatzailea</th>
                <th>Izena</th>
                <th>Ikasturtea</th>
                <th>Iraupena</th>
                <th>Ikasle Kopurua</th>
                <th>Aukerak</th>
            </tr>

            <?php
            // Kurtso guztiak bistaratu
            if ($result->num_rows > 0) {
                // Iterazio bakoitzeko kurtsoa instantziako objektu bat sortu
                while($row = $result->fetch_assoc()) {
                    $kurtsoa = new Kurtsoa(
                        $row['identifikatzailea'],
                        $row['izena'],
                        $row['ikasturtea'],
                        $row['iraupena'],
                        $row['ikasle_kopurua']
                    );

                    // Getter-en bidez datuak bistaratu
                    echo "<tr>";
                    echo "<td>" . $kurtsoa->getIdentifikatzailea() . "</td>";
                    echo "<td>" . $kurtsoa->getIzena() . "</td>";
                    echo "<td>" . $kurtsoa->getIkasturtea() . "</td>";
                    echo "<td>" . $kurtsoa->getIraupena() . "</td>";
                    echo "<td>" . $kurtsoa->getIkasleKop() . "</td>";
                    echo "<td>";
                    
                    // Ezabatu botoia
                    echo "<form method='POST' action='delete_kurtsoa.php' style='display:inline-block;'>";
                    echo "<input type='hidden' name='identifikatzailea' value='" . $kurtsoa->getIdentifikatzailea() . "'>";
                    echo "<button type='submit' class='delete-btn'>Ezabatu</button>";
                    echo "</form>";

                    // Eguneratu botoia
                    echo "<form action='update_kurtsoa.php' method='get' style='display:inline-block;'>";
                    echo "<input type='hidden' name='identifikatzailea' value='" . $kurtsoa->getIdentifikatzailea() . "'>";
                    echo "<button type='submit' class='update-btn'>Eguneratu</button>";
                    echo "</form>";

                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Ez daude kurtsoak erregistratuta.</td></tr>";
            }
            ?>
        </table>

        <!-- Formularioa erakutsi -->
        <button class="create-btn" onclick="document.getElementById('new-course-form').style.display='block'">
            Kurtso Berria Sortu
        </button>

        <!-- Kurtsoa sortzeko formularioa -->
        <div id="new-course-form" style="display: none;">
            <h3>Kurtso Berria Sortu</h3>
            <form method="POST" action="create_kurtsoa.php">

                <label for="identifikatzailea">Identifikatzailea:</label>
                <input type="text" id="identifikatzailea" name="identifikatzailea" required>

                <label for="izena">Kurtso Izena:</label>
                <input type="text" id="izena" name="izena" required>

                <label for="ikasturtea">Ikasturtea:</label>
                <input type="text" id="ikasturtea" name="ikasturtea" required>

                <label for="iraupena">Iraupena:</label>
                <input type="text" id="iraupena" name="iraupena" required>

                <label for="ikasle_kopurua">Ikasle Kopurua:</label>
                <input type="number" id="ikasle_kopurua" name="ikasle_kopurua" required>

                <button type="submit" class="create-btn">Sortu</button>
            </form>
        </div>

    </div>

    <?php $conn->close(); ?>
</body>
</html>
