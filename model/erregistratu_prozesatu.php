<?php
// Erroreak gaitu
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Konexioa egin eta gehitu
include '../konexioa.php';
$conn = konektatu();

// Konexioa zihurtatu
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Bidalketa egin den zihurtatu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Datuak jaso
    $ikasleIzena = $_POST['ikasle_izena'];
    $ikasleAbizena = $_POST['ikasle_abizena'];
    $email = $_POST['email'];
    $erabiltzaileIzena = $_POST['erabiltzaile_izena'];
    $pasahitza = password_hash($_POST['password'], PASSWORD_DEFAULT); // Pasahitza hasheatu

    // Insert-a egin
    $sql = "INSERT INTO erregistro_eskaerak (ikasle_izena, ikasle_abizena, email, erabiltzaile_izena, pasahitza) 
            VALUES (?, ?, ?, ?, ?)";

    // Sententzia prestatu
    $stmt = $conn->prepare($sql);

    // Prestaketa ondo egin den zihurtatu
    if ($stmt === false) {
        header('Location: ../erregistratu.php?status=error&message=' . urlencode($conn->error));
        exit();
    }

    // Bindeatu
    $stmt->bind_param("sssss", $ikasleIzena, $ikasleAbizena, $email, $erabiltzaileIzena, $pasahitza);

    // Exekutatu
    if ($stmt->execute()) {
        header('Location: ../erregistratu.php?status=success&message=' . urlencode("Erregistroa ondo burutu da! Administratzaileak balioztatu beharko du."));
        exit();
    } else {
        header('Location: ../erregistratu.php?status=error&message=' . urlencode($stmt->error));
        exit();
    }

    // Sententzia eta konexioa itxi
    $stmt->close();
    $conn->close();
}
