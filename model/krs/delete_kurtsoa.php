<?php
// Sesioa hasi
session_start();
include 'krs_fun.php'; // Funtzioak gehitu

// Kurtsoaren identifikatzailea jaso den zihurtatu
if (isset($_POST['identifikatzailea'])) {
    $kurtso_id = $_POST['identifikatzailea'];

    // Kurtsoa ezabatu funtzioari deituz
    if (kurtsoaEzabatu($kurtso_id)) {
        $_SESSION['message'] = "Kurtsoa ongi ezabatu da.";
    } else {
        $_SESSION['error'] = "Errorea kurtsoa ezabatzean.";
    }
    header("Location: kurtsoak.php");
} else {
    $_SESSION['error'] = "Ez da kurtso ID-rik jaso."; // Errorea
    header("Location: kurtsoak.php");
}
?>
