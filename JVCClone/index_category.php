<?php
spl_autoload_register(function($classe){
    require_once 'classes/'.$classe.'.class.php';
  });

  $bdd = new PDO('mysql:host=localhost;dbname=musiqueV1', 'root', '', [PDO::ATTR_EMULATE_PREPARES=>false]);
 

  $category1 = new Category([
      'name' => 'ICHLIBIDISH',
  ]);

  $manager = new CategoryManager($bdd);


    //******************************* POUR AJOUTER UNE CATEGORIE ****************************************************

    //$manager->add($category1);

    //******************************* POUR CREER LE TABLEAU D'OBJETS ***********************************************

    $category_Tab_Objet = $manager->getListObjetCategory();
    echo "<pre>"; var_dump($category_Tab_Objet);


    // version tableau associatif
    // $category_Tab = $manager->getListCategory();
    // echo "<pre>"; var_dump($category_Tab);

    //******************************* POUR EFFACER UNE CATEGORIE *****************************************************

    //$manager->delete($category_Tab_Objet[0]);


    //******************************* POUR UPDATE UNE CATEGORIE *****************************************************

    //$category_Tab_Objet[1]->setName('FENDER');
    //$manager->update($category_Tab_Objet[1]);
?>

<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nom de la catégorie</th>
		</tr>
	</thead>
	<tbody>
 		<?php foreach ($category_Tab_Objet as $key => $value):?>
		<tr>
			<td><?= $key; ?></td>
 			<td><?= $value->getId(); ?></td>
			<td><?= $value->getNom(); ?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>
