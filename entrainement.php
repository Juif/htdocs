<?php session_start();
setcookie('pseudo', $_POST['ID'], time() + 365 * 24 * 3600, null, null, false, true); // On écrit un cookie


$_POST['Maire'] = "Monsieur le Maire nous sommes heureux de vous voir à l'UHA 4.0";


?>
<!DOCTYPE>
<link rel="stylesheet" href="entrainement.css">
<HTML>
<head><title>Stella</title>

</head>
<body>

<?php echo $_COOKIE['pseudo']; ?>
<form method="post" action="entrainement.php">
    <label class="txt">Votre pseudo :</label><input type="text" name="ID" id="pass"/>
    <input type="submit" value="Envoyer"/></form>
<header>
    <h1>Le blog de la Fifille</h1>

    <p class="txt">Accès au codes de lancement</p>

    <form method="post" action="secret.php">
        <label class="txt">Votre pseudo :</label> <input type="text" name="pseudo" id="pass"/>


        <label for="pass" class="txt">Votre mot de passe :</label>

        <input type="password" name="pass" id="pass"/>


        <input type="submit" value="Envoyer"/>
    </form>
    <div style="margin-left: 94%;padding-top: 5px;">
        <p>
            <audio src="DilatedPeoplesYouCanHideYouCanRun.mp3" controls>You can't hide you can't run</audio>
        </p>
    </div>
</header>
<p style="text-align: center"> Salut que fait tu ici <?php

    if (isset($_POST['ID']) === false) {
        ?>
        inconnu
        <?php
    } else {

        echo $_POST['ID'];
    }

    ?> ?<br/>
    Bonjour <?php echo $_POST['Maire']; ?> !!!
</p>
<p><a href="/diaporama/diaporama.html">Ma vie de chienne en photos</a></p>
<p><a href="/ScaryMaze/Preview.html">J'aime jouer et toi?</a></p>
<p><a href="/Devinettes/html/devinette.html">Encore ! active ta console</a></p>
<p><a href="/contact/html/contacts.html">Mon gestionnaire de copain en console</a></p>


<article>


</article>

</body>
</HTML>