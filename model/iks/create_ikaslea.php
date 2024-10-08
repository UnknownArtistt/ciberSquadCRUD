<?php
// Sesioa hasi
session_start();
include 'iks_fun.php'; // Funtzioak gehitu

// Formularioaren datuak jaso diren zihurtatu
if (isset($_POST['izena'], $_POST['abizena'], $_POST['email'])) {
    $izena = $_POST['izena'];
    $abizena = $_POST['abizena'];
    $email = $_POST['email'];

    // Kurtsoa sortu funtzioari deituz
    if (ikasleaSortu($izena, $abizena, $email)) {
        $_SESSION['message'] = "Ikaslea ongi sortu da."; // Ikaslea ongi sortu da
    } else {
        $_SESSION['error'] = "Errorea ikaslea sortzean."; // Errorea
    }
    header("Location: ikasleak.php"); // Ikasleetara erredirekzionatu
} else {
    $_SESSION['error'] = "Ez dira datu guztiak jaso."; // Errorea maneiatu
    header("Location: ikasleak.php");
}
?>