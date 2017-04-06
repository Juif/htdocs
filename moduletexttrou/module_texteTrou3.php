
<?php
// affichage des erreur php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('config.php');
	include('requetes.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="module_texteTrou.css">
    <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="jquery-3.1.1.js"></script>
	<script src="module_texteTrou.js"></script>

    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>

	<div id="title">

		<h1>Module texte trou</h1>


		<div id="progression_bar"><div class="bar_fixed"></div></div>


	</div>


<a href="?idExercice=1" id="exo1">Exercice 1<a>
<a href="?idExercice=2" id="exo2">Exercice 2<a>

<?php
 $idExercice = $_GET["idExercice"];

include("config.php");




function scrollbarrTitle($idExercice, $bdd)
{
    $exercice = $bdd->query('SELECT id_exercic, titreScroll FROM scrollBarr
                             WHERE scrollBarr.id_exercic = "' . $idExercice . '"');




       /* echo '<div id="exo1">' .
            '<p>' . htmlspecialchars($donnees['titreScroll']) . '<label for="reponse1"></label>' . '</p>' .
            '</div>';*/


$title = array();
$title['id_exercic']= array();
$title['titreScroll']= array();

while ($donnees = $exercice->fetch())
{

    array_push($title['id_exercic'], $donnees['id_exercic']);
    array_push($title['titreScroll'], $donnees['titreScroll']);
}

return $title;

}


$title = scrollbarrTitle($idExercice,$bdd);

for ($i=0 ; $i<count($title['titreScroll']);$i++)
{

    echo $title ['titreScroll'][$i] ;

}

echo($title);

//appel boucle multi scrollbar

/**
 *  $idScrollBarr
 *  $bdd
 */
function scrollbarChoix ($idScrollBarr, $bdd)

{
    $reponse = $bdd->query('SELECT id,id_scrollBarr,choix FROM choix
                            WHERE id_scrollBarr="' . $idScrollBarr . '" ');

    $mama = array();
    $mama["id_scrollBarr"] = array();
    $mama["choix"] = array();
    while ($donnees = $reponse->fetch())
    {

        array_push($mama['id_scrollBarr'], $donnees['id_scrollBarr']);
        array_push($mama['choix'],$donnees['choix']);

    }
return $mama;

}
$mama = rechercheOptions($idExercice,$bdd);

for ($i =0 ; $i<=count($mama['id_scrollBar']);$i++)
{
    echo "<li>". $mama['id_scrollBar'][$i] . "</li>";
}

var_dump($mama);



function rechercheOptions($idScrollBarr,$bdd)


{
    $reponse = $bdd->query('SELECT id,choix FROM choix	 WHERE id_scrollBarr="' . $idScrollBarr . '" ');

    $res = array();
    $res['id_scrollBarr'] = array();
    $res['choix'] = array();

    while ($donnees = $reponse->fetch())
    {

        array_push($res['id_scrollBarr'], $donnees['id_scrollBarr']);
        array_push($res['choix'],$donnees['choix']);

    }

    return $res;

}
echo ($res['id_scrollBarr']);



$res = rechercheOptions($id_scrollBarr,$bdd);

    for ($i =0 ; $i<=count($res['id_scrollBarr']);$i++)


    {
    echo "<li>". $res['choix'][$i] . "</li>";
    }

echo($res);


/* echo '<p>' . '<select name="reponse1" id="reponse1">' .
        '<option value="idea" selected>' . htmlspecialchars($reponse['choix']) . '</option>' .
        '<option value="idea2">' . htmlspecialchars($reponse['choix']) . '</option>' .
        '<option value="idea3">' . htmlspecialchars($reponse['choix']) . '</option>' .
        '</select>' . '</p>';
}



/*
    echo '<p>' . '<select name="reponse1" id="reponse1">' .
        '<option value="idea" selected>' . htmlspecialchars($reponse['choix']) . '</option>' .
        '<option value="idea2">' . htmlspecialchars($reponse['choix']) . '</option>' .
        '<option value="idea3">' . htmlspecialchars($reponse['choix']) . '</option>' .
        '</select>' . '</p>';*/

/* $result = $reponse->fetchAll(PDO::FETCH_ASSOC);

print_r($result);

$data["titreEx"] = $result[0]["titreEx"];
$data["titreScroll"] = $result[0]["titreScroll"];

for ($index = 0; $index < sizeof($result); $index++) {
    $data["choix"][$index + 1] = $result[$index]["choix"];
}

print_r($data);*/



/*$index = 0;

while ($donnees = $reponse->fetch())
	{

        $data["php f"][$index] = $donnees["titreEx"];
        $data["choix"][$index] = $donnees["choix"];


        $index++;

	}
var_dump($data);*/

$reponse->closeCursor();
?>




        <p><button type="button" class="btn btn-info" id="boutonIndice">Besoin d'un indice (2)</button>
        </p>
        <p><button type="button" class="btn btn-primary" id ="boutonValider">Valider</button></p>
	 <ul class="indice"></ul>

</body>
</html>
