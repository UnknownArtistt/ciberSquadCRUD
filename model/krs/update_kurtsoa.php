<?php
// Sesioa hasi
session_start();
include '../../konexioa.php'; // Konexioa gehitu

// Erroreak gaitu
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Parametroa jaso den zihurtatu
if (isset($_GET['identifikatzailea'])) {
    $kurtso_id = $_GET['identifikatzailea'];

    // Konexioa egin
    $conn = konektatu();

    // Kontsulta idatzi
    $sql = "SELECT * FROM kurtsoak WHERE identifikatzailea = ?";
    
    // Kontsulta prestatu
    if ($stmt = $conn->prepare($sql)) {
        // Bindeatu
        $stmt->bind_param("s", $kurtso_id);
        // Exekutatu
        $stmt->execute();
        // Emaitza jaso
        $result = $stmt->get_result();

        // Kurtsoa aurkitu den zihurtatu
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $id = $row['identifikatzailea'];
            $izena = $row['izena'];
            $ikasturtea = $row['ikasturtea'];
            $iraupena = $row['iraupena'];
            $ikasle_kopurua = $row['ikasle_kopurua'];
        
        // Errorea
        } else {
            $_SESSION['error'] = "Kurtso hori ez dago.";
            header("Location: kurtsoak.php");
            exit();
        }
    } else {
        echo "Errorea kontsulta prestatzerakoan: " . $conn->error;
        exit();
    }
} else {
    echo "Ez da identifikatzailea jaso.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eguneratu Kurtsoa - CiberSquad</title>
    <link rel="stylesheet" href="update_kurtsoa.css"> 
</head>
<body>
    <div class="content">
        <h2>Kurtsoa Eguneratu</h2>

        <!-- Eguneratzeko formularioa -->
        <form action="update_kurtsoa_prozesatu.php" method="post">
            
            <label for="identifikatzailea">Kurtso Identifikatzailea:</label>
            <input type="text" name="identifikatzailea" value="<?php echo $id; ?>" readonly>

            <label for="izena">Kurtso Izena:</label>
            <input type="text" id="izena" name="izena" value="<?php echo $izena; ?>" required>

            <label for="ikasturtea">Ikasturtea:</label>
            <input type="text" id="ikasturtea" name="ikasturtea" value="<?php echo $ikasturtea; ?>" required>

            <label for="iraupena">Iraupena:</label>
            <input type="text" id="iraupena" name="iraupena" value="<?php echo $iraupena; ?>" required>

            <label for="ikasle_kopurua">Ikasle Kopurua:</label>
            <input type="number" id="ikasle_kopurua" name="ikasle_kopurua" value="<?php echo $ikasle_kopurua; ?>" required>

            <button type="submit">Eguneratu</button>

        </form>
    </div>
</body>
</html>
