<?php

$idExercice = $_GET["idExercice"];

include("config.php");


// appel titre scrollbarr dans exercice

function scrollbarrTitle($idExercice, $bdd)
{
    $exercice = $bdd->query('SELECT * FROM exercice  LEFT JOIN scrollBarr ON exercice.id = scrollBarr.id_exercic
                             WHERE exercice.id = "' . $idExercice . '"');


    while ($donnees = $exercice->fetch())
    {
        echo '<div id="exo1">' .
            '<p>' . htmlspecialchars($donnees['titreScroll']) . '<label for="reponse1"></label>' . '</p>' .
            '</div>';
    }
}


function rechercheOptions($idScrollBarr,$bdd)
{
    $reponse = $bdd->query('SELECT id,choix FROM choix	 WHERE id_scrollBarr="' . $idScrollBarr . '" ');

    $res = array();
    $res['id'] = array();
    $res['choix'] = array();

    while ($donnees = $reponse->fetch()) {

        array_push($res['id'], $donnees['id']);
        array_push($res['choix'],$donnees['choix']);

    }

    return $res;

}

$res = rechercheOptions($idExercice,$bdd);

    for ($i =0 ; $i<count($res['choix']);$i++)
    {
    echo "<li>". $res['choix'][$i] . "</li>";
    }

    echo($res);

// appel choix dans scrollbarr

function scrollbarrTitle($idExercice, $bdd)

{

    $exercice = $bdd->query('SELECT * FROM exercice  LEFT JOIN scrollBarr ON exercice.id = scrollBarr.id_exercic
                             WHERE exercice.id = "' . $idExercice . '"');




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

for ($i=0 ; $i<count($title['titreScroll']);i++)
{

    echo ($title['titreSroll'] [$i]) ;

}

echo($title);





?>


