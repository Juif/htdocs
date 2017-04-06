<?php



    $bdd = new PDO('mysql:host=localhost;dbname=mini-chat;charset=utf8', 'root', 'root');


$reponse = $bdd->query('SELECT pseudo, message FROM chat ORDER BY ID DESC LIMIT 0, ' . $_POST['affichage'] . '');




