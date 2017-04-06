<?php
// Connexion à la base de données

    $bdd = new PDO('mysql:host=localhost;dbname=mini-chat;mini-chat=utf8', 'root', 'root');

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->query('TRUNCATE TABLE chat');


// Redirection du visiteur vers la page du minichat
header('Location: minichat.php');
