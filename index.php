<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CiberSquad - Sarrera</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- CSS dokumentua binkulatu -->
</head>
<body>
    <!-- Menua -->
    <nav class="navbar">
        <ul>
            <li><a href="saioa_hasi.php">Saioa Hasi</a></li> <!-- Loginera joan -->
            <li><a href="erregistratu.php">Erregistratu</a></li> <!-- Erregistratzera joan -->
        </ul>
    </nav>

    <!-- Eduki garrantzitsua -->
    <div class="container">
        <img src="media/cybersquad_logo.png" class="logo" alt="CiberSquad Logo">
        <h2>Gure Kurtsoen Zerrenda</h2>
        <table border="1" cellpadding="10">
            <tr>
                <th>Identifikatzailea</th>
                <th>Izena</th>
                <th>Ikasturtea</th>
                <th>Iraupena</th>
                <th>Ikasle Kopurua</th>
            </tr>
                    
            <?php 
            include 'konexioa.php';
            
            // Kontsulta - kurtsoen informazioa ateratzeko
            $sql = "SELECT * FROM kurtsoak";

            // Konexioa egin
            $conn = konektatu();

            // Query-a exekutatu
            $result = $conn->query($sql);

            // Erregistrorik badaude
            if ($result->num_rows > 0) {
                // Fila bakoitzeko datu bat erakutsi
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["identifikatzailea"] . "</td>";
                    echo "<td>" . $row["izena"] . "</td>";
                    echo "<td>" . $row["ikasturtea"] . "</td>";
                    echo "<td>" . $row["iraupena"] . "</td>";
                    echo "<td>" . $row["ikasle_kopurua"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Ez dago daturik</td></tr>";
            }

            // Konexioa itxi
            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
