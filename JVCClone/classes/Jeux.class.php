<?php

class Jeux {
	public $id;
	public $nom;
	public $description;
	public $pegi;
	public $site;
	public $editor;
	public $category;


	public function hydrate(array $donnees){
		foreach($donnees as $key => $value){
			$method = 'set'.ucfirst($key);
			if(method_exists($this, $method)){
				$this->$method($value);
			}
		}
	}



	public function getId() { 
		return $this->id; 
	}
	
	public function getNom() { 
		return $this->nom;
	}
	
	public function getDescription() { 
		return $this->description; 
	}
	
	public function getPegi() { 
		return $this->pegi; 
	}
	
	public function getSite() { 
		return $this->site; 
	}

	public function getEditor() { 
		return $this->editor; 
	}

	public function getCategory() { 
		return $this->category; 
	}


	private function setId($id){
		$this->id = $id;
	}


	public function setNom($nom){
		// if( is_string($nom) && strlen($nom)>=1){
			$this->nom = $nom;
		// } else {
		//     echo 'Mauvais nom'; die();
		// }
	}

	public function setDescription($description){
		// if( is_string($description) && strlen($description)>=1){
			$this->description = $description;
		// } else {
		// echo 'Mauvaise description'; die();
		// }
	}

	public function setPegi($pegi){
		// if( is_int($pegi) && $pegi>=1){
			$this->pegi = $pegi;
		// } else {
		// echo 'Mauvais pegi'; die();
		// }
	}

	public function setSite($site){
		// if( is_string($site) && strlen($site)>=1){
			$this->site = $site;
		// } else {
		// echo 'Mauvais site'; die();
		// }
	}

	public function setEditor($editorID){
		$this->editor = $editorID;
	}

	public function setCategory($categoryID){
		$this->category = $categoryID;
	}


	public function __construct(array $donnees){
		$this->hydrate($donnees);
	}
}