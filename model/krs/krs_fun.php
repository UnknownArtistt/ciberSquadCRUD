<?php
include '../../konexioa.php'; // Datu basera konexioa

/**
 * Kurtso bat sortzeko funtzioa, kurtsoak duen datu guztiak jasotzen ditu eta insert sententzia bat exekutatzen du
 *
 * @param string $identifikatzailea Kurtsoaren identifikatzailea
 * @param string $izena Kurtsoaren izena
 * @param string $ikasturtea Kurtsoaren ikasturtea
 * @param string $iraupena Kurtsoaren iraupena
 * @param int $ikasle_kopurua Kurtsoaren ikasle kopurua
 * @return bool True itzultzen du ondo exekutatu bada eta False erroren bat egon bada
 */
function kurtsoaSortu($identifikatzailea, $izena, $ikasturtea, $iraupena, $ikasle_kopurua) {
    $conn = konektatu();
    $sql = "INSERT INTO kurtsoak (identifikatzailea, izena, ikasturtea, iraupena, ikasle_kopurua) VALUES (?, ?, ?, ?, ?)";

    // SQL sententzia prestatu
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssssi", $identifikatzailea, $izena, $ikasturtea, $iraupena, $ikasle_kopurua);

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
 * Kurtso bat ezabatzen du bere identifikatzailea jasoz
 *
 * @param int $kurtso_id Ezabatu nahi den kurtsoaren identifikatzailea
 * @return bool Ondo ezabatu bada True bueltatuko du bestela False
 */
function kurtsoaEzabatu($kurtso_id) {
    $conn = konektatu();
    $sql = "DELETE FROM kurtsoak WHERE identifikatzailea = ?";

    // SQL sententzia prestatu
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $kurtso_id);

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
 * Kurtso bat eguneratzeko funtzioa, identifikatzailea jasoz
 *
 * @param string $identifikatzailea Kurtsoaren identifikatzailea
 * @param string $izena Kurtsoaren izena
 * @param string $ikasturtea Kurtsoaren ikasturtea
 * @param string $iraupena Kurtsoaren iraupena
 * @param int $ikasle_kopurua Kurtsoaren ikasle kopurua
 * @return bool True itzultzen du ondo eguneratu bada eta False erroren bat egon bada
 */
function kurtsoaEguneratu($identifikatzailea, $izena, $ikasturtea, $iraupena, $ikasle_kopurua) {
    $conn = konektatu();
    $sql = "UPDATE kurtsoak SET izena = ?, ikasturtea = ?, iraupena = ?, ikasle_kopurua = ? WHERE identifikatzailea = ?";

    // SQL sententzia prestatu
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("sssis", $izena, $ikasturtea, $iraupena, $ikasle_kopurua, $identifikatzailea);

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
