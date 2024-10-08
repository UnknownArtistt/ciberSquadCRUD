<?php

// sesioa hasi
session_start();
// konexioa gehitu
include 'konexioa.php';

// Eskaera modua POST bada datuak jasoko ditugu, kasu honetan kurtsoaren eta ikaslearen identifikatzaileak izanik
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kurtso_id = $_POST['kurtso_id'];
    $ikasle_id = $_POST['ikasle_id'];

    // Datu basera konektatu
    $conn = konektatu();

    // Kurtsoaren identifikatzailea gehituko diogu ikasleari
    $sql = "UPDATE ikasleak SET kurtso_id = ? WHERE id = ?";
    // sententzia prestatu
    $stmt = $conn->prepare($sql);
    // Parametroak bindeatu
    $stmt->bind_param("si", $kurtso_id, $ikasle_id);

    // Sententzia exekutatu
    if ($stmt->execute()) {
        echo "Ikaslea matrikulatu da!";
        header('Location: index_ikasleak.php?success=matrikulatuta'); // Ikasleen index-era bueltatu success pasatuz
    } else {
        echo "Errorea matrikulatzean: " . $stmt->error;
        header('Location: index_ikasleak.php?error=errorea'); // Ikasleen index-era bueltatu error pasatuz
    }

    $stmt->close(); // Transferentzia itxi
    $conn->close(); // KOnexioa itxi
}
?>
