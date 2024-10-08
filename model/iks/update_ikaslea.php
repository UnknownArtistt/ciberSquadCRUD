<?php
// Sesioa hasi
session_start();

include '../../konexioa.php'; // Konexioa gehitu

// Erroreen bisibilizazioa gaitu
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Parametroa GET bitartez jaso den zihurtatu
if (isset($_GET['id'])) {
    $ikasle_id = $_GET['id'];

    // Datu basera konektatu
    $conn = konektatu();

    // Eguneratu nahi den ikaslearen datuak jaso id pasatuz
    $sql = "SELECT * FROM ikasleak WHERE id = ?";
    
    // Sententzia prestatu
    if ($stmt = $conn->prepare($sql)) {
        // Bindeatu
        $stmt->bind_param("s", $ikasle_id);
        // Exekutatu
        $stmt->execute();
        // Emaitza jaso
        $result = $stmt->get_result();

        // Ikaslea aurkitu den zihurtatu
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $izena = $row['izena'];
            $abizena = $row['abizena'];
            $email = $row['email'];
            $kurtso_id = $row['kurtso_id'];
        } else {
            $_SESSION['error'] = "Ikasle hori ez dago.";
            header("Location: ikasleak.php");
            exit();
        }
    } else {
        echo "Errorea kontsulta prestatzerakoan: " . $conn->error; // Konexio errorea
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
    <title>Eguneratu Ikaslea - CiberSquad</title>
    <link rel="stylesheet" href="update_ikaslea.css">
</head>
<body>
    <div class="content">
        <h2>Ikaslea Eguneratu</h2>

        <!-- Ikaslea eguneratzeko formulariora berbidali -->
        <form action="update_ikaslea_prozesatu.php" method="post">
            
            <label for="id">Ikasle Id:</label>
            <input type="text" name="id" value="<?php echo $id; ?>" readonly>

            <label for="izena">Ikasle Izena:</label>
            <input type="text" id="izena" name="izena" value="<?php echo $izena; ?>" required>

            <label for="abizena">Ikasle Abizena:</label>
            <input type="text" id="abizena" name="abizena" value="<?php echo $abizena; ?>" required>

            <label for="email">Emaila:</label>
            <input type="text" id="email" name="email" value="<?php echo $email; ?>" required>

            <button type="submit">Eguneratu</button>

        </form>
    </div>
</body>
</html>
