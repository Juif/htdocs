<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/module_texteTrou.css">
	<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="jquery-3.1.1.js"></script>
	<script src="module_texteTrou.js"></script>
	<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>

	<title></title>
</head>
<body>


<div id="exercices-reponses">
	<article id="exercices">

		<button id="idExercice1">1</button>
		<button id="idExercice2">2</button>
	</article>


	<article id="reponses">
		<div id="exo1">

			<div id="partie2">
                <?php
                $idExercice = $_GET["idExercice"];
                include("config.php");
                function scrollbarrTitle2($idlExercice, $bdd)
                {
                    $reponse = $bdd->query('SELECT id_exercic, titreScroll, id FROM scrollBarr
                             WHERE scrollBarr.id_exercic = "2" AND NOT id = "3"');
                    $title = array();
                    $title['id_exercic'] = array();
                    $title['id'] = array();
                    $title['titreScroll'] = array();
                    while ($donnees = $reponse->fetch()) {
                        array_push($title['id_exercic'], $donnees['id_exercic']);
                        array_push($title['id'], $donnees['id']);
                        array_push($title['titreScroll'], $donnees['titreScroll']);
                    }
                    return $title;
                }
                $title = scrollbarrTitle2($idExercice, $bdd);
                for ($i = 0; $i < count($title['titreScroll']); $i++) {
                    echo $title ['titreScroll'][$i];
                }
                ?>


				<label for="reponse2"></label><br/>
				<select name="reponse2" id="reponse2">

                    <?php
                    function rechercheOptions2($idExercice, $bdd)
                    {
                        $reponse = $bdd->query('SELECT id,choix, id_scrollBarr, answer FROM choix	 WHERE id_ex="2" AND id_scrollBarr="2"');
                        $res = array();
                        $res['id'] = array();
                        $res['id_scrollBarr'] = array();
                        $res['choix'] = array();
                        $res['answer'] = array();
                        while ($donnees = $reponse->fetch()) {
                            array_push($res['id'], $donnees['id']);
                            array_push($res['id_scrollBarr'], $donnees['id_scrollBarr']);
                            array_push($res['choix'], $donnees['choix']);
                            array_push($res['answer'], $donnees['answer']);
                        }
                        return $res;
                    }
                    $res = rechercheOptions2($idExercice, $bdd);
                    for ($i = 0; $i < count($res['choix']); $i++) {
                        ?>
						<option value="<?php echo $res["answer"][$i]; ?>"> <?php echo $res["choix"][$i]; ?></option>' ;
                        <?php
                    }
                    ?>
				</select>

				<br/>
                <?php
                $idExercice = $_GET["idExercice"];
                include("config.php");
                function scrollbarrTitle3($idExercice, $bdd)
                {
                    $reponse = $bdd->query('SELECT id_exercic, titreScroll, id FROM scrollBarr
                             WHERE scrollBarr.id_exercic = "2" AND id="3"');
                    $title = array();
                    $title['id_exercic'] = array();
                    $title['id'] = array();
                    $title['titreScroll'] = array();
                    while ($donnees = $reponse->fetch()) {
                        array_push($title['id_exercic'], $donnees['id_exercic']);
                        array_push($title['id'], $donnees['id']);
                        array_push($title['titreScroll'], $donnees['titreScroll']);
                    }
                    return $title;
                }
                $title = scrollbarrTitle3($idExercice, $bdd);
                for ($i = 0; $i < count($title['titreScroll']); $i++) {
                    echo $title ['titreScroll'][$i];
                }
                ?>


				<label for="reponse3"></label><br/>
				<select name="reponse3" id="reponse3">

                    <?php
                    function rechercheOptions3($idExercice, $bdd)
                    {
                        $reponse = $bdd->query('SELECT id,choix, id_scrollBarr, answer FROM choix	 WHERE id_ex="2" AND id_scrollBarr="3"');
                        $res = array();
                        $res['id'] = array();
                        $res['id_scrollBarr'] = array();
                        $res['choix'] = array();
                        $res['answer'] = array();
                        while ($donnees = $reponse->fetch()) {
                            array_push($res['id'], $donnees['id']);
                            array_push($res['id_scrollBarr'], $donnees['id_scrollBarr']);
                            array_push($res['choix'], $donnees['choix']);
                            array_push($res['answer'], $donnees['answer']);
                        }
                        return $res;
                    }
                    $res = rechercheOptions3($idExercice, $bdd);
                    for ($i = 0; $i < count($res['choix']); $i++) {
                        ?>
						<option value="<?php echo $res["answer"][$i]; ?>"> <?php echo $res["choix"][$i]; ?></option>' ;
                        <?php
                    }
                    ?>
				</select>
                <?php
                $reponse = $bdd->query('SELECT answer FROM choix WHERE answer="' . "true" . ' " ');
                while ($donnees = $reponse->fetch()) {
                    ?>


                <?php } ?>

				<p></p>

				<div class="buttonValidHint">
					<button type="button" onclick="correction()" class="btn btn-warning" id="boutonValider">Valider
					</button>
					<button type="button" onclick="giveTips()" class="btn btn-info" id="boutonIndice">Afficher les
						indices
					</button>
				</div>

				<div id="indices">
                    <?php
                    function indices($idExercice, $bdd)
                    {
                        $indice = $bdd->query('SELECT indice FROM indice WHERE id_exercice="' . $idExercice . '" ');
                        $dons = array();
                        $dons['indice'] = array();
                        while ($done = $indice->fetch()) {
                            array_push($dons['indice'], $done['indice']);
                        }
                        return $dons;
                    }
                    $dons = indices($idExercice, $bdd);
                    $arrayLengths = count($dons['indice']);
                    for ($i = 0; $i < $arrayLengths; $i++) {
                        {
                            echo "<li>" . $dons['indice'][$i] . "</li>";
                        }
                    }
                    ?>

				</div>
			</div>
			<script>
                function giveTips() {
                    $('#indices').show();
                    $('.btn-info').css("background-color", "#adadad");
                }
			</script>


		</div>
</div>
</article>

</body>
</html>