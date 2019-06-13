<?php

	class Editor {

		private $id;
		private $name;
		private $site;

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

		public function setName($name){
			$this->name = $name;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function setSite($site){
			$this->site = $site;
		}

		public function getName(){
			return $this->name;
		}

		public function getId(){
			return $this->id;
		}

		public function getSite(){
			return $this->site;
		}

		public function __construct(array $datas){
			$this->hydrate($datas);
		}

	}

?>