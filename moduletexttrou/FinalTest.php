
<?php
// affichage des erreur php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('config.php');

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


<a href="?idExercice=1" id="exo1">Exercice 1</a>
<a href="?idExercice=2" id="exo2">Exercice 2</a>

<?php

$idExercice = $_GET["idExercice"];


include("config.php");

function scrollbarrTitle($bdd, $idExercice)


{
    $reponse = $bdd->prepare('SELECT id, titreScroll FROM scrollBarr
                             WHERE scrollBarr.id_exercic = ?');

    $reponse->execute(array($idExercice));


    $title = array();
    $title['id']= array();
    $title['titreScroll']= array();

    while ($donnees = $reponse->fetch())
    {

        array_push($title['id'], $donnees['id']);
        array_push($title['titreScroll'], $donnees['titreScroll']);
    }

    return $title;

}

$title = scrollbarrTitle($bdd, $idExercice);
$arrayScroll = array();


for ($i=0 ; $i<count($title['id']);$i++)
{

    $arrayScroll[$title['id'][$i]] = [];

}


function all($bdd, $arrayScroll, $idExercice)
{
    $data = array();

    foreach ($arrayScroll as $key => $array ) {
        $donnees = $bdd->prepare('SELECT choix, id_scrollBarr
 FROM choix WHERE  choix.id_scrollBarr=? AND choix.id_ex= ? ');

        $donnees->execute(array($key, $idExercice));

        while ($reponse = $donnees->fetch()) {
            $data[$reponse['id_scrollBarr']][] = $reponse['choix'];
        }
    }

    return $data;
}



$datas = all($bdd, $arrayScroll, $idExercice);



$i = 0;

foreach ($datas as $data) {
    echo $title['titreScroll'][$i] ;
    $i++;
    foreach ($data as $choice) {


        echo "<li>" . $choice . "<li>";

    }
}

?>