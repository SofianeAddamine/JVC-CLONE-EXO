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

			require('inc/dbconnect.inc.php');
		?>
		<form class="text-center p-5 w-50 mx-auto mt-5" method="post" action="jeu.list.php?Add=1">

			<p class="h4 mb-4">Ajouter un jeu</p>

			<label class="mt-4">Nom du jeu</label>
			<input required type="text" class="form-control mb-4 w-50 mx-auto" placeholder="Champ obligatoire" name="nom">

			<label class="mt-4">Description du jeu</label>
			<textarea class="form-control mb-4 w-50 mx-auto" placeholder="Champ Obligatoire" name="description"></textarea>

			<label class="mt-4">Pegi</label>
			<input required type="number" class="form-control mb-4 w-50 mx-auto" max="18" min="3" placeholder="Champ obligatoire" name="pegi">

			<label class="mt-4">Site du jeu</label>
			<input required type="text" class="form-control mb-4 w-50 mx-auto" placeholder="Champ obligatoire" name="site">

			<select class="browser-default custom-select my-4 w-50 mx-auto" name="editor">
				<option disabled selected>Choisissez un éditeur</option>

				<?php
					$sqleditors = $pdo->query('SELECT * FROM editor ORDER BY name ASC');
					while ($roweditor = $sqleditors->fetch(PDO::FETCH_ASSOC)){
						echo '<option value='.$roweditor['pk_editor'].'>'.$roweditor['name'].'</option>';
					}

					$sqleditors->closeCursor();
				?>

			</select>

			<select class="browser-default custom-select my-4 w-50 mx-auto" name="category">
				<option disabled selected>Choisissez une catégorie</option>
				<?php
					$sqlcategory = $pdo->query('SELECT * FROM category ORDER BY name ASC');
					while ($rowcategory = $sqlcategory->fetch()){
						echo '<option value='.$rowcategory['pk_category'].'>'.$rowcategory['name'].'</option>';
					}
				?>
			</select>

			<button class="btn btn-unique btn-block w-50" type="submit" name="submit">Ajouter</button>

		</form>
		
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