<?php

    // sesioa hasi
    session_start();

    // Ikaslea ez bada login-era bueltatu
    if (!isset($_SESSION['erabiltzaile_izena']) || $_SESSION['administraria'] == 0) {
        header('Location: saioa_hasi.php');
        exit();
    }
    
    // Sesioa hasi duen ikaslearen id jaso
    $ikasle_id = $_SESSION['erabiltzaile_id'];

    // Konexioaren klasea gehitu
    include 'konexioa.php';
    // Konexioa sortu
    $conn = konektatu();

    // IKaslea logeatu den eta matrikulatuta dagoen kurtsoaren id-a jasotzen duen sententzia
    $sqlMatrikula = "SELECT kurtso_id FROM ikasleak WHERE id = ? AND kurtso_id IS NOT NULL";
    // Sententzia prestatu
    $stmt = $conn->prepare($sqlMatrikula);
    // Ikaslearen id-a bindeatu
    $stmt->bind_param("i", $ikasle_id);
    // Sententzia exekutatu
    $stmt->execute();
    // Emaitzak gorde
    $stmt->store_result();

    // Emaitzarik badago zerbaitetan matrikulatuta dagoela esan nahi du
    $ya_matriculado = $stmt->num_rows > 0; 

    // Operazioa itxi
    $stmt->close();

?>

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
            <li><a href="saioa_hasi.php">Saioa Itxi</a></li> <!-- Saioa itxi -->
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
                <th>Matrikulazioa</th>
            </tr>
                    
            <?php 
            
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
                    echo "<td>";

                    // Zerbaitetan matrikulatuta badago matrikulatu botoiak desgaitu
                    if ($ya_matriculado) {
                        echo "<button disabled>Matrikulatu</button>";
                    } else {
                        echo "<form method='POST' action='matrikulazioa.php' style='display:inline-block;'>";
                        echo "<input type='hidden' name='kurtso_id' value='" . $row['identifikatzailea'] . "'>";
                        echo "<input type='hidden' name='ikasle_id' value='" . $ikasle_id . "'>";
                        echo "<button type='submit' class='delete-btn'>Matrikulatu</button>";
                        echo "</form>";
                    }

                    echo "</td>";

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
