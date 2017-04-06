<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<script src="jquery-3.1.1.js"></script>
	<script src="module_texteTrou.js"></script>

</head>

<body>

<form action="partieadmin_post.php" method="post">
	<p>
		<label for="titre">Titre</label> : <input type="text" name="titre" id="titre"/>
	</p>
	<p>
		<label for="exo">Exercice</label> : <input type="text" name="exo" id="exo"/>
	</p>
	
	<p>
		<label for="reponse01">Réponse 1</label> : <input type="text" name="reponse01" id="reponse01"/>
		<label for="reponse2">Réponse 2</label> : <input type="text" name="reponse2" id="reponse2"/>
		<label for="reponse3">Réponse 3</label> : <input type="text" name="reponse3" id="reponse3"/>
	</p>
	<p><label for="reponse">Réponse</label> : <input type="text" name="reponse" id="reponse"/></p>
	<p>
		<input type="submit" name="Sauvegarder"/>
	</p>
</form>

</body>
</html>