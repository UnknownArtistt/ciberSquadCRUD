<?php

    class Kurtsoa {

        // Atributuak

        public $identifikatzailea;
        public $izena;
        public $ikasturtea;
        public $iraupena;
        public $ikasle_kopurua;

        // Eraikitzailea

        function __construct($identifikatzailea, $izena, $ikasturtea, $iraupena, $ikasle_kopurua) {
            $this->identifikatzailea = $identifikatzailea;
            $this->izena = $izena;
            $this->ikasturtea = $ikasturtea;
            $this->iraupena = $iraupena;
            $this->ikasle_kopurua = $ikasle_kopurua;
        }

        // Getter

        public function getIdentifikatzailea() {
            return $this->identifikatzailea;
        }

        public function getIzena() {
            return $this->izena;
        }

        public function getIkasturtea() {
            return $this->ikasturtea;
        }

        public function getIraupena() {
            return $this->iraupena;
        }

        public function getIkasleKop() {
            return $this->ikasle_kopurua;
        }

        // Setter

        public function setIdentifikatzailea($identifikatzailea) {
            return $this->identifikatzailea = $identifikatzailea;
        }

        public function setIzena($izena) {
            return $this->izena = $izena;
        }

        public function setIkasturtea($ikasturtea) {
            return $this->ikasturtea = $ikasturtea;
        }

        public function setIraupena($iraupena) {
            return $this->iraupena = $iraupena;
        }

        public function setIkasleKop($ikasle_kopurua) {
            return $this->ikasle_kopurua = $ikasle_kopurua;
        }

    }

?>
