<?php

include '../../konexioa.php'; // Datu basera konexioa

/**
 * Erabiltzaile bat ezabatzen du bere identifikatzailea jasoz
 *
 * @param int $id Ezabatu nahi den erabiltzailearen identifikatzailea
 * @return bool Ondo ezabatu bada True bueltatuko du bestela False
 */
function erbEzabatu($id) {
    $conn = konektatu();
    $sql = "DELETE FROM erabiltzaileak WHERE id = ?";

    // SQL sententzia prestatu
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $id);

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

?>