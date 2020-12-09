<?php
    class Utilisateur {
        private $id;
        private ?string $CIN=null;
        private ?string $nom=null;
        private ?string $prenom=null;
        private ?string $telephone=null;
        private ?string $email=null;
        private ?string $login=null;
        private ?string $password=null;

        public function __construct(string $CIN, string $nom, string $prenom, string $telephone, string $email, string $login, string $pass) {
            $this->CIN= $CIN;
            $this->nom= $nom;
            $this->prenom= $prenom;
            $this->telephone= $telephone;
            $this->email= $email;
            $this->login= $login;
            $this->password= $pass;
        }
        public function getId() {
            return $this->id;
        }
        public function getCIN (){
            return $this->CIN;
        }
        public function setCIN (string $CIN) {
            $this->CIN = $CIN;
        }
        public function getNom (){
            return $this->nom;
        }

        public function setNom (string $nom) {
            $this->nom = $nom;
        }

        public function getPrenom (){
            return $this->prenom;
        }

        public function setPrenom (string $prenom) {
            $this->prenom = $prenom ;
        }
        public function getTelephone (){
            return $this->telephone;
        }
        public function setTelephone (string $telephone) {
            $this->telephone = $telephone;
        }
        

        public function getEmail (){
            return $this->email;
        }

        public function setEmail (string $email) {
            $this->email = $email;
        }


        public function getLogin (){
            return $this->login;
        }

        public function setLogin (string $login) {
            $this->login = $login;
        }

        public function getPassword (){
            return $this->password;
        }

        public function setPassword (string $password) {
            $this->password = $password;
        }
    }