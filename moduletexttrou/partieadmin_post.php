	<?php
include("config.php");

$req = $bdd->prepare('INSERT INTO admin (titre, exo, reponse01, reponse2, reponse3, reponse) VALUES(?,?,?,?,?,)');
$req->execute(array($_POST['titre'], $_POST['exo'], $_POST['reponse01'], $_POST['reponse2'], $_POST['reponse3']));
header('Location:partieadmin.php');
?>