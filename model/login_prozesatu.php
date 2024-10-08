<?php
// Erroreak gaitu
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Sesioa hasi
session_start();

// Konexioa egin eta gehitu
include '../konexioa.php';
$conn = konektatu();

// Konexioa egiaztatu
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Bidalketa egin den egiaztatu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $erabiltzaileIzena = $_POST['erabiltzaile_izena'];
    $pasahitza = $_POST['password'];

    // Erabiltzailea eta pasahitza jaso
    $sql = "SELECT erabiltzaile_izena, ikasle_id, pasahitza, administraria FROM erabiltzaileak WHERE erabiltzaile_izena = ?";
    // Sententzia prestatu
    $stmt = $conn->prepare($sql);

    // Errorea sententzia prestatzean
    if ($stmt === false) {
        die("Errorea sententzia prestatzean: " . $conn->error);
    }

    // Bindeatu
    $stmt->bind_param("s", $erabiltzaileIzena);
    // Exekutatu
    $stmt->execute();
    // Emaitza gorde
    $stmt->store_result();

    // Erabiltzailea aurkitu den egiaztatu
    if ($stmt->num_rows > 0) {
        // Emaitzak jaso
        $stmt->bind_result($dbErabiltzaileIzena, $id, $dbPasahitza, $administraria);
        $stmt->fetch();

        // Pasahitza berdiña den egiaztatu
        if (password_verify($pasahitza, $dbPasahitza)) {
            // Zuzena bada sesioa hasi
            $_SESSION['erabiltzaile_izena'] = $dbErabiltzaileIzena;
            $_SESSION['administraria'] = $administraria;
            $_SESSION['erabiltzaile_id'] = $id;  // Erabiltzailearen id-a gorde

            // Admin bada panelera eraman bestela ikasleen index-era
            if ($administraria == 0) {
                // Admin da
                header('Location: ../crud/administrazioa.php');
                exit();
            } else {
                // Ikaslea da
                header('Location: ../crud/index_ikasleak.php');
                exit();
            }
            
        } else {
            // Pasahitz okerra
            header('Location: ../crud/saioa_hasi.php?error=incorrect_password');
            exit();
        }
    } else {
        // Ez da erabiltzailea aurkitu
        header('Location: ../crud/saioa_hasi.php?error=user_not_found');
        exit();
    }

    // Sententzia eta konexioa itxi
    $stmt->close();
    $conn->close();
}
?>
