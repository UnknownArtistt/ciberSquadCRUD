<?php
// Sesioa hasi
session_start();
include 'krs_fun.php'; // Funtzioak gehitu

// Formularioaren datuak jaso diren zihurtatu
if (isset($_POST['identifikatzailea'], $_POST['izena'], $_POST['ikasturtea'], $_POST['iraupena'], $_POST['ikasle_kopurua'])) {
    $identifikatzailea = $_POST['identifikatzailea'];
    $izena = $_POST['izena'];
    $ikasturtea = $_POST['ikasturtea'];
    $iraupena = $_POST['iraupena'];
    $ikasle_kopurua = $_POST['ikasle_kopurua'];

    // Kurtsoa sortu funtzioari deituz
    if (kurtsoaSortu($identifikatzailea, $izena, $ikasturtea, $iraupena, $ikasle_kopurua)) {
        $_SESSION['message'] = "Kurtsoa ongi sortu da.";
    } else {
        $_SESSION['error'] = "Errorea kurtsoa sortzean.";
    }
    header("Location: kurtsoak.php");
} else {
    $_SESSION['error'] = "Ez dira datu guztiak jaso."; // Errorea
    header("Location: kurtsoak.php");
}
?>
