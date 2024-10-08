<?php

    class Erabiltzailea {

        // Atributuak
        public $id; // Erabiltzailearen identifikatzailea
        public $erabiltzaile_izena; // Erabiltzailearen izena (username)
        public $ikasle_id; // Ikaslearen identifikatzailea
        public $ikasle_izena; // Ikaslearen izena
        public $ikasle_abizena; // Ikaslearen abizena
        public $email; // Erabiltzailearen posta elektronikoa
        public $administraria; // Administraria den ala ez (true edo false)
        public $pasahitza; // Erabiltzailearen pasahitza

        // Eraikitzailea (construct method)
        public function __construct($id, $erabiltzaile_izena, $ikasle_id, $ikasle_izena, $ikasle_abizena, $email, $administraria, $pasahitza) {
            $this->id = $id; // Identifikatzailea hasieratu
            $this->erabiltzaile_izena = $erabiltzaile_izena; // Erabiltzaile izena hasieratu
            $this->ikasle_id = $ikasle_id; // Ikasle identifikatzailea hasieratu
            $this->ikasle_izena = $ikasle_izena; // Ikasle izena hasieratu
            $this->ikasle_abizena = $ikasle_abizena; // Ikasle abizena hasieratu
            $this->email = $email; // Posta elektronikoa hasieratu
            $this->administraria = $administraria; // Administrari rola hasieratu
            $this->pasahitza = $pasahitza; // Pasahitza hasieratu
        }

        // Get metodoak
        public function getId() {
            return $this->id; // Identifikatzailea itzuli
        }

        public function getErabiltzaileIzena() {
            return $this->erabiltzaile_izena; // Erabiltzaile izena itzuli
        }

        public function getIkasleId() {
            return $this->ikasle_id; // Erabiltzaile identifikatzailea itzuli
        }

        public function getIkasleIzena() {
            return $this->ikasle_izena; // Ikasle izena itzuli
        }

        public function getIkasleAbizena() {
            return $this->ikasle_abizena; // Ikasle abizena itzuli
        }

        public function getEmail() {
            return $this->email; // Posta elektronikoa itzuli
        }

        public function getAdministraria() {
            return $this->administraria; // Administrari rola itzuli
        }

        // Set metodoak
        public function setId($id) {
            $this->id = $id; // Identifikatzailea eguneratu
        }

        public function setErabiltzaileIzena($erabiltzaile_izena) {
            $this->erabiltzaile_izena = $erabiltzaile_izena; // Erabiltzaile izena eguneratu
        }

        public function setIkasleId($ikasle_id) {
            $this->ikasle_id = $ikasle_id; // Ikasle identifikatzailea eguneratu
        }

        public function setIkasleIzena($ikasle_izena) {
            $this->ikasle_izena = $ikasle_izena; // Ikasle izena eguneratu
        }

        public function setIkasleAbizena($ikasle_abizena) {
            $this->ikasle_abizena = $ikasle_abizena; // Ikasle abizena eguneratu
        }

        public function setEmail($email) {
            $this->email = $email; // Posta elektronikoa eguneratu
        }

        public function setAdministraria($administraria) {
            $this->administraria = $administraria; // Administrari rola eguneratu
        }

        public function setPasahitza($pasahitza) {
            $this->pasahitza = $pasahitza; // Pasahitza eguneratu
        }

        // Metodo lagungarria: Erabiltzailea administraria den egiaztatu
        public function administrariaDa() {
            return $this->administraria; // true edo false itzuli
        }

        // Metodo lagungarria: Erabiltzailearen informazioa formatu batean itzuli
        public function getErabiltzaileInformazioa() {
            return "Erabiltzaile Izena: " . $this->erabiltzaile_izena . ", Ikasle Izena: " . $this->ikasle_izena . " " . $this->ikasle_abizena . ", Email: " . $this->email;
        }
    }

?>
