<?php

    class LogActions {
        public function __construct(){
            if(session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

        public function logIn($id) {
            $_SESSION['id'] = $id;
        }
        public function logOut() {
            session_unset();
            session_destroy();
            header('Location: ../../View/connexion.php');
        }
        public function destroyyy() {
            session_unset();
            session_destroy();
        }

        public function checkIfSession() {
            if(!isset($_SESSION['id'])) {
                header('Location: connexion.php');
            }
        }
    }