<?php 
		global $bdd; 
		$bdd = new PDO('mysql:host=localhost;dbname=textetrou;charset=utf8', 'root', 'root');
		$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



	?>