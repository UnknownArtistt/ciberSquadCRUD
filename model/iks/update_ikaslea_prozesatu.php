<?php

// Sesioa hasi
session_start();

// Funtzioak gehitu
include_once 'iks_fun.php';

// Erroreak erakusteko habilitatu
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

    if (isset($_POST['id']) && isset($_POST['izena']) && isset($_POST['abizena']) && 
        isset($_POST['email'])) {

        // Datuak jaso eta bariableetan batu
        $id = $_POST['id'];
        $izena = $_POST['izena'];
        $abizena = $_POST['abizena'];
        $email = $_POST['email'];

        // Ikaslea eguneratzeko funtzioari deitu datuak pasatuz
        if (ikasleaEguneratu($id, $izena, $abizena, $email)) {

            // Ikasleetara joan success pasatuz
            $_SESSION['success'] = "Ikaslea ondo eguneratu da!";
            header("Location: ikasleak.php");
            exit();
        } else {
            // Erroren bat gertatu bada erakutsi
            echo "Errore ikaslea eguneratzen <br>";

            $_SESSION['error'] = "Errorea ikaslea eguneratzean.";
            header("Location: ikasleak.php");
            exit();
        } 
    } else {
        
        //echo "Datuak falta dira <br>";

        // Handler
        $_SESSION['error'] = "Ezin da ikaslea eguneratu. Beharrezko datuak ez dira jaso.";
        header("Location: ikasleak.php");
        exit();
    }
} else {
    echo "Formularioa ez da ondo bidali";
    exit();
}
?>
