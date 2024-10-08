<?php

include '../../konexioa.php'; // Datu basera konexioa

/**
 * Ikasle bat ezabatzen du bere identifikatzailea jasoz
 *
 * @param int $kurtso_id Ezabatu nahi den ikaslearen identifikatzailea
 * @return bool Ondo ezabatu bada True bueltatuko du bestela False
 */
function ikasleaEzabatu($ikasle_id) {
    $conn = konektatu();
    $sql = "DELETE FROM ikasleak WHERE id = ?";

    // SQL sententzia prestatu
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $ikasle_id);

        // Sententzia exekutatu
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true; // Kurtsoa ezabatuta
        } else {
            $stmt->close();
            $conn->close();
            return false; // Kurtsoa ezabatzean errorea
        }
    } else {
        $conn->close();
        return false; // Kontsulta prestatzean errorea
    }
}

/**
 * Ikasle bat sortzeko funtzioa, ikasleak duen datu guztiak jasotzen ditu eta insert sententzia bat exekutatzen du
 *
 * @param string $izena Ikaslearen izena
 * @param string $abizena Ikaslearen abizena
 * @param string $email Ikaslearen emaila
 * @return bool True itzultzen du ondo exekutatu bada eta False erroren bat egon bada
 */
function ikasleaSortu($izena, $abizena, $email) {
    $conn = konektatu();
    $sql = "INSERT INTO ikasleak (izena, abizena, email) VALUES (?, ?, ?)";

    // SQL sententzia prestatu
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sss", $izena, $abizena, $email);

        // Exekutatu
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true; // Operazioa ondo
        } else {
            $stmt->close();
            $conn->close();
            return false; // Errorea kurtsoa sortzean
        }
    } else {
        $conn->close();
        return false; // Errorea kontsulta prestatzen
    }
}

/**
 * Ikasle bat eguneratzeko funtzioa, identifikatzailea jasoz
 *
 * @param string $id Ikaslearen identifikatzailea
 * @param string $izena Ikaslearen izena
 * @param string $abizena Ikaslearen abizena
 * @param string $email Ikaslearen emaila
 * @return bool True itzultzen du ondo eguneratu bada eta False erroren bat egon bada
 */
function ikasleaEguneratu($id, $izena, $abizena, $email) {
    $conn = konektatu();
    $sql = "UPDATE ikasleak SET izena = ?, abizena = ?, email = ? WHERE id = ?";

    // SQL sententzia prestatu
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssss", $izena, $abizena, $email, $id);

        // Exekutatu
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            return true; // Operazioa ondo
        } else {
            $stmt->close();
            $conn->close();
            return false; // Errorea kurtsoa eguneratzean
        }
    } else {
        $conn->close();
        return false; // Errorea kontsulta prestatzen
    }
}

?>