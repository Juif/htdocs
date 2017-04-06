 <?php
// affichage des erreur php
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
	include('config.php');
	include('requetes.php');



 $indice = $bdd->query('SELECT indice FROM indice WHERE id_exercice="' . $idExercice . '" ')

  	$indice= array();
    $indice['indice']= array();

    while ($dons = $indice->fetch())
    {

    	array_push($indice['indice'], $dons['indice']);


    }

    return $indice;

$arrayLengths=count($dons['indice']);
    for ($i =0 ; $i<$arrayLengths;$i++){

        {

            echo "<li>" . $res['indice'][$i] . "</li>";


        }}
var_dump($res);
    

?>


Tu peux mettre les scrollbar title en html dans les exercices pour appeler facilement leur ID quand tu selectionne les choix