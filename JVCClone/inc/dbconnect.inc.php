<?php
	try {
		$pdo = new PDO('mysql:host=localhost;dbname=jvcclone', 'root', 'root', [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'", PDO::ATTR_EMULATE_PREPARES=>false]);
	}catch (Exception $e){
		echo $e->getMessage();
	}
?>