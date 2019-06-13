<?php 
	class Category {
		private $id;
		private $name;
		// Un tableau de données doit être passé à la fonction (d'où le préfixe « array »).
		public function hydrate(array $donnees) {
			foreach ($donnees as $key => $value) {
				// On récupère le nom du setter correspondant à l'attribut.
				$method = 'set'.ucfirst($key);
				// Si le setter correspondant existe.
				if (method_exists($this, $method)) {
				// On appelle le setter.
					$this->$method($value);
				}
			}
		}
		public function getId(){
			return $this->id; 
		}
		public function getNom(){
			return $this->name;
		}


		private function setId($id){
			$this->id =$id;
		}
		public function setName($name){
			if( is_string($name) && strlen($name)>= 1){
				$this->name = $name;
			} else {
				echo 'Mauvais nom'; die();
			}
		}
		public function __construct(array $donnees){
			$this->hydrate($donnees);
		}
	}
?>