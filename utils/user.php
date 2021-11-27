<?php
    class User {
        // Properties
        private $username;
        private $imc;
        private $fat_mass;
        private $muscle_mass;

        // Methods
        function _construct($username,$imc,$fat_mass,$muscle_mass){
            $this->username = $username;
            $this->imc = $imc;
            $this->fat_mass = $fat_mass;
            $this->muscle_mass = $muscle_mass;
        }
        function get_username() {
            return $this->username;
        }
        function get_imc() {
            return $this->imc;
        }
        function get_fat_mass() {
            return $this->fat_mass;
        }
        function get_muscle_mass() {
            return $this->muscle_mass;
        }
    }
?>
