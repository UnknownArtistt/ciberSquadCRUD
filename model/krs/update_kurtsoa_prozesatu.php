<?php
// sesioa hasi
session_start();
include_once 'krs_fun.php'; // funtzioak gehitu

// Erroreak bistaratzeko gaitasuna 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//echo ini_get('post_max_size');
//echo ini_get('max_input_vars');


// Datuak jaso diren zihurtatu
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //echo "<pre>";
    //print_r($_POST);
    //echo "</pre>";

    if (isset($_POST['identifikatzailea']) && isset($_POST['izena']) && isset($_POST['ikasturtea']) && 
        isset($_POST['iraupena']) && isset($_POST['ikasle_kopurua'])) {

        // Datuak jaso
        $identifikatzailea = $_POST['identifikatzailea'];
        $izena = $_POST['izena'];
        $ikasturtea = $_POST['ikasturtea'];
        $iraupena = $_POST['iraupena'];
        $ikasle_kopurua = $_POST['ikasle_kopurua'];

        // Depurazioa
        //echo "Identifikatzailea: $identifikatzailea <br>";
        //echo "Izena: $izena <br>";
        //echo "Ikasturtea: $ikasturtea <br>";
        //echo "Iraupena: $iraupena <br>";
        //echo "Ikasle Kopurua: $ikasle_kopurua <br>";

        // Eguneratzeko funtzioari deitu parametroak pasatuz
        if (kurtsoaEguneratu($identifikatzailea, $izena, $ikasturtea, $iraupena, $ikasle_kopurua)) {

            // Success
            $_SESSION['success'] = "Kurtsoa ondo eguneratu da!";
            header("Location: kurtsoak.php");
            exit();
        } else {
            // Depurazioa
            //echo "Error al actualizar el curso <br>";

            // Errorea
            $_SESSION['error'] = "Errorea kurtsoa eguneratzean.";
            header("Location: kurtsoak.php");
            exit();
        } 
    } else {
        // Depurazioa
        //echo "Faltan datos para actualizar el curso. <br>";

        // Errorea
        $_SESSION['error'] = "Ezin da kurtsoa eguneratu. Beharrezko datuak ez dira jaso.";
        header("Location: kurtsoak.php");
        exit();
    }
} else {
    echo "Formulario no enviado correctamente.";
    exit();
}
?>
