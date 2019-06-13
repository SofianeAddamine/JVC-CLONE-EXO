<?php

	require('inc/dbconnect.inc.php');

	spl_autoload_register(function($classe){
		require_once 'classes/'.$classe.'.class.php';
	});

	$manager = new CategoryManager($pdo);
	$category_Tab_Objet = $manager->getListObjetCategory();


	if(isset($_POST) && !empty($_POST['name'])){

		// echo "<pre>";
		// print_r($_POST);
		// echo "</pre>";

		if(isset($_GET['Add']) && !empty($_GET['Add'])){
			$manager->add(new Category($_POST));
		}

		if(isset($_GET['Update']) && !empty($_GET['Update'])){
			$manager->update(new Category($_POST));
		}

		header('Location: category.list.php');
	}

	if (isset($_GET['suppr']) && !empty($_GET['suppr'])){
		$manager->delete($_GET['suppr']);

		header('Location: category.list.php');
	}
?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
		<!-- Bootstrap core CSS -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
		<!-- Material Design Bootstrap -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/css/mdb.min.css" rel="stylesheet">
		<title>Clone JVC</title>
	</head>
	<body>

		<?php include('inc/menu.inc.php');?>
		<table class="table mt-5 mx-auto w-75 text-center">
			<thead class="red darken-1 white-text">
				<tr>
					<th scope="col" class="w-50">Nom de la catégorie</th>
					<th scope="col">Modifier</th>
					<th scope="col">Supprimer</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($manager->getListObjetCategory() as $key => $value):?>
					<tr>
						<td><?= $value->getNom(); ?></td>
						<?php 
							echo "<td><a href='category.update.php?ID=".$value->getId()."'><i class='fas fa-2x text-success fa-external-link-alt'></i></a></td>";
							echo "<td><a href='?suppr=".$value->getId()."'><i class='fas fa-2x text-danger fa-trash-alt'></i></a></td></tr>";
						?>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<!-- JQuery -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- Bootstrap tooltips -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
		<!-- Bootstrap core JavaScript -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
		<!-- MDB core JavaScript -->
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.2/js/mdb.min.js"></script>
	</body>
</html>