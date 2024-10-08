<?php
// Sesioa hasi
session_start();

// Sesio guztiak suntsitu
session_unset(); // Sesio bariableak suntsitu
session_destroy(); // Sesioa suntsitu

// Login-era eraman
header("Location: ../saioa_hasi.php");
exit();
?>
