<?php 
    class CategoryManager {
        private $db;
        public function __construct($db){
            $this->setDb($db);
        }

        public function setDb(PDO $db){
            $this->db = $db;
        }

        public function add(Category $category){
            // reqt insertion
            $add_category = $this->db->prepare('INSERT INTO category (name) VALUES (:name)');
            $add_category->bindValue(':name', $category->getNom(), PDO::PARAM_STR);
            $add_category->execute();
            $add_category->closeCursor();
            echo '<p><strong><u>!! Categorie bien ajoutée !!</u></strong></p>';
        }

        public function update(Category $category){
            $update_category = $this->db->prepare('UPDATE category SET name = :name WHERE id ='.$category->getId());
            $update_category->bindValue(':name', $category->getNom(), PDO::PARAM_STR);
            $update_category->execute();
            $update_category->closeCursor();
            echo '<p><strong><u>!! Categorie bien modifier !!</u></strong></p>';
        }

        public function delete($id){
            $delete_category = $this->db->query('DELETE FROM category WHERE pk_category ='.$id);
            $delete_category->closeCursor();
            echo '<p><strong><u>!! Catégorie bien éffacée !!</u></strong></p>';
        }

        public function getListObjetCategory(){
            $categorys = [];
            $List_category = $this->db->query('SELECT pk_category AS id, name FROM category');
                while($donnees = $List_category->fetch(PDO::FETCH_ASSOC)){
                    $categorys[] = new Category($donnees);
                }
                return $categorys;
        }
    }
?>