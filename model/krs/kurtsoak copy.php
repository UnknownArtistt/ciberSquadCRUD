<?php
session_start();
include '../../crud/konexioa.php'; // Asegurarnos de que incluimos la conexión a la base de datos

$conn = konektatu();

// Consultar todos los cursos
$sql = "SELECT * FROM kurtsoak";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurtso Panela - CiberSquad</title>
    <link rel="stylesheet" href="styles_kurtsoak.css"> <!-- Link to the new CSS file -->
</head>
<body>
    <nav class="navbar">
        <ul>
            <li><a href="../../crud/administrazioa.php">Hasiera</a></li>
            <li><a href="../iks/ikasleak.php">Ikasleak</a></li>
            <li><a href="../erb/erabiltzaileak.php">Erabiltzaileak</a></li>
            <li><a href="../ere/erregistro_eskaerak.php">Erregistro Eskaerak</a></li>
            <li><a href="kurtsoak.php">Kurtsoak</a></li>
            <li><a href="../logout.php">Saioa Itxi</a></li>
        </ul>
    </nav>

    <div class="content">
        <h2>Kurtsoak</h2>
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
            // Mostrar todos los cursos
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['identifikatzailea'] . "</td>";
                    echo "<td>" . $row['izena'] . "</td>";
                    echo "<td>" . $row['ikasturtea'] . "</td>";
                    echo "<td>" . $row['iraupena'] . "</td>";
                    echo "<td>" . $row['ikasle_kopurua'] . "</td>";
                    echo "<td>";
                    // Botón de eliminar
                    echo "<form method='POST' action='delete_kurtsoa.php' style='display:inline-block;'>";
                    echo "<input type='hidden' name='identifikatzailea' value='" . $row['identifikatzailea'] . "'>";
                    echo "<button type='submit' class='delete-btn'>Ezabatu</button>";
                    echo "</form>";

                    // Botón de actualizar
                    echo "<form action='update_kurtsoa.php' method='get' style='display:inline-block;'>";
                    echo "<input type='hidden' name='identifikatzailea' value='" . $row['identifikatzailea'] . "'>";
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

        <!-- Botón para añadir un nuevo curso -->
        <button class="create-btn" onclick="document.getElementById('new-course-form').style.display='block'">
            Kurtso Berria Sortu
        </button>

        <!-- Formulario para crear un nuevo curso -->
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
