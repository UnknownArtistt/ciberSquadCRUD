<?php

    /** 
    * 
    * Funtzio honek mysqli instatzia bat sortzen du datu basera konexioa egiteko. Horretarako zerbitzariaren
    * izena, erabiltzailea, pasahitza eta datu basearen izena finkatzen dira. Mysqli klaseak dagoeneko berezko
    * babesa dauka SQL inyekzioaren aurka.
    * 
    * @return mysqli instantziako objektu bat
    */
    function konektatu() {

        // Konexioa egiteko parametroak ezarri
        $servername = "localhost";
        $username = "logi"; 
        $password = "tengoAlergiaDePhp69"; 
        $dbname = "ciberSquadAkademia";

        // Konexioa egin
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Konexioan errorea egon den errebisatu
        if ($conn->connect_error) {
            die("Errorea konexioan: " . $conn->connect_error);
        } else {
            return $conn; // ondo badago konexioa itzuli
        }
    }
    
?>