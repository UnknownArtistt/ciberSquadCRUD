<?php
//sesioa hasi
session_start();
// Konexioa gehitu
include '../../konexioa.php';

// Konexioa sortu
$conn = konektatu();

// Erabiltzailearen identifikatzailea jaso
$ikasleId = $_POST['ikasle_id'];

// Eskaeraren datuak jaso
$sql = "SELECT * FROM erregistro_eskaerak WHERE id = ?";
// Sententzia prestatu
$stmt = $conn->prepare($sql);
// Parametroa bindeatu
$stmt->bind_param("i", $ikasleId);
// Sententzia exekutatu
$stmt->execute();
// Emaitza batu
$result = $stmt->get_result();
// Jasotako emaitzak multzokatu
$ikasleData = $result->fetch_assoc();

// iKasleak taulan inserzioa egin
$sqlInsertIkasleak = "INSERT INTO ikasleak (izena, abizena, email) VALUES (?, ?, ?)";
// Inserzio sententzia prestatu
$stmtInsertIkasleak = $conn->prepare($sqlInsertIkasleak);
// Parametroak bindeatu
$stmtInsertIkasleak->bind_param("sss", $ikasleData['ikasle_izena'], $ikasleData['ikasle_abizena'], $ikasleData['email']);

// Inserzioa ondo burutu bada
if ($stmtInsertIkasleak->execute()) {
    // Ikasle berriaren id-a jaso
    $ikasleInsertedId = $conn->insert_id;

    // erabiltzaileak taulan inserzioa egin jasotako ikasle id-arekin
    $sqlInsertErabiltzaileak = "INSERT INTO erabiltzaileak (erabiltzaile_izena, ikasle_id, ikasle_izena, ikasle_abizena, email, pasahitza, administraria) VALUES (?, ?, ?, ?, ?, ?, 1)";
    // Sententzia prestatu
    $stmtInsertErabiltzaileak = $conn->prepare($sqlInsertErabiltzaileak);
    // Parametroak bindeatu
    $stmtInsertErabiltzaileak->bind_param("sissss", $ikasleData['erabiltzaile_izena'], $ikasleInsertedId, $ikasleData['ikasle_izena'], $ikasleData['ikasle_abizena'], $ikasleData['email'], $ikasleData['pasahitza']);

    // Inserzioa ondo burutu bada
    if ($stmtInsertErabiltzaileak->execute()) {
        // Eskaera ezabatu
        $sqlDelete = "DELETE FROM erregistro_eskaerak WHERE id = ?";
        // Sententzia prestatu
        $stmtDelete = $conn->prepare($sqlDelete);
        // Parametroa bindeatu
        $stmtDelete->bind_param("i", $ikasleId);
        // Sententzia exekutatu
        $stmtDelete->execute();

        // Erredirekzionatu success bidaliz
        header("Location: erregistro_eskaerak.php?success=1");
        exit();
    } else {
        // Errorea maneiatu
        echo "Errore bat gertatu da erabiltzailea gehitzean: " . $stmtInsertErabiltzaileak->error;
    }
} else {
    echo "Errore bat gertatu da ikaslea gehitzean: " . $stmtInsertIkasleak->error;
}

// Konexioa itxi
$stmt->close();
$conn->close();
?>
