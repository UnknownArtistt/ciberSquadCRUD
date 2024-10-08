<?php
// Sesioa hasi
session_start();
include 'erb_fun.php'; // Funtzioak gehitu

// Erabiltzailearen identifikatzailea jaso den zihurtatu
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Kurtsoa ezabatu funtzioari deituz
    if (erbEzabatu($id)) {
        $_SESSION['message'] = "Erabiltzailea ongi ezabatu da.";
    } else {
        $_SESSION['error'] = "Errorea kurtsoa ezabatzean.";
    }
    header("Location: erabiltzaileak.php"); // Erabiltzaileen panelera bueltatu
} else {
    // Errorea maneiatu mezu bat pasatuz
    $_SESSION['error'] = "Ez da erabiltzaile ID-rik jaso.";
    header("Location: erabiltzaileak.php"); // Erabiltzaileen panelera bueltatu
}
?>
