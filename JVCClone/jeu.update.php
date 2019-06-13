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
		?>

		<form class="text-center p-5 w-50 mx-auto mt-5" method="post" action="jeu.list.php?Update=1">

		    <p class="h4 mb-4">Modifier une plateforme</p>
			
			<?php

				require('inc/dbconnect.inc.php');

				$sql = $pdo->query('SELECT * FROM jeu WHERE pk_jeu = '.$_GET['ID'])->fetch(PDO::FETCH_ASSOC);

				// echo "<pre>";
				// print_r($sql);
				// echo "</pre>";

				echo "<input type='hidden' name='id' value=".$sql['pk_jeu'].">";

				echo "<label class='mt-4'>Nom du jeu</label>";
				echo '<input required type="text" class="form-control mb-4 w-50 mx-auto" placeholder="Champ obligatoire" value="'.$sql['name'].'" name="nom">';

				echo "<label class='mt-4'>Description du jeu</label>";
				echo '<textarea class="form-control mb-4 w-50 mx-auto" placeholder="Champ Obligatoire" name="description">'.$sql['description'].'</textarea>';

				echo "<label class='mt-4'>Pegi</label>";
				echo '<input required type="number" max="18" min="3" class="form-control mb-4 w-50 mx-auto" placeholder="Champ obligatoire" value="'.$sql['pegi'].'" name="pegi">';

				echo "<label class='mt-4'>Site du jeu</label>";
				echo '<input required type="text" class="form-control mb-4 w-50 mx-auto" placeholder="Champ obligatoire" value="'.$sql['web'].'" name="site">';



				echo '<select class="browser-default custom-select my-4 w-50 mx-auto" name="editor">';
					echo '<option disabled>Choisissez un éditeur</option>';
					$sqleditor = $pdo->query('SELECT * FROM editor ORDER BY name ASC');
					while ($roweditor = $sqleditor->fetch(PDO::FETCH_ASSOC)){
						if ($sql['fk_editor'] == $roweditor['pk_editor']) {
							echo '<option selected value='.$roweditor['pk_editor'].'>'.$roweditor['name'].'</option>';
						}else{
							echo '<option value='.$roweditor['pk_editor'].'>'.$roweditor['name'].'</option>';
						}
					}
				echo "</select><br>";

				echo '<select class="browser-default custom-select my-4 w-50 mx-auto" name="category">';
					echo '<option disabled>Choisissez une catégorie</option>';
					$sqlcategory = $pdo->query('SELECT * FROM category ORDER BY name ASC');
					while ($rowcategory = $sqlcategory->fetch(PDO::FETCH_ASSOC)){
						if ($sql['fk_category'] == $rowcategory['pk_category']) {
							echo '<option selected value='.$rowcategory['pk_category'].'>'.$rowcategory['name'].'</option>';
						}else{
							echo '<option value='.$rowcategory['pk_category'].'>'.$rowcategory['name'].'</option>';
						}
					}
				echo "</select>";

			?>

			<button class="btn btn-unique btn-block w-50" type="submit" name="submit">Modifier</button>

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