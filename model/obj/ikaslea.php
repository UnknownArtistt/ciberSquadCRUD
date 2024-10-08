<?php

    class Ikaslea {

        // Atributuak

        public $id;
        public $izena;
        public $abizena;
        public $email;
        public $kurtso_id;

        // Eraikitzailea

        function __construct($id, $izena, $abizena, $email, $kurtso_id) {
            $this->id = $id;
            $this->izena = $izena;
            $this->abizena = $abizena;
            $this->email = $email;
            $this->kurtso_id = $kurtso_id;
        }

        // getters

        public function getId() {
            return $this->id;
        }

        public function getIzena() {
            return $this->izena;
        }

        public function getAbizena() {
            return $this->abizena;
        }

        public function getEmail() {
            return $this->email;
        }

        public function getKurtsoId() {
            return $this->kurtso_id;
        }

        //setters

        public function setId($id) {
            return $this->id = $id;
        }

        public function setIzena($izena) {
            return $this->izena = $izena;
        }

        public function setAbizena($abizena) {
            return $this->abizena = $abizena;
        }

        public function setEmail($email) {
            return $this->email = $email;
        }

        public function setKurtsoId($kurtso_id) {
            return $this->kurtso_id = $kurtso_id;
        }

    }

?>