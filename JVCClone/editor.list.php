<?php

	require('inc/dbconnect.inc.php');

	spl_autoload_register(function($classe){
  		require_once 'classes/'.$classe.'.class.php';
	});

	$editorManager = new EditorManager($pdo);

?>

<!DOCTYPE html>
	<html>
	<head>
		 <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Added meta tags -->
        <meta name="copyright" content="Xavier gingaud">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/css/mdb.min.css" rel="stylesheet">
        <!-- JQuery UI -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet">

		<title>Clone JVC</title>
	</head>

	<body>

		<?php
			include('inc/menu.inc.php');

			if(isset($_POST) && !empty($_POST['name']) && !empty($_POST['site'])){

				if(isset($_GET['Add']) && !empty($_GET['Add'])){
					$editorManager->add(new Editor($_POST));

				}

				if(isset($_GET['Update']) && !empty($_GET['Update'])){
					$editorManager->update(new Editor($_POST));

				}

				header('Location: editor.list.php');
			}

			if (isset($_GET['suppr']) && !empty($_GET['suppr'])){
				$editorManager->delete($_GET['suppr']);

				header('Location: editor.list.php');
			}

		?>


		<table class="table mt-5 mx-auto w-50 text-center">
			<thead class="red darken-1 white-text">
				<tr>
					<th scope="col">Nom de l'éditeur</th>
					<th scope="col">Site de l'éditeur</th>
					<th scope="col">Modifier</th>
					<th scope="col">Supprimer</th>
				</tr>
			</thead>
			<tbody>
		  		<?php foreach ($editorManager->getListObjectsEditor() as $key => $value){
		  			echo "<tr><td>".$value->getName()."</td>";
		  			echo "<td><a class='text-primary' href='".$value->getSite()."' target='_blank' title='Ouvre dans un nouvel onglet'>Site de ".$value->getName()."</a></td>";
		  			echo "<td><a href='editor.update.php?ID=".$value->getId()."'><i class='fas fa-2x text-success fa-external-link-alt'></i></a></td>";
		  			echo "<td><a href='?suppr=".$value->getId()."'><i class='fas fa-2x text-danger fa-trash-alt'></i></a></td></tr>";
		  		}?>
		  	</tbody>
		</table>

		<!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
        <!-- JQuery UI -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" integrity="sha256-T0Vest3yCU7pafRw9r+settMBX6JkKN06dqBnpQ8d30=" crossorigin="anonymous"></script>
        <!-- Bootstrap tooltips -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.6/js/mdb.min.js"></script>
	</body>
</html>