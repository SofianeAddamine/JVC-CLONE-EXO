<?php


class JeuxManager {

	private $db;

	public function __construct($db){
		$this->setDb($db);
	}

	public function setDb(PDO $db){
		$this->db =$db;
	}

	public function add(Jeux $jeu){
		
		// rqt d'insertion

		$add_jeu = $this->db->prepare('INSERT INTO jeu (name, description, pegi, web, fk_editor, fk_category) VALUES (:name, :description, :pegi, :site, :editor, :category)');

		

		$add_jeu->bindValue(':name', $jeu->getNom(), PDO::PARAM_STR);
		$add_jeu->bindValue(':description', $jeu->getDescription(), PDO::PARAM_STR);
		$add_jeu->bindValue(':pegi', $jeu->getPegi(), PDO::PARAM_INT);
		$add_jeu->bindValue(':site', $jeu->getSite(), PDO::PARAM_STR);
		$add_jeu->bindValue(':editor', $jeu->getEditor(), PDO::PARAM_INT);
		$add_jeu->bindValue(':category', $jeu->getCategory(), PDO::PARAM_INT);

		$add_jeu->execute();
		$add_jeu->closeCursor();
	}


	public function update(Jeux $jeu){
		
		// echo "<pre>";
		// print_r($jeu);
		// echo "</pre>";

		// rqt d'update
		$update_jeu = $this->db->prepare('UPDATE jeu SET name = :name, description = :description, pegi = :pegi, web = :site, fk_editor = :editor, fk_category = :category WHERE pk_jeu = '.$jeu->getId());

		$update_jeu->bindValue(':name', $jeu->getNom(), PDO::PARAM_STR);
		$update_jeu->bindValue(':description', $jeu->getDescription(), PDO::PARAM_STR);
		$update_jeu->bindValue(':pegi', $jeu->getPegi(), PDO::PARAM_INT);
		$update_jeu->bindValue(':site', $jeu->getSite(), PDO::PARAM_STR);
		$update_jeu->bindValue(':editor', $jeu->getEditor(), PDO::PARAM_INT);
		$update_jeu->bindValue(':category', $jeu->getCategory(), PDO::PARAM_INT);

		// execution de la rqt
		$update_jeu->execute();
		$update_jeu->closeCursor();
	}

	public function delete(Jeux $jeu){
		
		//delete grace à l'id
		$delete_jeu = $this->db->query("DELETE FROM guitare WHERE id =".$jeu->getId());
		$delete_jeu->closeCursor();

		echo '<p><strong><u>!! Le jeux a bien été supprimer !!</u></strong></p>';
	}

	public function getListJeu(){
		
		// recupere l'ensemble du contenu de la table jeux sous forme de tableau associatif
		$list_Jeu = $this->db->query('SELECT * FROM jeu');
		return $list_Jeu->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getListObjetsJeu(){
		
		// return la liste de tt les jeux dans un tableau d'objets jeux
		$jeux = [];
		$list_Jeu = $this->db->query('SELECT pk_jeu AS id, name AS nom, description, pegi, web AS site, fk_editor AS editor, fk_category AS category FROM jeu');
		while($donnees = $list_Jeu->fetch(PDO::FETCH_ASSOC)){
			$jeux[] = new Jeux($donnees);
		}
		return $jeux;
	}
}