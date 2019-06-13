<?php
    class Version {
        
        public $id;
        public $date;
        public $jeu;
        public $support;

        public function hydrate(array $donnees){
            foreach ($donnees as $key => $value){
                $method = 'set'.ucfirst($key);
                if(method_exists($this, $method)){
                    $this->$method($value);
                }
            }
        }

        // getters
        public function getId(){
            return $this->id;
        }
        public function getDate(){
            return $this->date;
        }
        public function getJeu(){
            return $this->jeu;
        }
        public function getSupport(){
            return $this->support;
        }
        
        // setters
        private function setId($id){
            $this->id = $id;
        }
        public function setDate($date){
            $this->date = $date;
        }
        public function setJeu($jeu){
            $this->jeu = $jeu;
        }
        public function setSupport($support){
            $this->support = $support;
        }
        
        // construct
        public function __construct(array $donnees){
            $this->hydrate($donnees);
        }
    }
?>