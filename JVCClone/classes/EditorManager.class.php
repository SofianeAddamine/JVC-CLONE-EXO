<?php

	class EditorManager {

		private $pdo;

		public function __construct(PDO $pdo){
			$this->setPDO($pdo);
		}

		public function setPDO(PDO $pdo){
			$this->pdo = $pdo;
		}

		public function add(Editor $editor){
			$add = $this->pdo->prepare('INSERT INTO editor (name, web) VALUES (:name, :web)');
			$add->bindValue(':name', $editor->getName(), PDO::PARAM_STR);
			$add->bindValue(':web', $editor->getSite(), PDO::PARAM_STR);
			$add->execute();
			$add->closeCursor();
		}

		public function update(Editor $editor){
			$update = $this->pdo->prepare('UPDATE editor SET name = :name, web = :web WHERE pk_editor = '.$editor->getID());
			$update->bindValue(':name', $editor->getName(), PDO::PARAM_STR);
			$update->bindValue(':web', $editor->getSite(), PDO::PARAM_STR);
			$update->execute();
			$update->closeCursor();
		}

		public function delete($id){

			while ($row = $this->pdo->query('SELECT pk_jeu FROM jeu WHERE fk_editor = '.$id)->fetch()){
				$delete_version = $this->pdo->query('DELETE FROM version WHERE fk_jeu = '.$row['pk_jeu']);
				$delete_version->closeCursor();
			}

			$delete_jeu = $this->pdo->query('DELETE FROM jeu WHERE fk_editor = '.$id);
			$delete_jeu->closeCursor();
			$delete = $this->pdo->prepare('DELETE FROM editor WHERE pk_editor = '.$id);
			$delete->execute();
			$delete->closeCursor();


		}

		public function getListObjectsEditor(){
			$editors = [];
			$list_editors = $this->pdo->query('SELECT pk_editor AS id, name, web AS site FROM editor');
			while ($datas = $list_editors->fetch(PDO::FETCH_ASSOC)) {
				$editors[] = new Editor($datas);
			}
			return $editors;
		}
	}

?>