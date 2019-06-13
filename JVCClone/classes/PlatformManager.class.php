<?php

	class PlatformManager {

		private $pdo;

		public function __construct(PDO $pdo){
			$this->setPDO($pdo);
		}

		public function setPDO(PDO $pdo){
			$this->pdo = $pdo;
		}

		public function add(Platform $platform){
			$add = $this->pdo->prepare('INSERT INTO platform (name) VALUES (:name)');
			$add->bindValue(':name', $platform->getName(), PDO::PARAM_STR);
			$add->execute();
			$add->closeCursor();
		}

		public function update(Platform $platform){
			$update = $this->pdo->prepare('UPDATE platform SET name = :name WHERE pk_platform = '.$platform->getID());
			$update->bindValue(':name', $platform->getName(), PDO::PARAM_STR);
			$update->execute();
			$update->closeCursor();
		}

		public function delete($id){
			$delete = $this->pdo->prepare('DELETE FROM platform WHERE pk_platform = '.$id);
			$delete_version = $this->pdo->query('DELETE FROM version WHERE fk_platform = '.$id);
			$delete->execute();
			$delete->closeCursor();
			$delete_version->closeCursor();

		}

		public function getListObjectsPlatform(){
			$platforms = [];
			$list_platforms = $this->pdo->query('SELECT pk_platform AS id, name FROM platform');
			while ($datas = $list_platforms->fetch(PDO::FETCH_ASSOC)) {
				$platforms[] = new Platform($datas);
			}
			return $platforms;
		}
	}

?>