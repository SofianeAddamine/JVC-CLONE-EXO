<?php 
	class VersionManager{
		private $db;

		public function __construct($db){
			$this->setDb($db);
		}

		public function setDb(PDO $db){
			$this->db = $db;
		}

		public function add(Version $version){

			echo "<pre>";
            print_r($version);
            echo "</pre>";
                

			// rqt d'insertion 
			$add_version = $this->db->prepare('INSERT INTO version (date_sortie, fk_game, fk_platform) VALUES (:date_sortie, :idjeu, :idsupport)');
			$add_version->bindValue(':date_sortie', $version->getDate());
			$add_version->bindValue(':idjeu', $version->getJeu(), PDO::PARAM_INT);
			$add_version->bindValue(':idsupport', $version->getSupport(), PDO::PARAM_INT);
			$add_version->execute();
			$add_version->closeCursor();
		}

		public function update(Version $version){
			$update_version = $this->db->prepare('UPDATE version SET date_sortie = :date_sortie WHERE id='.$version->getId());
			$update_version->bindValue(':date_sortie', $version->getDate(), PDO::PARAM_INT);
			$update_version->execute();
			$update_version->closeCursor();
		}

		public function delete($id){
<<<<<<< Updated upstream
			$delete_version = $this->db->query("DELETE FROM version WHERE pk_version = ".$id);
=======
			$delete_version = $this->db->query("DELETE FROM version WHERE id= ".$id);
>>>>>>> Stashed changes
			$delete_version->closeCursor();
		}

		public function getListObjetsVersion(){
			$versions = [];
			$List_Versions = $this->db->query('SELECT pk_version AS id, date_sortie AS date, fk_game AS jeu, fk_platform AS support FROM version');
			while($donnees = $List_Versions->fetch(PDO::FETCH_ASSOC)){
				$versions[] = new Version($donnees);
			}
			return $versions;
		}
	}
?>