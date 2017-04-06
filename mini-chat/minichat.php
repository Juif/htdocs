 <?php session_start();
setcookie('pseudo', $_POST['pseudo'], time() + 365 * 24 * 3600, null, null, false, true);



?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Mini-chat</title>
</head>
<style>
    form {
        text-align: center;
    }
    #h1
    {text-align: center;
    margin: auto;
    }
</style>
<body>

<form action="minichat.php" method="post">
    <a href="minichat_post.php">Reset Chat</a>
    <p>
        <script type="text/javascript">
            var eraseInput = (function () {
                var erased = false;
                return function (input) {
                    for (input.value = null; input.value < null; input.value++) {
                        input.value = !erased ? '' : input.value;
                        erased = true
                    }
                };
            })();
        </script>
        <label for="pseudo">Pseudo</label> <br/><br/>
        <input type="text" name="pseudo" id="pseudo"
               value="<?php echo $_POST['pseudo'] ?>"
               onclick="eraseInput(this);"/><br/><br/>

        <label for="message">Message</label> <br/><br/>
        <input type="text" name="message" id="message"
               value="<?php echo $_POST['message'] ?>"
               onclick="eraseInput(this);"/><br/><br/>

        <label for="affichage"></label>
        <input type="hidden" name="affichage"
               id="affichage"
               value="10"/>

        <br/>
        <br/>
        <input type="submit" value="Envoyer"/>
    </p>
</form>
<form action="minichat.php"  method="post">
    <label for="affichage"><p>Nombre de lignes à afficher<br/>(auto 10)</p></label>
    <input type="number" name="affichage"
           id="affichage" onclick="eraseInput(this);" onclick="loadDoc()"
           value="<?php echo $_POST['affichage'] ?>"/>
    <script>
        function loadDoc()
        {
            $('#affichage').load('limit.php');


        }


    </script>
    <input type="submit" value="Envoyer"/>
</form>


<?php
// Connexion à la base de données

    $bdd = new PDO('mysql:host=localhost;dbname=mini-chat;charset=utf8', 'root', 'root');

if (empty($_POST['pseudo']) || empty($_POST['message']|| empty($_POST['affichage']))) {
    ?>


       <p id="h1"><strong style="text-align: center;"> Merci de remplir tous les champs !   </strong></p>


    <?php
}

 else {
    $req = $bdd->prepare('INSERT INTO chat (pseudo, message, date) VALUES(?, ?, NOW())');
    $req->execute(array($_POST['pseudo'], $_POST['message']));

}


$reponse = $bdd->query('SELECT pseudo, message , DATE_FORMAT(date, \'%d/%m/%Y %Hh%imin%ss\') AS date  FROM chat ORDER BY ID DESC LIMIT 0, ' . $_POST['affichage'] . '');
$res = array();
$res['pseudo'] = array();
$res['message'] = array();


// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch()) {
    if ($donnees)
        echo '<p><strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : ' . htmlspecialchars($donnees['message']) . '<br/> ' . htmlspecialchars($donnees['date']) . '   </p>';
}

$reponse->closeCursor();

?>
</body>
</html>
