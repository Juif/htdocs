<?php
session_start();

setcookie('pseudo', $_POST['ID'], time() + 365*24*3600, null, null, false, true);
 ?>

<!DOCTYPE html >
<html>
<head>
    <meta charset="utf-8" />
    <title>Codes d'accès au serveur central de la NASA</title>
</head>
<body>

<?php
if (isset($_POST['pass']) AND $_POST['pass'] ===  "bab1412") // Si le mot de passe est bon
    if (isset($_POST['pseudo']) AND $_POST['pseudo'] ===  "Baba") {
        // On affiche les codes
        ?>
        <h1>Voici les codes d'accès :</h1>
        <p><strong>CRD5-GTFT-CK65-JOPM-V29N-24G1-HH28-LLFV</strong></p>

        <p>
            Cette page est réservée au personnel de la NASA. N'oubliez pas de la visiter régulièrement car les codes
            d'accès sont changés toutes les semaines.<br/>
            La NASA vous remercie de votre visite.
        </p>

        <?php
    }
        if (isset($_POST['pass']) AND $_POST['pass'] !=  "bab1412") // Si le mot de passe est bon
            if (isset($_POST['pseudo']) AND $_POST['pseudo'] !=  "Baba") // Sinon, on affiche un message d'erreur
{
    echo '<p>Pseudo ou mot de passe incorrect</p>';
}
    ?>



    <nav>
        <?php echo $_POST['pseudo'];?>
        Le Grand est dans la place<br/>
     Son MDP est
        <?php echo $_POST['pass'];?> !!!
    </nav>


    <footer>
        <form method="post" action="deconnexion.php">
            <input type="submit" value="Se déconnecter" >
        </form>
    </footer>
</body>
</html>