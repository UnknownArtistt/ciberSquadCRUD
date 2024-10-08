<?php
// Sesioa hasi
session_start();
include 'iks_fun.php'; // Funtzioak gehitu

// Ikaslearen identifikatzailea jaso den zihurtatu
if (isset($_POST['id'])) {
    $kurtso_id = $_POST['id'];

    // Kurtsoa ezabatu funtzioari deituz
    if (ikasleaEzabatu($kurtso_id)) {
        $_SESSION['message'] = "Ikaslea ongi ezabatu da.";
    } else {
        $_SESSION['error'] = "Errorea ikaslea ezabatzean.";
    }
    header("Location: ikasleak.php");
} else {
    $_SESSION['error'] = "Ez da ikasle ID-rik jaso";
    header("Location: ikasleak.php");
}
?>